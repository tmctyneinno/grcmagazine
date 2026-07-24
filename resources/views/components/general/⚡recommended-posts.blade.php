<?php

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;

new class extends Component
{
    public ?Article $article = null;
    public $similarArticles = [];
    public $recommendedArticles = [];

    public function mount(?Article $article = null)
    {
        $this->article = $article;

        $categoryIds = $this->article
            ? $this->article->categories->pluck('id')
            : collect();

        $similarQuery = Article::where('is_published', true)
            ->when($this->article, fn ($q) => $q->where('id', '!=', $this->article->id));

        if ($categoryIds->isNotEmpty()) {
            $similarQuery->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('categories.id', $categoryIds);
            });
        }

        $this->similarArticles = $similarQuery
            ->with('categories')
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get()
            ->map(fn ($a) => $this->mapArticle($a))
            ->toArray();

        $excludeIds = collect($this->similarArticles)->pluck('id')
            ->when($this->article, fn ($c) => $c->push($this->article->id));

        $this->recommendedArticles = Article::where('is_published', true)
            ->when($excludeIds->isNotEmpty(), fn ($q) => $q->whereNotIn('id', $excludeIds))
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get()
            ->map(fn ($a) => $this->mapArticle($a))
            ->toArray();
    }

    protected function mapArticle(Article $a): array
    {
        return [
            'id'      => $a->id,
            'image'   => $a->image ? asset('storage/' . $a->image) : '/assets/img/post-2.jpg',
            'title'   => $a->title,
            'excerpt' => $a->excerpt ?? Str::limit(strip_tags($a->content), 120),
            'date'    => $a->published_at?->format('d M Y') ?? 'Recently',
            'slug'    => $a->slug,
        ];
    }
};
?>

