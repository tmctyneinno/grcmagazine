{{-- ✅ SINGLE ROOT ELEMENT for Livewire --}}
<div class="w-full">
    {{-- 🔝 INTELLIGENCE BRIEF TICKER BAR --}}
    <div class="w-full bg-[#0b1120] border-b-2 border-[#2a3143] overflow-hidden">
        <div class="flex items-center py-4 px-6 md:px-10">
            {{-- Left Badge --}}
            <div class="flex-shrink-0 bg-red-700 text-white font-bold text-base md:text-lg px-6 py-2 rounded mr-8 md:mr-12 whitespace-nowrap z-10 tracking-wide">
                INTELLIGENCE BRIEF
            </div>

            {{-- Auto-Scrolling Ticker --}}
            <div class="flex-1 overflow-hidden">
                <div class="flex items-center gap-20 text-amber-200 text-base md:text-lg font-semibold whitespace-nowrap animate-marquee">
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
            <div class="flex-shrink-0 ml-8 pl-8 border-l-2 border-amber-300/30 text-amber-200 text-base md:text-lg font-semibold whitespace-nowrap tracking-wide">
                vol VII . ISSUE 24 . 24 JUN 2026
            </div>
        </div>
    </div>

    {{-- 🧭 NEW MAIN NAVBAR (Matches your image exactly) --}}
    <header class="w-full bg-[#0f1424] border-b-4 border-[#c99b3a]">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-6 flex flex-col lg:flex-row items-center justify-between gap-6">
            {{-- Brand Logo & Tagline - Now in ONE LINE --}}
            <div class="text-center lg:text-left">
                <h2 class="text-2xl md:text-wxl font-serif font-bold text-white">
                    GRC & Financial Crime <span class="text-[#c99b3a]">Today</span>
                </h2>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1.5 font-medium">
                    AN IGRCFP PUBLICATION . THE MORGANS CONSORTIUM
                </p>
            </div>

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:flex items-center gap-4 md:gap-6 text-sm md:text-base font-medium tracking-wide">
                @php
                    $navLinks = [
                        '/' => 'Home',
                        '/about' => 'About',
                        '/news' => 'News',
                        '/fincrime-aml' => 'FinCrime & AML',
                        '/risk-esg' => 'Risk & ESG',
                        '/events' => 'Event',
                        '/contact' => 'Contact',
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
                           'transition-all duration-200 relative pb-0.5',
                           'text-[#c99b3a] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#c99b3a]' => $isActive,
                           'text-gray-300 hover:text-white' => !$isActive,
                       ])
                    >
                        {{ $label }}
                    </a>
                @endforeach

                {{-- Search Icon --}}
                <button class="text-gray-300 hover:text-white transition-colors p-1.5" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607Z" />
                    </svg>
                </button>

                {{-- Subscribe Button --}}
                <a href="{{ url('/subscribe') }}"
                   wire:navigate
                   class="bg-[#c99b3a] hover:bg-[#b3882e] text-black font-bold text-sm px-6 py-2 rounded-lg transition-colors tracking-wide"
                >
                    SUBSCRIBE
                </a>
            </nav>

            {{-- Mobile Menu Button --}}
            <div class="lg:hidden flex items-center justify-between w-full">
                <div></div>
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="text-white text-3xl"
                    :aria-expanded="mobileOpen"
                    aria-label="Toggle navigation menu"
                >
                    <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
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