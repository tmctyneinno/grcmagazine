<?php

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;

new class extends Component
{
    public $posts = [];

    public $currentPage = 1;
    public $perPage = 6;

    public function mount()
    {
        $this->posts = Article::where('is_published', true)
            ->whereHas('categories', function ($query) {
                $query->whereIn('name', ['News', 'News & Analytics', 'Analytics']);
            })
            ->with('categories')
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(function ($article) {
                return [
                    'image'   => $article->image
                        ? asset('storage/' . $article->image)
                        : '/assets/img/post-1.jpg',
                    'title'   => $article->title,
                    'excerpt' => $article->excerpt
                        ?? Str::limit(strip_tags($article->content), 150),
                    'date'    => ($article->categories->first()?->name ?? 'News')
                        . ' Desk . '
                        . ($article->published_at?->format('d M Y') ?? 'Recently'),
                    'slug'    => $article->slug,
                ];
            })
            ->toArray();
    }

    public function setPage($page)
    {
        $this->currentPage = $page;
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->totalPages()) {
            $this->currentPage++;
        }
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
        }
    }

    public function totalPages()
    {
        return (int) ceil(count($this->posts) / $this->perPage);
    }

    public function getPaginatedPostsProperty()
    {
        $offset = ($this->currentPage - 1) * $this->perPage;
        return array_slice($this->posts, $offset, $this->perPage);
    }
};
?>

<div class="w-full bg-[#f8f5ee] pt-16 pb-10 px-4 sm:px-6 lg:px-8" style="font-family: 'EB Garamond', serif;">
    <div class="max-w-7xl mx-auto">

        {{-- HEADER SECTION --}}
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-4 flex-grow">
                <span class="bg-[#c9a227] text-white text-xs font-bold tracking-widest uppercase px-4 py-2">
                    News & Analytics
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>
        </div>

        {{-- CARDS GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @forelse ($this->paginatedPosts as $post)
                <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 group hover:shadow-md transition-shadow duration-300">

                    {{-- Image Container --}}
                    <div class="relative h-56 overflow-hidden">
                        <img
                            src="{{ $post['image'] }}"
                            alt="{{ $post['title'] }}"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                        >

                        {{-- Gradient Overlay for Text Readability --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        {{-- Floating Title (Over Image) --}}
                        <div class="absolute bottom-0 left-0 w-full p-5">
                            <h3 class="text-xl font-serif font-bold text-white leading-tight mb-2 drop-shadow-md line-clamp-2">
                                {{ $post['title'] }}
                            </h3>
                        </div>
                    </div>

                    {{-- Content Area --}}
                    <div class="p-5 pt-2">
                        <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3 min-h-[60px]">
                            {{ $post['excerpt'] }}
                        </p>

                        <div class="flex flex-col gap-3">
                            <a href="{{ url('/post/'.$post['slug']) }}" wire:navigate class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-gray-900 hover:text-[#c9a227] transition-colors">
                                Read Full Brief
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                            </a>

                            <div class="text-[10px] text-[#c9a227] italic border-t border-gray-100 pt-3">
                                {{ $post['date'] }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10">
                    No news articles available yet.
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if ($this->totalPages() > 1)
            <div class="flex justify-center items-center gap-3 mt-8">
                <button
                    wire:click="previousPage"
                    @disabled($currentPage === 1)
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-[#c9a227] hover:text-white hover:border-[#c9a227] transition disabled:opacity-40 disabled:cursor-not-allowed"
                    aria-label="Previous page"
                >
                    &laquo;
                </button>

                @for ($i = 1; $i <= $this->totalPages(); $i++)
                    <button
                        wire:click="setPage({{ $i }})"
                        @class([
                            'w-10 h-10 flex items-center justify-center rounded-full font-medium transition border',
                            'bg-[#c9a227] text-white border-[#c9a227]' => $currentPage === $i,
                            'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' => $currentPage !== $i,
                        ])
                        aria-current="{{ $currentPage === $i ? 'page' : 'false' }}"
                    >
                        {{ $i }}
                    </button>
                @endfor

                <button
                    wire:click="nextPage"
                    @disabled($currentPage === $this->totalPages())
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-[#c9a227] hover:text-white hover:border-[#c9a227] transition disabled:opacity-40 disabled:cursor-not-allowed"
                    aria-label="Next page"
                >
                    &raquo;
                </button>
            </div>
        @endif

    </div>
</div>