<div class="w-full bg-[#f8f5ee] py-12 px-4 sm:px-6 lg:px-8" style="font-family: 'EB Garamond', serif;">
    <div class="max-w-7xl mx-auto space-y-12">

        {{-- ========================================== --}}
        {{-- SECTION 1: SIMILAR ARTICLES (Auto Carousel) --}}
        {{-- ========================================== --}}
        <section>
            <div class="flex items-center gap-4 mb-6">
                <span class="bg-[#c9a227] text-white text-xs font-bold tracking-widest uppercase px-3 py-1.5">
                    Similar Articles
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>

            @if(count($similarArticles))
            <div
                x-data="{
                    track: null,
                    timer: null,
                    paused: false,
                    init() {
                        this.track = this.$refs.track;
                        this.start();
                    },
                    start() {
                        this.timer = setInterval(() => {
                            if (!this.paused) this.advance();
                        }, 3500);
                    },
                    advance() {
                        const atEnd = this.track.scrollLeft + this.track.clientWidth >= this.track.scrollWidth - 5;
                        if (atEnd) {
                            this.track.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            this.track.scrollBy({ left: this.track.clientWidth * 0.9, behavior: 'smooth' });
                        }
                    },
                    scroll(dir) {
                        if (dir === -1) {
                            const atStart = this.track.scrollLeft <= 5;
                            if (atStart) {
                                this.track.scrollTo({ left: this.track.scrollWidth, behavior: 'smooth' });
                            } else {
                                this.track.scrollBy({ left: -this.track.clientWidth * 0.9, behavior: 'smooth' });
                            }
                        } else {
                            this.advance();
                        }
                    }
                 }"
                @mouseenter="paused = true"
                @mouseleave="paused = false"
                x-init="init()"
                class="relative"
            >
                <button @click="scroll(-1)" aria-label="Previous"
                    class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white shadow-md border border-gray-200 flex items-center justify-center hover:bg-[#c9a227] hover:text-white hover:border-[#c9a227] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="scroll(1)" aria-label="Next"
                    class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white shadow-md border border-gray-200 flex items-center justify-center hover:bg-[#c9a227] hover:text-white hover:border-[#c9a227] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <div x-ref="track" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-2 [&::-webkit-scrollbar]:hidden" style="scrollbar-width: none;">
                    @foreach($similarArticles as $post)
                        <div class="min-w-[85%] sm:min-w-[45%] lg:min-w-[31%] snap-start bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 group hover:shadow-md transition-shadow duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <div class="p-5 flex flex-col justify-between min-h-[220px]">
                                <div>
                                    <h3 class="text-lg font-serif font-bold text-gray-900 leading-tight mb-3 line-clamp-2 group-hover:text-[#c9a227] transition-colors">
                                        {{ $post['title'] }}
                                    </h3>
                                    <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3">
                                        {{ $post['excerpt'] }}
                                    </p>
                                </div>

                                <div>
                                    <a href="{{ url('/post/'.$post['slug']) }}" wire:navigate class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-gray-900 hover:text-[#c9a227] transition-colors mb-3">
                                        Read Full Brief
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                                    </a>
                                    <div class="text-[10px] text-gray-400 italic border-t border-gray-100 pt-3">
                                        {{ $post['date'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
                <p class="text-sm text-gray-500">No similar articles found.</p>
            @endif
        </section>

        {{-- ========================================== --}}
        {{-- SECTION 2: RECOMMENDED ARTICLES (Auto Carousel) --}}
        {{-- ========================================== --}}
        <section>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-4 flex-grow">
                    <span class="bg-[#c9a227] text-white text-xs font-bold tracking-widest uppercase px-3 py-1.5">
                        Recommended Articles
                    </span>
                    <div class="h-[1px] bg-gray-300 flex-grow"></div>
                </div>
                <a href="{{ url('/articles') }}" wire:navigate class="text-sm font-medium text-gray-700 hover:text-[#c9a227] transition-colors ml-4 whitespace-nowrap">
                    See all
                </a>
            </div>

            @if(count($recommendedArticles))
            <div
                x-data="{
                    track: null,
                    timer: null,
                    paused: false,
                    init() {
                        this.track = this.$refs.track;
                        this.start();
                    },
                    start() {
                        this.timer = setInterval(() => {
                            if (!this.paused) this.advance();
                        }, 3500);
                    },
                    advance() {
                        const atEnd = this.track.scrollLeft + this.track.clientWidth >= this.track.scrollWidth - 5;
                        if (atEnd) {
                            this.track.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            this.track.scrollBy({ left: this.track.clientWidth * 0.9, behavior: 'smooth' });
                        }
                    },
                    scroll(dir) {
                        if (dir === -1) {
                            const atStart = this.track.scrollLeft <= 5;
                            if (atStart) {
                                this.track.scrollTo({ left: this.track.scrollWidth, behavior: 'smooth' });
                            } else {
                                this.track.scrollBy({ left: -this.track.clientWidth * 0.9, behavior: 'smooth' });
                            }
                        } else {
                            this.advance();
                        }
                    }
                 }"
                @mouseenter="paused = true"
                @mouseleave="paused = false"
                x-init="init()"
                class="relative"
            >
                <button @click="scroll(-1)" aria-label="Previous"
                    class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white shadow-md border border-gray-200 flex items-center justify-center hover:bg-[#c9a227] hover:text-white hover:border-[#c9a227] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="scroll(1)" aria-label="Next"
                    class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white shadow-md border border-gray-200 flex items-center justify-center hover:bg-[#c9a227] hover:text-white hover:border-[#c9a227] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <div x-ref="track" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-2 [&::-webkit-scrollbar]:hidden" style="scrollbar-width: none;">
                    @foreach($recommendedArticles as $post)
                        <div class="min-w-[85%] sm:min-w-[45%] lg:min-w-[31%] snap-start bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 group hover:shadow-md transition-shadow duration-300">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <div class="p-5 flex flex-col justify-between min-h-[220px]">
                                <div>
                                    <h3 class="text-lg font-serif font-bold text-gray-900 leading-tight mb-3 line-clamp-2 group-hover:text-[#c9a227] transition-colors">
                                        {{ $post['title'] }}
                                    </h3>
                                    <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3">
                                        {{ $post['excerpt'] }}
                                    </p>
                                </div>

                                <div>
                                    <a href="{{ url('/post/'.$post['slug']) }}" wire:navigate class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-gray-900 hover:text-[#c9a227] transition-colors mb-3">
                                        Read Full Brief
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                                    </a>
                                    <div class="text-[10px] text-gray-400 italic border-t border-gray-100 pt-3">
                                        {{ $post['date'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
                <p class="text-sm text-gray-500">No recommended articles found.</p>
            @endif
        </section>

    </div>
</div>