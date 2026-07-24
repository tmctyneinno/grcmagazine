<?php

use Livewire\Component;
use App\Models\Article;
use App\Models\Event; // ✅ Import Event Model
use Illuminate\Support\Str;

new class extends Component
{
    public $regulatoryArticles = [];
    public $upcomingEvents = []; // ✅ New property for events
    
    // Helper to get color class based on category name
    public function getColorClass($name)
    {
        $lower = strtolower($name);
        if (str_contains($lower, 'fraud')) return 'bg-red-600';
        if (str_contains($lower, 'aml') || str_contains($lower, 'fincrime')) return 'bg-blue-600';
        if (str_contains($lower, 'africa')) return 'bg-pink-600';
        if (str_contains($lower, 'esg') || str_contains($lower, 'governance')) return 'bg-teal-600';
        if (str_contains($lower, 'sanctions')) return 'bg-purple-600';
        return 'bg-gray-600';
    }

    public function mount()
    {
        // 1. Fetch Regulatory Articles
        $this->regulatoryArticles = Article::where('is_published', true)
            ->whereHas('categories', function ($query) {
                $query->whereIn('name', ['Regulatory Watch', 'AML', 'Sanctions', 'FinCrime', 'Governance']);
            })
            ->with(['categories'])
            ->orderBy('published_at', 'desc')
            ->take(2)
            ->get()
            ->map(function ($article) {
                return [
                    'title'       => $article->title,
                    'slug'        => $article->slug,
                    'excerpt'     => $article->excerpt ?? Str::limit($article->content, 150),
                    'image'       => $article->image ? asset('storage/' . $article->image) : 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80',
                    'category'    => $article->categories->first()?->name ?? 'Regulatory',
                    'date'        => $article->published_at?->format('d M Y') ?? 'Recently',
                ];
            })
            ->toArray();

        // 2. Fetch Upcoming Events ✅
        $this->upcomingEvents = Event::where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->take(3)
            ->get()
            ->map(function ($event) {
                return [
                    'title'     => $event->title,
                    'day'       => $event->start_date->format('j'), // Day number (e.g., 6)
                    'month'     => $event->start_date->format('M'), // Short month (e.g., Nov)
                    'location'  => $event->venue_name ?? $event->location ?? 'TBA',
                    'type'      => $event->type ?? 'Event',
                    'slug'      => $event->slug,
                ];
            })
            ->toArray();
    }
};
?>

