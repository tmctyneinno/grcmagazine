<?php

use Livewire\Component;
use App\Models\Event;

new class extends Component
{
    public $event;

    public function mount($eventId)
    {
        $this->event = Event::findOrFail($eventId);
    }
};
?>

<div class="min-h-screen bg-[#f8f6f0]" style="font-family: 'EB Garamond', serif;">
    
    @if(!$event)
        <div class="w-full h-screen flex items-center justify-center bg-gray-900 text-white">
            <p>Event not found.</p>
        </div>
    @else
        {{-- ✅ HEADER SECTION WITH BACKGROUND IMAGE --}}
        <header class="relative w-full min-h-[50vh] md:min-h-[60vh] flex items-end pb-12 px-6 md:px-12 lg:px-20 overflow-hidden">
            
            {{-- Background Image & Overlay --}}
            <div class="absolute inset-0 w-full h-full z-0">
                <img 
                    src="{{ $event->image ? asset('storage/' . $event->image) : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80' }}" 
                    alt="{{ $event->title }}" 
                    class="w-full h-full object-cover object-center"
                >
                {{-- Dark gradient overlay to ensure text readability --}}
                <div class="absolute inset-0 bg-gradient-to-b from-[#0b1220]/60 via-[#0b1220]/75 to-[#0b1220]/95"></div>
            </div>

            {{-- Content Container (z-10 to sit above image) --}}
            <div class="relative z-10 max-w-5xl mx-auto mt-6 w-full">
                
                {{-- Gold Top Border --}}
                <div class="absolute -top-3 left-0 w-full h-[3px] bg-[#c9a227]"></div>

                {{-- Category & Divider --}}
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-[#c9a227] text-sm font-medium tracking-wide">{{ $event->type ?? 'Event' }}</span>
                    <span class="text-[#c9a227] text-sm">.</span>
                    <span class="text-[#c9a227] text-sm font-medium tracking-wide">{{ $event->start_date->format('d M Y') }}</span>
                    <div class="h-[1px] w-12 bg-[#c9a227]/50 ml-2"></div>
                </div>

                {{-- Main Title --}}
                <h1 class="text-3xl md:text-4xl lg:text-[2.8rem] font-bold text-white leading-tight mb-6 drop-shadow-md" style="font-family: 'Playfair Display', serif;">
                    {{ $event->title }}
                </h1>

                {{-- Sub-tags / Location --}}
                <p class="text-gray-300 text-lg italic mb-6 tracking-wide drop-shadow-sm">
                    {{ $event->venue_name ?? '' }}{{ $event->venue_name && $event->location ? ', ' : '' }}{{ $event->location ?? 'TBA' }}
                </p>

                {{-- Meta Stats (Date & Time) --}}
                <div class="flex items-center gap-8 text-gray-200 text-sm md:text-base">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        <span>{{ $event->start_date->format('l, g:i A') }}</span>
                    </div>
                    
                    @if($event->end_date)
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Ends {{ $event->end_date->format('g:i A') }}</span>
                    </div>
                    @endif
                </div>

            </div>
        </header>

        {{-- EVENT CONTENT BODY --}}
        <main class="max-w-4xl mx-auto px-6 md:px-12 lg:px-20 py-16">
            
            {{-- Date & Share Bar --}}
            <div class="flex flex-wrap items-center justify-between gap-4 mb-10 pb-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <span class="bg-[#c9a227] text-white text-xs font-bold px-3 py-1 rounded-sm uppercase tracking-wide">Registration</span>
                    <span class="text-sm text-gray-500 font-medium">{{ $event->registration_url ? 'Open Now' : 'Contact for Details' }}</span>
                </div>
                
                <div class="flex items-center gap-4 text-gray-400">
                    <button onclick="navigator.clipboard.writeText(window.location.href)" class="hover:text-[#c9a227] transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        <span class="text-xs uppercase tracking-wide">Copy Link</span>
                    </button>
                </div>
            </div>

            {{-- Event Description --}}
            <div class="prose prose-lg prose-headings:font-serif prose-p:text-gray-700 prose-a:text-[#c9a227] max-w-none">
                
                {{-- Drop Cap Intro --}}
                @if($event->description)
                <p class="first-letter:text-7xl first-letter:font-bold first-letter:text-gray-900 first-letter:float-left first-letter:mr-3 first-letter:mt-[-10px] first-letter:font-serif leading-relaxed mb-6">
                    {{ Str::limit($event->description, 150) }}
                </p> 

                {{-- Render remaining content --}}
                {!! nl2br(e($event->description)) !!}
                @else
                <p class="text-gray-500 italic">Full event details coming soon.</p>
                @endif

            </div>

            {{-- Registration CTA --}}
            @if($event->registration_url)
            <div class="mt-12 bg-white border border-gray-200 rounded-xl p-8 md:p-10 shadow-sm text-center">
                <h3 class="text-2xl font-serif font-bold text-gray-900 mb-3">Secure Your Spot</h3>
                <p class="text-gray-600 mb-6 text-lg">Registration is now open for {{ $event->title }}.</p>
                <a href="{{ $event->registration_url }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center justify-center gap-3 bg-[#c9a227] hover:bg-[#b08d1f] text-[#0b1325] font-bold text-sm uppercase tracking-widest px-8 py-4 rounded-sm transition-colors shadow-md">
                    Register Now
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            </div>
            @endif

        </main>
    @endif
</div>