<div class="px-[50px]"
     x-data="{
         scrolled: false,
         mobileOpen: false,
         moreOpen: false,
         mobileMoreOpen: false
     }"
     @scroll.window="scrolled = window.scrollY > 50"
     @click.away="moreOpen = false">

    <nav class="fixed left-1/2 -translate-x-1/2 w-[90%] max-w-[1200px] z-50 py-2 rounded-[50px] shadow-lg border border-white transition-all duration-300"
         :class="scrolled ? 'bg-white border-gray-200 top-0' : 'bg-transparent border-white top-6'">

        <div class="container mx-auto flex items-center justify-between px-4">
            <!-- Logo -->
            <div class="flex items-center bg-white rounded-[50px] px-4 py-2">
                <a href="{{ url('/') }}" wire:navigate>
                    <img src="/assets/img/logo.png" alt="GRC & Financial Crime" class="h-10">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                @php
                    $links = [
                        '/' => 'Home',
                        '/about' => 'About',
                        '/news' => 'News',
                        '/fincrime-aml' => 'FinCrime & AML',
                        '/risk-esg' => 'Risk & ESG',
                        '/events' => 'Event',
                        '/contact' => 'Contact',
                    ];

                    $moreLinks = [
                        '/technology_ai' => 'Technology, AI & Reg Tech',
                        '/reports_special' => 'Reports & Special Editions',
                        '/research_whitepapers' => 'Research & Whitepapers',
                    ];

                    $isMoreActive = collect(array_keys($moreLinks))
                        ->contains(fn ($path) => request()->is(trim($path, '/') ?: '/'));
                @endphp

                @foreach ($links as $path => $label)
                    @php
                        $isActive = request()->is(trim($path, '/') ?: '/');
                    @endphp
                    <a href="{{ url($path) }}"
                       wire:navigate
                       @if($isActive) aria-current="page" @endif
                       class="transition hover:text-blue-400 relative"
                       :class="!scrolled ? 'text-white' : 'text-black'"
                       @class([
                           'text-blue-500 font-medium after:content-[\'\'] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-[2px] after:bg-blue-500' => $isActive,
                       ])
                    >
                        {{ $label }}
                    </a>
                @endforeach

                <!-- More Dropdown -->
                <div class="relative">
                    <button
                        @click="moreOpen = !moreOpen"
                        class="flex items-center gap-1 transition hover:text-blue-400 relative"
                        :class="!scrolled ? 'text-white' : 'text-black'"
                        @class([
                            'text-blue-500 font-medium after:content-[\'\'] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-[2px] after:bg-blue-500' => $isMoreActive,
                        ])
                        :aria-expanded="moreOpen"
                        aria-haspopup="true"
                    >
                        More
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-200" :class="moreOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="moreOpen"
                         x-transition
                         x-cloak
                         class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-56 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden py-2"
                    >
                        @foreach ($moreLinks as $path => $label)
                            @php
                                $isActive = request()->is(trim($path, '/') ?: '/');
                            @endphp
                            <a href="{{ url($path) }}"
                               wire:navigate
                               @click="moreOpen = false"
                               @if($isActive) aria-current="page" @endif
                               @class([
                                   'block px-5 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-500 transition',
                                   'text-blue-500 font-medium bg-gray-50' => $isActive,
                               ])
                            >
                                {{ $label }}
                            </a>
                        @endforeach
                    </div> 
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="text-2xl transition-colors duration-300"
                    :class="scrolled ? 'text-black' : 'text-white'"
                    :aria-expanded="mobileOpen"
                    aria-label="Toggle navigation menu"
                >
                    <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div x-show="mobileOpen"
             x-transition
             x-cloak
             class="lg:hidden mt-2 mx-2 rounded-[24px] bg-white shadow-lg overflow-hidden"
        >
            <div class="flex flex-col py-2">
                @foreach ($links as $path => $label)
                    @php
                        $isActive = request()->is(trim($path, '/') ?: '/');
                    @endphp
                    <a href="{{ url($path) }}"
                       wire:navigate
                       @click="mobileOpen = false"
                       @if($isActive) aria-current="page" @endif
                       @class([
                           'px-6 py-3 text-black hover:bg-gray-50 transition',
                           'text-blue-500 font-medium' => $isActive,
                       ])
                    >
                        {{ $label }}
                    </a>
                @endforeach

                <!-- More Accordion (mobile) -->
                <button
                    @click="mobileMoreOpen = !mobileMoreOpen"
                    class="flex items-center justify-between px-6 py-3 text-black hover:bg-gray-50 transition"
                    :aria-expanded="mobileMoreOpen"
                >
                    More
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-200" :class="mobileMoreOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="mobileMoreOpen" x-transition x-cloak class="bg-gray-50">
                    @foreach ($moreLinks as $path => $label)
                        @php
                            $isActive = request()->is(trim($path, '/') ?: '/');
                        @endphp
                        <a href="{{ url($path) }}"
                           wire:navigate
                           @click="mobileOpen = false; mobileMoreOpen = false"
                           @if($isActive) aria-current="page" @endif
                           @class([
                               'block pl-10 pr-6 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition',
                               'text-blue-500 font-medium' => $isActive,
                           ])
                        >
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</div>