<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        {{-- ========================================== --}}
        {{-- LEFT COLUMN: MAIN CONTENT (Span 9)         --}}
        {{-- ========================================== --}}
        <div class="lg:col-span-9 flex flex-col gap-16">
            
            {{-- SECTION 1: REGULATORY WATCH HEADER --}}
            <div class="flex items-center gap-4 mb-2">
                <span class="bg-[#dcb352] text-white text-xs font-bold tracking-widest uppercase px-3 py-1.5">
                    Regulatory Watch
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>

            {{-- SECTION 2: DUAL ARTICLE CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                @forelse($regulatoryArticles as $article)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-shadow duration-300">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-3 left-4 flex items-center gap-2">
                            <span class="{{ $this->getColorClass($article['category']) }} text-white text-[10px] font-bold uppercase px-2 py-0.5 rounded-sm">Breaking</span>
                            <span class="text-white text-[10px] font-medium bg-black/30 backdrop-blur-sm px-2 py-0.5 rounded-sm">{{ $article['category'] }}</span>
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-serif font-bold text-gray-900 leading-tight mb-3 group-hover:text-[#dcb352] transition-colors line-clamp-2">
                            {{ $article['title'] }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6 line-clamp-3 flex-grow">
                            {{ $article['excerpt'] }}
                        </p>
                        
                        <div class="border-t border-gray-100 pt-4 mt-auto">
                            <a href="{{ url('/articles/' . $article['slug']) }}" wire:navigate class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-900 hover:text-[#dcb352] transition-colors mb-4">
                                Read Full Brief 
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                            </a>
                            <div class="text-[10px] text-gray-400 italic">{{ $article['category'] }} Desk . {{ $article['date'] }}</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-2 p-10 text-center text-gray-500">No regulatory updates available.</div>
                @endforelse
            </div>

            {{-- SECTION 3: MAGAZINE EDITION BANNER --}}
            <div class="mt-4">
                <div class="flex items-center gap-4 mb-4">
                    <span class="bg-[#dcb352] text-white text-xs font-bold tracking-widest uppercase px-3 py-1.5">
                        Latest Edition
                    </span>
                    <div class="h-[1px] bg-gray-300 flex-grow"></div>
                </div>

                <div class="bg-[#0b1325] rounded-xl p-8 md:p-10 flex flex-col md:flex-row gap-8 items-start shadow-lg relative overflow-hidden">
                    <!-- Subtle background texture -->
                    <div class="absolute top-0 right-0 w-96 h-96 bg-[#dcb352] opacity-[0.03] rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>

                    {{-- Left: Cover Info --}}
                    <div class="md:w-1/3 border-r border-gray-700 pr-8 flex flex-col justify-center text-center md:text-left">
                        <div class="text-[10px] text-[#dcb352] font-bold uppercase tracking-widest mb-3">Vol. VII . Issue 24</div>
                        <h4 class="text-2xl font-serif font-bold text-white leading-tight mb-4">
                            GRC & Financial Crime <span class="text-[#dcb352]">Today</span>
                        </h4>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wide">June 2026 Edition</div>
                    </div>

                    {{-- Right: Content & CTA --}}
                    <div class="md:w-2/3 flex flex-col justify-center">
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-white mb-4">
                            June 2026: The Accountability Edition
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-8 max-w-2xl">
                            This edition examines the tightening of personal accountability regimes across UK and African jurisdictions — from the Senior Managers & Certification Regime to Nigeria’s evolving corporate liability framework for financial crime.
                        </p>
                        <div>
                            <a href="#" class="inline-flex items-center gap-2 bg-[#dcb352] hover:bg-[#c9a227] text-[#0b1325] text-xs font-bold uppercase tracking-widest px-6 py-3 rounded-sm transition-colors">
                                Read Online 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- ========================================== --}}
        {{-- RIGHT COLUMN: SIDEBAR (Span 3)             --}}
        {{-- ========================================== --}}
        <div class="lg:col-span-3 flex flex-col gap-8">
            
            {{-- WIDGET 1: EVENTS & AWARDS (DYNAMIC) ✅ --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-[#0b1325] px-6 py-4 flex items-center justify-between">
                    <h4 class="text-[#dcb352] text-xs font-bold uppercase tracking-widest">Events & Awards</h4>
                    <a href="{{ url('/events') }}" wire:navigate class="text-gray-400 hover:text-white text-[10px] transition-colors">Full Calendar</a>
                </div>

                <div class="divide-y divide-gray-100">
                    @forelse($upcomingEvents as $event)
                    <div class="p-5 flex gap-4 hover:bg-gray-50 transition-colors group cursor-pointer">
                        <div class="text-center min-w-[50px]">
                            <div class="text-2xl font-serif font-bold text-gray-900 leading-none">{{ $event['day'] }}</div>
                            <div class="text-[10px] text-[#dcb352] font-bold uppercase tracking-wider mt-1">{{ $event['month'] }}</div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-start gap-2 mb-1">
                                <h5 class="text-sm font-bold text-gray-900 leading-snug group-hover:text-[#dcb352] transition-colors">{{ $event['title'] }}</h5>
                                <span class="bg-[#dcb352]/10 text-[#dcb352] text-[9px] font-bold uppercase px-2 py-0.5 rounded-sm whitespace-nowrap">{{ $event['type'] }}</span>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-1">{{ $event['location'] }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="p-6 text-center text-gray-500 text-sm">No upcoming events scheduled.</div>
                    @endforelse
                </div>
            </div>

            {{-- WIDGET 2: QUALIFICATIONS --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-[#0b1325] px-6 py-4 flex items-center justify-between">
                    <h4 class="text-[#dcb352] text-xs font-bold uppercase tracking-widest">IGRCFP Qualifications</h4>
                    <a href="#" class="text-gray-400 hover:text-white text-[10px] transition-colors">igrcfp.org</a>
                </div>

                <div class="divide-y divide-gray-100">
                    {{-- Qual 1 --}}
                    <div class="p-6 hover:bg-gray-50 transition-colors group">
                        <h5 class="text-xs font-bold text-gray-900 uppercase tracking-widest mb-2">IGRCFP - CMLRO</h5>
                        <p class="text-xs text-gray-500 leading-relaxed mb-3">
                            Certified Money Laundering Reporting Officer qualification — benchmarked against the ICA Certified MLRO. Open for enrolment now.
                        </p>
                        <a href="#" class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-gray-900 hover:text-[#dcb352] transition-colors">
                            Read Full Brief 
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>