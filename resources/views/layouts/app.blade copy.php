<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        
        <style type="text/tailwindcss">
            @layer utilities {
                .backdrop-blur-md {
                    backdrop-filter: blur(12px);
                    -webkit-backdrop-filter: blur(12px);
                }
            }
        </style>
        @livewireStyles
        
        <!-- Title -->
        <title>@yield('title', 'GRC')</title>
        <link rel="icon" href="{{ asset('assets/img/fav-icon.svg') }}" type="image/gif" sizes="20x20">
        
        @livewireStyles
        @stack('styles')
    </head>
    <body id="body">
        <!-- scroll top start -->
        <div class="circle-container">
            <svg class="circle-progress svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919; stroke-dashoffset: 256.939;"></path>
            </svg>
        </div>
        <!-- scroll top end -->

        <!-- Header Component -->
        @livewire('header') 

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer Component -->
        @livewire('footer')

        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.marquee.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        
        @livewireScripts
        @stack('scripts')
    </body>
</html>