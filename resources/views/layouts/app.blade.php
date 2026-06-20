<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRC & Financial Crime</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .backdrop-blur-md {
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
        }
    </style>
    @livewireStyles
</head>
<body class="bg-[#ff] overflow-x-hidden">
    @livewire('header')
    
    {{-- Main Content Area --}}
    <main>
        @yield('content')
    </main>
    @livewire('footer')
    @livewireScripts
</body>
</html> 