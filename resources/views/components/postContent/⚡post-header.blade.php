<?php

use Livewire\Component;
use App\Models\Article;

new class extends Component
{
    public $post;

    public function mount()
    {
        // Get only 1 latest published post
        $this->post = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->first();
    }
};
?>

<div class="min-h-screen bg-[#f8f6f0]" style="font-family: 'EB Garamond', serif;">
    
    @if(!$post)
        <div class="w-full h-screen flex items-center justify-center bg-gray-900 text-white">
            <p>No published post available.</p>
        </div>
    @else
        {{-- ✅ HEADER SECTION WITH BACKGROUND IMAGE --}}
        <header class="relative w-full min-h-[50vh] md:min-h-[60vh] flex items-end pb-12 px-6 md:px-12 lg:px-20 overflow-hidden">
            
            {{-- Background Image & Overlay --}}
            <div class="absolute inset-0 w-full h-full z-0">
                <img 
                    src="{{ asset('storage/' . $post->image) }}" 
                    alt="{{ $post->title }}" 
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
                    <span class="text-[#c9a227] text-sm font-medium tracking-wide">Breaking</span>
                    <span class="text-[#c9a227] text-sm">.</span>
                    <span class="text-[#c9a227] text-sm font-medium tracking-wide">AML</span>
                    <div class="h-[1px] w-12 bg-[#c9a227]/50 ml-2"></div>
                </div>

                {{-- Main Title --}}
                <h1 class="text-3xl md:text-4xl lg:text-[2.8rem] font-bold text-white leading-tight mb-6 drop-shadow-md" style="font-family: 'Playfair Display', serif;">
                    {{ $post->title }}
                </h1>

                {{-- Sub-tags / Keywords --}}
                <p class="text-gray-300 text-lg italic mb-6 tracking-wide drop-shadow-sm">
                    Insight . Intelligence . Accountability
                </p>

                {{-- Meta Stats (Views & Comments) --}}
                <div class="flex items-center gap-8 text-gray-200 text-sm md:text-base">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span>{{ $post->views_count ?? 32 }} Views</span>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.687 3.227 1.087.16 2.184.283 3.287.368v4.28a.75.75 0 0 0 1.28.53l3.712-3.712a.42.42 0 0 1 .298-.123h3.754c1.564 0 2.687-1.407 2.687-3.007V6.627c0-1.6-1.123-2.994-2.687-3.227A26.373 26.373 0 0 0 12 3c-1.103 0-2.2-.088-3.287-.227C7.149 2.54 6.026 1.133 4.462 2.733 2.899 2.966 1.776 4.36 1.776 5.96v6.8Z" />
                        </svg>
                        <span>{{ $post->comments_count ?? 18 }} Comments</span>
                    </div>
                </div>

            </div>
        </header>

        {{-- ARTICLE CONTENT BODY --}}
        <main class="max-w-4xl mx-auto px-6 md:px-12 lg:px-20 py-16">
            
            {{-- Date & Share Bar --}}
            <div class="flex flex-wrap items-center justify-between gap-4 mb-10 pb-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <span class="bg-[#c9a227] text-white text-xs font-bold px-3 py-1 rounded-sm uppercase tracking-wide">News & Analysis</span>
                    <span class="text-sm text-gray-500 font-medium">{{ $post->published_at?->format('d M, Y') ?? '14th May, 2026' }}</span>
                </div>
                
                <div class="flex items-center gap-4 text-gray-400">
                    <a href="#" class="hover:text-[#1877f2] transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.99 3.65 9.12 8.43 9.87v-6.97h-2.54V12h2.54V9.8c0-2.51 1.49-3.89 3.77-3.89 1.09 0 2.23.19 2.23.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.9h-2.33v6.97C18.35 21.12 22 16.99 22 12z"/></svg></a>
                    <a href="#" class="hover:text-[#e4405f] transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    <a href="#" class="hover:text-black transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
                </div>
            </div>

            {{-- Article Text --}}
            <div class="prose prose-lg prose-headings:font-serif prose-p:text-gray-700 prose-a:text-[#c9a227] max-w-none">
                
                {{-- Drop Cap Intro --}}
                <p class="first-letter:text-7xl first-letter:font-bold first-letter:text-gray-900 first-letter:float-left first-letter:mr-3 first-letter:mt-[-10px] first-letter:font-serif leading-relaxed mb-6">
                    A new wave of professionals is transforming Governance, Risk, and Compliance from a rigid framework into a dynamic force for trust, innovation, and resilience. Governance, Risk, and Compliance (GRC) has long been associated with boardrooms and bureaucracy—a domain reserved for executives and auditors. But that image is changing fast.
                </p> 

                {{-- Render remaining content --}}
                {!! $post->content !!}

            </div>
        </main>
    @endif
</div>