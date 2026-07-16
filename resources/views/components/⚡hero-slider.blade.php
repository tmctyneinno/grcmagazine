<?php

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;

new class extends Component
{
    public $slides = [];
    public $currentSlide = 0;

    public function mount()
    {
        $this->slides = Article::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($article) {
                return [
                    'image'       => $article->image ? asset('storage/' . $article->image) : asset('images/default-article.jpg'),
                    'date'        => $article->published_at?->format('d F, Y') ?? 'Not published',
                    'title'       => $article->title,
                    'description' => $article->excerpt ?? '',
                    'slug'        => $article->slug,
                    'category'    => $article->category?->name ?? 'Featured Story',
                ];
            })
            ->toArray();
    }

    public function nextSlide()
    {
        if (count($this->slides) > 0) {
            $this->currentSlide = ($this->currentSlide + 1) % count($this->slides);
        }
    }

    public function prevSlide()
    {
        if (count($this->slides) > 0) {
            $this->currentSlide = ($this->currentSlide - 1 + count($this->slides)) % count($this->slides);
        }
    }

    public function goToSlide($index)
    {
        if ($index >= 0 && $index < count($this->slides)) {
            $this->currentSlide = $index;
        }
    }
};
?>

{{-- ✅ SINGLE ROOT ELEMENT for Livewire --}}
<div class="w-full">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=EB+Garamond:ital,wght@0,400;0,500;1,400&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Gold top divider --}}
    <div class="w-full h-[3px]" style="background: linear-gradient(90deg, #c9a227, #e6c866 50%, #c9a227);"></div>

    <div
        x-data="{
            current: @entangle('currentSlide'),
            paused: false,
            init() {
                setInterval(() => {
                    if (!this.paused && this.current !== undefined) {
                        $wire.nextSlide();
                    }
                }, 5000);
            }
        }"
        @mouseenter="paused = true"
        @mouseleave="paused = false"
        style="font-family: 'EB Garamond', serif;"
    >
        <section class="relative w-full h-[85vh] md:h-[92vh] overflow-hidden" style="background:#0b1220;">
            @if(empty($slides))
                <div class="w-full h-full flex items-center justify-center" style="background:#0f172a;">
                    <p class="tracking-[0.2em] text-sm uppercase" style="color:#9aa4b2; font-family:'Inter',sans-serif;">
                        No published articles available
                    </p>
                </div>
            @else
                {{-- Background Image & Overlay --}}
                <div class="absolute inset-0 w-full h-full transition-opacity duration-[800ms] ease-in-out">
                    <img
                        src="{{ $slides[$currentSlide]['image'] }}"
                        alt="{{ $slides[$currentSlide]['title'] }}"
                        class="w-full h-full object-cover object-center scale-[1.02]"
                        loading="lazy"
                    >
                    <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(11,18,32,0.35) 0%, rgba(11,18,32,0.55) 45%, rgba(11,18,32,0.94) 100%);"></div>
                </div>

                {{-- ✅ CONTENT NOW DEFINITELY MOVED UP — uses negative bottom offset --}}
                <div class="absolute bottom-0 left-0 w-full px-6 md:px-14 lg:px-20 pb-12 md:pb-16 -translate-y-12 md:-translate-y-16 z-10">
                    <div class="max-w-3xl transition-all duration-600 ease-in-out">

                        {{-- Category Label --}}
                        <div class="flex items-center gap-3 mb-5">
                            <span class="inline-block w-8 h-[1px]" style="background:#c9a227;"></span>
                            <span class="text-xs md:text-sm uppercase tracking-[0.25em]" style="color:#c9a227; font-family:'Inter',sans-serif; font-weight:600;">
                                {{ $slides[$currentSlide]['category'] }}
                            </span>
                        </div>

                        {{-- Headline --}}
                        <a href="{{ route('articles.show', $slides[$currentSlide]['slug']) }}" class="block group">
                            <h1
                                class="text-[clamp(1.9rem,3.4vw,3.25rem)] font-semibold leading-[1.15] mb-4 transition-colors"
                                style="font-family:'Playfair Display', serif; color:#f8f7f3;"
                            >
                                {{ Str::limit($slides[$currentSlide]['title'], 60) }}
                            </h1>
                        </a>

                        {{-- Divider --}}
                        <div class="w-16 h-[1px] mb-5" style="background:#c9a227;"></div>

                        {{-- Description --}}
                        <p class="text-base md:text-lg leading-relaxed mb-3 italic" style="color:#d7dae2; font-weight:400;">
                            {{ Str::limit($slides[$currentSlide]['description'], 220) }}
                        </p>

                        {{-- Meta Info --}}
                        <p class="text-xs md:text-sm uppercase tracking-[0.2em]" style="color:#9aa4b2; font-family:'Inter',sans-serif;">
                            {{ $slides[$currentSlide]['date'] }}
                            <span class="mx-2" style="color:#c9a227;">&middot;</span>
                            {{ $currentSlide + 1 }} of {{ count($slides) }}
                        </p>
                    </div>
                </div>

                {{-- Previous Button --}}
                <button
                    wire:click="prevSlide"
                    aria-label="Previous story"
                    class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full flex items-center justify-center z-20 transition-all duration-300 border"
                    style="border-color:rgba(201,162,39,0.4); background:rgba(11,18,32,0.35); color:#f5f1e8;"
                    onmouseover="this.style.borderColor='#c9a227'; this.style.color='#c9a227';"
                    onmouseout="this.style.borderColor='rgba(201,162,39,0.4)'; this.style.color='#f5f1e8';"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>

                {{-- Next Button --}}
                <button
                    wire:click="nextSlide"
                    aria-label="Next story"
                    class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full flex items-center justify-center z-20 transition-all duration-300 border"
                    style="border-color:rgba(201,162,39,0.4); background:rgba(11,18,32,0.35); color:#f5f1e8;"
                    onmouseover="this.style.borderColor='#c9a227'; this.style.color='#c9a227';"
                    onmouseout="this.style.borderColor='rgba(201,162,39,0.4)'; this.style.color='#f5f1e8';"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                {{-- Slide Indicators — moved up to match content --}}
                <div class="absolute bottom-4 left-6 md:left-14 lg:left-20 flex gap-2 z-20">
                    @foreach($slides as $index => $slide)
                        <button
                            wire:click="goToSlide({{ $index }})"
                            aria-label="Go to story {{ $index + 1 }}"
                            class="h-[2px] transition-all duration-500 rounded-full"
                            style="width: {{ $index === $currentSlide ? '32px' : '14px' }}; background: {{ $index === $currentSlide ? '#c9a227' : 'rgba(245,241,232,0.35)' }};"
                        ></button>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</div>