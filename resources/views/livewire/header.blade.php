{{-- ✅ SINGLE ROOT ELEMENT for Livewire --}}
<div class="w-full">
    {{-- 🔝 INTELLIGENCE BRIEF TICKER BAR --}}
    <div class="w-full bg-[#0b1120] border-b-2 border-[#2a3143] overflow-hidden">
        <div class="flex items-center py-3 px-6 md:px-10">
            {{-- Left Badge --}}
            <div class="flex-shrink-0 bg-red-700 text-white  font-bold text-xs md:text-sm px-4 py-2 rounded mr-8 md:mr-12 whitespace-nowrap z-10 tracking-wide">
                INTELLIGENCE BRIEF
            </div>

            {{-- Auto-Scrolling Ticker --}}
            <div class="flex-1 overflow-hidden">
                <div class="flex items-center gap-20 text-amber-200 text-xs md:text-sm  font-semibold whitespace-nowrap animate-marquee">
                    <span>firm for AML Failings</span>
                    <span>FATF grey-lists three new jurisdictions ahead of plenary session</span>
                    <span>New EU AMLD6 implementation deadline configuration</span>
                    <span>FATF grey-lists three new jurisdictions ahead of plenary session</span>
                    <span>firm for AML Failings</span>
                    <span>FATF grey-lists three new jurisdictions ahead of plenary session</span>
                    <span>New EU AMLD6 implementation deadline configuration</span>
                    <span>FATF grey-lists three new jurisdictions ahead of plenary session</span>
                </div>
            </div>

            {{-- Right Issue Info --}}
            <div class="flex-shrink-0 ml-8 pl-8 border-l-2 border-amber-300/30 text-amber-200 text-xs md:text-sm font-semibold whitespace-nowrap tracking-wide">
                vol VII . ISSUE 24 . 24 JUN 2026
            </div>
        </div>
    </div>

    {{-- 🧭 NEW MAIN NAVBAR (Optimized for single line) --}}
    <header class="w-full bg-[#0f1424] border-b-4 border-[#c99b3a]">
        <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-3 flex items-center justify-between gap-4">
            
            {{-- Brand Logo & Tagline - Compact --}}
            <div class="flex-shrink-0 flex flex-col items-start gap-1">
                <div class="bg-white px-2 py-2 rounded">
                    <img src="/assets/img/logo.png" alt="GRC & Financial Crime" class="h-8 md:h-10">
                </div>
                <div class="hidden lg:block">
                    <p class="text-[9px] text-gray-400 uppercase tracking-wider font-medium leading-tight">
                        AN IGRCFP PUBLICATION<br>THE MORGANS CONSORTIUM
                    </p>
                </div>
            </div>

            {{-- Desktop Navigation - Optimized Spacing --}}
            <nav class="hidden lg:flex items-center gap-3 xl:gap-4 text-sm xl:text-sm font-medium tracking-wide flex-1 justify-center">
                @php
                    $navLinks = [
                        '/' => 'Home',
                        '/about' => 'About',
                        '/news' => 'News',
                        '/fincrime-aml' => 'FinCrime & AML',
                        '/governance-risk-esg' => 'Governance, Risk & ESG',
                        '/technology-ai-regTech' => 'Technology, AI & RegTech',
                        '/events' => 'Events',
                        '/contact' => 'Connect',
                    ];
                @endphp

                @foreach ($navLinks as $path => $label)
                    @php
                        $isActive = request()->is(trim($path, '/') ?: '/');
                    @endphp
                    <a href="{{ url($path) }}"
                       wire:navigate
                       @if($isActive) aria-current="page" @endif
                       @class([
                           'transition-all duration-200 relative pb-0.5 whitespace-nowrap',
                           'text-[#c99b3a] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#c99b3a]' => $isActive,
                           'text-gray-300 hover:text-white' => !$isActive,
                       ])
                    >
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            {{-- Right Section: Search + Subscribe --}}
            <div class="flex-shrink-0 flex items-center gap-3">
                {{-- Search Icon --}}
                <button class="text-gray-300 hover:text-white transition-colors p-1.5" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607Z" />
                    </svg>
                </button>

                {{-- Subscribe Button --}}
                <a href="#"
                   wire:navigate
                   class="bg-[#c99b3a] hover:bg-[#b3882e] text-black font-bold text-xs xl:text-sm px-4 xl:px-5 py-1.5 xl:py-2 rounded-lg transition-colors tracking-wide whitespace-nowrap"
                >
                    SUBSCRIBE
                </a>

                {{-- Mobile Menu Button --}}
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="lg:hidden text-white text-2xl ml-2"
                    :aria-expanded="mobileOpen"
                    aria-label="Toggle navigation menu"
                >
                    <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Navigation Panel --}}
        <div x-show="mobileOpen"
             x-transition
             x-cloak
             class="lg:hidden bg-[#0f1424] border-t border-gray-700"
        >
            <div class="max-w-7xl mx-auto px-4 md:px-8 py-4 flex flex-col gap-4">
                @foreach ($navLinks as $path => $label)
                    @php
                        $isActive = request()->is(trim($path, '/') ?: '/');
                    @endphp
                    <a href="{{ url($path) }}"
                       wire:navigate
                       @click="mobileOpen = false"
                       @if($isActive) aria-current="page" @endif
                       @class([
                           'py-2 px-4 rounded-lg transition-colors text-sm font-medium',
                           'text-[#c99b3a] bg-white/5' => $isActive,
                           'text-gray-300 hover:text-white hover:bg-white/5' => !$isActive,
                       ])
                    >
                        {{ $label }}
                    </a>
                @endforeach

                <div class="flex flex-col gap-3 pt-3 border-t border-gray-700">
                    <button class="flex items-center gap-3 text-gray-300 hover:text-white px-4 py-2 text-sm font-medium transition-colors" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607Z" />
                        </svg>
                        Search
                    </button>
                    <a href="{{ url('/subscribe') }}"
                       wire:navigate
                       @click="mobileOpen = false"
                       class="bg-[#c99b3a] hover:bg-[#b3882e] text-black font-bold text-sm px-6 py-2 rounded-lg text-center transition-colors tracking-wide"
                    >
                        SUBSCRIBE
                    </a>
                </div>
            </div>
        </div>
    </header>
</div>

<style type="text/tailwindcss">
@layer utilities {
    .backdrop-blur-md {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
}
/* Infinite Smooth Ticker Scroll */
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    animation: marquee 28s linear infinite;
}
.animate-marquee:hover {
    animation-play-state: paused;
}
</style>