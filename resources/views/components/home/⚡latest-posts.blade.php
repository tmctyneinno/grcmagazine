<?php

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;

new class extends Component
{
    public $posts = [];
    
    // We only need the first 3 posts for this specific layout
    // (1 Hero + 2 Side stories)
    public function mount()
    {
        $this->loadPosts();
    }

    public function loadPosts()
    {
        // Fetch latest 3 published articles
        $articles = Article::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $this->posts = $articles->map(function ($article) {
            return [
                'slug'      => $article->slug,
                'image'     => $article->image ? asset('storage/' . $article->image) : asset('images/default-post.jpg'),
                'title'     => $article->title,
                'excerpt'   => Str::limit(strip_tags($article->excerpt ?? ''), 150), // Longer excerpt for hero
                'date'      => $article->published_at?->format('d F Y') ?? 'Draft',
                'category'  => $article->category?->name ?? 'Breaking',
                'desk'      => $article->author_name ?? 'Editorial Desk', 
            ];
        })->toArray();
    }

    //  REMOVED render() method to fix "View not found" error
};
?>

<div class="w-full max-w-7xl mx-auto px-4 py-8" style="font-family: 'EB Garamond', serif;">
    
    {{-- ✅ HEADER SECTION --}}
    <div class="flex items-center justify-between mb-6 border-b border-gray-200 pb-2">
        <div class="bg-[#c9a227] text-white text-xs font-bold tracking-widest uppercase px-3 py-1">
            Top Stories
        </div>
        <div class="text-sm text-gray-500 italic tracking-wide">
            Today's Edition &middot; {{ now()->format('d F Y') }}
        </div>
    </div>

    @if(empty($posts))
        <div class="text-center py-12 text-gray-500 bg-gray-50 rounded-lg border border-dashed border-gray-300">
            No top stories available at the moment.
        </div>
    @else
        {{-- ✅ MAIN CONTENT GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-8">
            
            {{-- LEFT COLUMN: HERO ARTICLE (Spans 7 cols) --}}
            @if(isset($posts[0]))
            <div class="lg:col-span-7 relative group cursor-pointer h-full min-h-[500px] flex flex-col justify-end overflow-hidden rounded-xl shadow-sm border border-gray-100 bg-white">
                {{-- Background Image --}}
                <img 
                    src="{{ $posts[0]['image'] }}" 
                    alt="{{ $posts[0]['title'] }}" 
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                >
                {{-- Gradient Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-white via-white/90 to-transparent"></div>

                {{-- Content --}}
                <div class="relative z-10 p-8 md:p-10">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-red-700 text-xs font-bold uppercase tracking-wider">{{ $posts[0]['category'] }}</span>
                        <span class="h-[1px] w-8 bg-red-700"></span>
                    </div>
                    
                    <a href="{{ route('articles.show', $posts[0]['slug']) }}">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-4 hover:text-[#c9a227] transition-colors">
                            {{ $posts[0]['title'] }}
                        </h2>
                    </a>

                    <p class="text-gray-600 text-base leading-relaxed mb-6 line-clamp-3">
                        {{ $posts[0]['excerpt'] }}
                    </p>

                    <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                        <a href="{{ route('articles.show', $posts[0]['slug']) }}" class="text-xs font-bold uppercase tracking-widest text-gray-900 hover:text-[#c9a227] flex items-center gap-2">
                            Read Full Brief 
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3" /></svg>
                        </a>
                        <span class="text-xs text-gray-400 italic">{{ $posts[0]['desk'] }} &middot; {{ $posts[0]['date'] }}</span>
                    </div>
                </div>
            </div>
            @endif

            {{-- RIGHT COLUMN: STACKED ARTICLES (Spans 5 cols) --}}
            <div class="lg:col-span-5 flex flex-col gap-6">
                
                {{-- Right Item 1 --}}
                @if(isset($posts[1]))
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex-1 flex flex-col group">
                    <div class="h-48 overflow-hidden relative">
                        <img 
                            src="{{ $posts[1]['image'] }}" 
                            alt="{{ $posts[1]['title'] }}" 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >
                         <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-red-700 text-[10px] font-bold uppercase tracking-wider mb-2">{{ $posts[1]['category'] }}</span>
                        <a href="{{ route('articles.show', $posts[1]['slug']) }}">
                            <h3 class="text-xl font-bold text-gray-900 leading-snug mb-3 hover:text-[#c9a227] transition-colors">
                                {{ $posts[1]['title'] }}
                            </h3>
                        </a>
                        <p class="text-sm text-gray-600 line-clamp-2 mb-4 flex-grow">
                            {{ $posts[1]['excerpt'] }}
                        </p>
                        <div class="border-t border-gray-100 pt-3 mt-auto">
                             <a href="{{ route('articles.show', $posts[1]['slug']) }}" class="text-[10px] font-bold uppercase tracking-widest text-gray-900 hover:text-[#c9a227] flex items-center gap-1">
                                Read Full Brief <span class="text-lg">&rarr;</span>
                            </a>
                            <div class="text-[10px] text-gray-400 mt-2">{{ $posts[1]['desk'] }} &middot; {{ $posts[1]['date'] }}</div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Right Item 2 --}}
                @if(isset($posts[2]))
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex-1 flex flex-col group">
                    <div class="h-48 overflow-hidden relative">
                        <img 
                            src="{{ $posts[2]['image'] }}" 
                            alt="{{ $posts[2]['title'] }}" 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >
                         <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-red-700 text-[10px] font-bold uppercase tracking-wider mb-2">{{ $posts[2]['category'] }}</span>
                        <a href="{{ route('articles.show', $posts[2]['slug']) }}">
                            <h3 class="text-xl font-bold text-gray-900 leading-snug mb-3 hover:text-[#c9a227] transition-colors">
                                {{ $posts[2]['title'] }}
                            </h3>
                        </a>
                        <p class="text-sm text-gray-600 line-clamp-2 mb-4 flex-grow">
                            {{ $posts[2]['excerpt'] }}
                        </p>
                        <div class="border-t border-gray-100 pt-3 mt-auto">
                             <a href="{{ route('articles.show', $posts[2]['slug']) }}" class="text-[10px] font-bold uppercase tracking-widest text-gray-900 hover:text-[#c9a227] flex items-center gap-1">
                                Read Full Brief <span class="text-lg">&rarr;</span>
                            </a>
                            <div class="text-[10px] text-gray-400 mt-2">{{ $posts[2]['desk'] }} &middot; {{ $posts[2]['date'] }}</div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>

        {{-- ✅ INTELLIGENCE DASHBOARD (Stats Bar) --}}
        <div class="bg-[#0b1220] rounded-xl p-8 text-white shadow-lg relative overflow-hidden">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 items-center">
                
                {{-- Label Column --}}
                <div class="lg:col-span-1 border-r border-gray-700 pr-4 hidden lg:block">
                    <h4 class="text-[#c9a227] text-xs font-bold uppercase tracking-widest mb-1">Intelligence<br>Dashboard</h4>
                    <span class="text-gray-400 text-xs">Q2 2026</span>
                </div>

                {{-- Stat 1 --}}
                <div class="text-center lg:text-left border-b lg:border-b-0 lg:border-r border-gray-700 pb-4 lg:pb-0 lg:pr-4">
                    <div class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Global AML Fines YTD</div>
                    <div class="text-3xl font-serif text-[#c9a227]">$3.7B</div>
                    <div class="text-[10px] text-gray-500 mt-1">across 114 enforcement actions</div>
                </div>

                {{-- Stat 2 --}}
                <div class="text-center lg:text-left border-b lg:border-b-0 lg:border-r border-gray-700 pb-4 lg:pb-0 lg:pr-4">
                    <div class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">FATF Grey Listed States</div>
                    <div class="text-3xl font-serif text-[#c9a227]">23</div>
                    <div class="text-[10px] text-gray-500 mt-1">+2 added June plenary</div>
                </div>

                {{-- Stat 3 --}}
                <div class="text-center lg:text-left border-b lg:border-b-0 lg:border-r border-gray-700 pb-4 lg:pb-0 lg:pr-4">
                    <div class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">UK SARs Filed (Q1 2026)</div>
                    <div class="text-3xl font-serif text-[#c9a227]">950K</div>
                    <div class="text-[10px] text-gray-500 mt-1">up 12% year-on-year</div>
                </div>

                {{-- Stat 4 --}}
                <div class="text-center lg:text-left">
                    <div class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Crypto Enforcement Actions</div>
                    <div class="text-3xl font-serif text-[#c9a227]">61</div>
                    <div class="text-[10px] text-gray-500 mt-1">Global, Q1-Q2 2026</div>
                </div>

            </div>
        </div>
    @endif
</div>