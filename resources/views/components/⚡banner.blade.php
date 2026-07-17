<?php

use Livewire\Component;

new class extends Component
{
    public $title;

    public function mount($title = 'About Us')
    {
        $this->title = $title;
    }
}; 
?>

<div>
    {{-- Page Header Section --}}
    <section class="relative w-full bg-[#0b1220] py-16 md:py-20 px-6 md:px-12 lg:px-24 overflow-hidden">
        
        {{-- Gold Top Border (Matches Screenshot) --}}
        <div class="absolute top-0 left-0 w-full h-[2px] bg-[#c9a227]"></div>

        {{-- Title Container --}}
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-serif tracking-wide" style="font-family: 'Playfair Display', serif;">
                {{ $title }}
            </h1>
        </div>

    </section>
</div>