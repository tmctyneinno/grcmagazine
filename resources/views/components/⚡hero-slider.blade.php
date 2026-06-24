<?php

use Livewire\Component;
use App\Models\Article;

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
                    'image'       => $article->featured_image ? asset('storage/' . $article->featured_image) : asset('images/default-article.jpg'),
                    'date'        => $article->published_at?->format('d F, Y') ?? 'Not published',
                    'title'       => $article->title,
                    'description' => $article->excerpt ?? '',
                    'slug'        => $article->slug,
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
};
?>

<div 
    x-data="{ 
        current: @entangle('currentSlide'),
        init() {
            setInterval(() => {
                if (this.current !== undefined) {
                    $wire.nextSlide();
                }
            }, 5000);
        }
    }"
>
    <section class="relative w-full h-[85vh] md:h-[95vh] overflow-hidden">
        @if(empty($slides))
            <div class="w-full h-full flex items-center justify-center bg-gray-900 text-white">
                <p>No published articles available.</p>
            </div>
        @else
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out">
                <img 
                    src="{{ asset('storage/' .  $slides[$currentSlide]['image'] ) }}"
                    alt="{{ $slides[$currentSlide]['title'] }}" 
                    class="w-full h-full object-cover object-center"
                    loading="lazy"
                >
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f172a]/70 to-[#0f172a]/90"></div>
            </div>

            <div class="absolute bottom-0 left-0 w-full px-6 md:px-12 lg:px-16 pb-12 md:pb-16 z-10 text-white">
                <div class="max-w-7xl mx-auto transition-all duration-1000 ease-in-out">
                    <p class="text-gray-300 text-sm md:text-base mb-2">
                        {{ $slides[$currentSlide]['date'] }}
                    </p>
                    <h1 class="text-[clamp(1.8rem,4vw,4rem)] font-bold leading-tight mb-4">
                        {{ $slides[$currentSlide]['title'] }}
                    </h1>
                    <p class="text-gray-200 text-base md:text-lg max-w-4xl mb-6">
                        {{ $slides[$currentSlide]['description'] }}
                    </p>
                    {{-- ✅ FIXED LINK — matches your route --}}
                    <a 
                        href="{{ route('articles.show', $slides[$currentSlide]['slug']) }}" 
                        class="inline-block bg-white/20 hover:bg-white/30 text-white px-6 py-2 rounded-full transition backdrop-blur-sm"
                    >
                        Read Article
                    </a>
                </div>
            </div>

            <button 
                wire:click="prevSlide" 
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 text-white p-3 rounded-full transition z-20"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            <button 
                wire:click="nextSlide" 
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 text-white p-3 rounded-full transition z-20"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        @endif
    </section>
</div>