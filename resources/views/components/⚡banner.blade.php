<?php

use Livewire\Component;

new class extends Component
{
    public $image;
    public $title;

    public function mount($image = '/assets/img/about-banner.jpg', $title = 'About')
    {
        $this->image = $image;
        $this->title = $title;
    }
};
?>

<div>
    <section class="relative w-full h-[50vh] md:h-[40vh] overflow-hidden rounded-b-[40px] bg-black">
        {{-- Dynamic Image with black fallback --}}
        <div class="absolute inset-0 w-full h-70">
            <img
                src="{{ $image }}"
                alt="{{ $title }}"
                class="w-full h-full object-cover object-center"
                onerror="this.style.display='none'; this.parentElement.style.backgroundColor='#000000'"
            >
            <!-- Dark overlay always present -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#0f172a]/60 to-[#0f172a]/80"></div>
        </div>

        {{-- Dynamic Title Text on Left Side --}}
        <div class="absolute left-10 md:left-16 lg:left-24 top-[180px] -translate-y-1/2 z-10 text-white">
            <h1 class="text-[clamp(2.0rem,6vw,3rem)] font-bold tracking-wider">
                {{ $title }}
            </h1>
        </div>
    </section>
</div>