<?php

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;

new class extends Component
{
    public $topStories = [];
    public $latestBriefs = [];
    
    // Color mapping for dynamic category styling
    protected $categoryColors = [
        'AML' => 'text-blue-600',
        'FinCrime' => 'text-blue-600',
        'Fraud' => 'text-red-600',
        'Africa' => 'text-pink-600',
        'ESG' => 'text-teal-600',
        'Governance' => 'text-teal-600',
        'Sanctions' => 'text-purple-600',
        'Crypto' => 'text-indigo-600',
        'Risk' => 'text-orange-600',
    ];

    public function mount()
    {
        // 1. Fetch Top 3 Stories for the main grid
        $this->topStories = Article::where('is_published', true)
            ->with(['categories'])
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get()
            ->map(function ($article) {
                return [
                    'title'       => $article->title,
                    'slug'        => $article->slug,
                    'excerpt'     => $article->excerpt ?? Str::limit($article->content, 150),
                    'category'    => $article->categories->first()?->name ?? 'News',
                ];
            })
            ->toArray();

        // 2. Fetch Next 5 Stories for the sidebar "Latest Briefs"
        $this->latestBriefs = Article::where('is_published', true)
            ->with(['categories'])
            ->orderBy('published_at', 'desc')
            ->skip(3)
            ->take(5)
            ->get()
            ->map(function ($article) {
                return [
                    'title'       => $article->title,
                    'slug'        => $article->slug,
                    'category'    => $article->categories->first()?->name ?? 'News',
                    'published_at'=> $article->published_at,
                ];
            })
            ->toArray();
    }

    // Helper to get color class based on category name
    public function getColorClass($name)
    {
        $lower = strtolower($name);
        foreach ($this->categoryColors as $key => $color) {
            if (str_contains($lower, strtolower($key))) {
                return $color;
            }
        }
        return 'text-gray-600';
    }
};
?>

{{-- ✅ SINGLE ROOT ELEMENT for Livewire --}}
<div class="w-full">
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        {{-- ========================================== --}}
        {{-- LEFT COLUMN: MAIN CONTENT (Span 9)         --}}
        {{-- ========================================== --}}
        <div class="lg:col-span-9 flex flex-col gap-12">
            
            {{-- SECTION 1: TOP STORIES HEADER --}}
            <div class="flex items-center gap-4 mb-2">
                <span class="bg-[#dcb352] text-white text-xs font-bold tracking-widest uppercase px-4 py-1.5">
                    Top Stories
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>

            {{-- SECTION 2: 3-COLUMN GRID CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 border border-gray-200 rounded-lg overflow-hidden bg-white shadow-sm">
                
                @forelse($topStories as $index => $story)
                @php $color = $this->getColorClass($story['category']); @endphp
                <div class="p-8 flex flex-col justify-between h-full min-h-[400px] {{ $loop->remaining > 0 ? 'border-b md:border-b-0 md:border-r border-gray-200' : '' }}">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="{{ $color }} text-xs font-bold uppercase tracking-wider">{{ $story['category'] }}</span>
                            <span class="w-8 h-[2px] {{ $color }}"></span>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-gray-900 leading-tight mb-6 line-clamp-3">
                            {{ $story['title'] }}
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-8 line-clamp-4">
                            {{ $story['excerpt'] }}
                        </p>
                    </div>
                    <a href="{{ url('/articles/' . $story['slug']) }}" wire:navigate class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-900 hover:text-[#dcb352] transition-colors group">
                        Full Analysis 
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                    </a>
                </div>
                @empty
                <div class="col-span-3 p-10 text-center text-gray-500">No top stories available.</div>
                @endforelse
            </div>

            {{-- SECTION 3: OPINION HEADER --}}
            <div class="flex items-center gap-4 mt-4 mb-2">
                <span class="bg-[#dcb352] text-white text-xs font-bold tracking-widest uppercase px-4 py-1.5">
                    Opinion
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>

            {{-- SECTION 4: OPINION QUOTE CARD --}}
            <div class="bg-[#0b1325] rounded-xl p-10 md:p-14 relative overflow-hidden shadow-lg">
                <!-- Decorative background element -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-[0.03] rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>

                <blockquote class="relative z-10">
                    <p class="text-2xl md:text-3xl font-serif italic text-[#e2e8f0] leading-relaxed mb-8">
                        "The compliance profession has spent two decades building frameworks to detect financial crime. It is now time we build institutions capable of preventing it – not merely reporting it after the fact."
                    </p>
                    
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 border-t border-gray-700 pt-6">
                        <div class="text-sm text-[#dcb352] font-medium tracking-wide">
                            — Dr. Enoch Foluso Amusa, PhD <span class="text-gray-500 mx-2">·</span> Founder & Chairman, IGRCFP & The Morgans Consortium
                        </div>
                        
                        <a href="#" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#dcb352] hover:text-white transition-colors group whitespace-nowrap">
                            Read The Full Column 
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                        </a>
                    </div>
                </blockquote>
            </div>

        </div>

        {{-- ========================================== --}}
        {{-- RIGHT COLUMN: SIDEBAR (Span 3)             --}}
        {{-- ========================================== --}}
        <div class="lg:col-span-3">
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden sticky top-6">
                
                {{-- Sidebar Header --}}
                <div class="bg-[#0b1325] px-6 py-4 flex items-center justify-between">
                    <h4 class="text-[#dcb352] text-xs font-bold uppercase tracking-widest">Latest Briefs</h4>
                    <a href="{{ url('/news') }}" wire:navigate class="text-gray-400 hover:text-white text-xs transition-colors">View All</a>
                </div>

                {{-- Sidebar List --}}
                <div class="divide-y divide-gray-100">
                    
                    @forelse($latestBriefs as $brief)
                    @php $color = $this->getColorClass($brief['category']); @endphp
                    <div class="p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                        <span class="text-[10px] font-bold uppercase tracking-wider {{ $color }} mb-2 block">{{ $brief['category'] }}</span>
                        <h5 class="text-sm font-bold text-gray-900 leading-snug mb-2 group-hover:text-[#dcb352] transition-colors line-clamp-2">
                            {{ $brief['title'] }}
                        </h5>
                        <span class="text-[10px] text-gray-400">{{ \Carbon\Carbon::parse($brief['published_at'])->diffForHumans() }}</span>
                    </div>
                    @empty
                    <div class="p-6 text-center text-gray-500 text-sm">No recent briefs available.</div>
                    @endforelse

                </div>
            </div>
        </div>

    </div>
</div>
</div>