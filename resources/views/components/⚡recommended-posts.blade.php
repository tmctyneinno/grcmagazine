<?php

use Livewire\Component;

new class extends Component
{
    // Sample posts data — replace with DB query in production
    public $posts = [
        [
            'image' => '/assets/img/post-4.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-for-a-new-generation'
        ],
        [
            'image' => '/assets/img/post-2.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-for-a-new-generation-2'
        ],
        [
            'image' => '/assets/img/post-3.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-for-a-new-generation-3'
        ],
        [
            'image' => '/assets/img/post-4.jpg',
            'title' => 'New Standards in Financial Compliance',
            'excerpt' => 'We are updating our framework to meet global standards, ensuring safety and trust in every transaction..',
            'date' => 'Feb 02, 2026',
            'slug' => 'new-standards-in-financial-compliance'
        ],
        [
            'image' => '/assets/img/post-2.jpg',
            'title' => 'Risk Management in Modern Business',
            'excerpt' => 'How companies are adapting risk strategies to a fast-changing digital and regulatory landscape..',
            'date' => 'Feb 10, 2026',
            'slug' => 'risk-management-in-modern-business'
        ],
          [
            'image' => '/assets/img/post-3.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-for-a-new-generation-3'
        ],
        [
            'image' => '/assets/img/post-4.jpg',
            'title' => 'New Standards in Financial Compliance',
            'excerpt' => 'We are updating our framework to meet global standards, ensuring safety and trust in every transaction..',
            'date' => 'Feb 02, 2026',
            'slug' => 'new-standards-in-financial-compliance'
        ],
    ];
};
?>

<div class="max-w-6xl mx-auto px-4 py-16">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-[clamp(1.5rem,3vw,2rem)] font-bold text-gray-900 relative">
            Recommended Post
            <span class="absolute -bottom-1 left-0 w-full h-1 bg-red-600"></span>
        </h2>
        <button class="px-6 py-2 rounded-full border border-gray-300 bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition">
            View All
        </button>
    </div>

    {{-- Slider Carousel --}}
    <div 
        x-data="{
            current: 0,
            perView: 3,
            total: {{ count($posts) }},
            get maxIndex() {
                return Math.ceil(this.total / this.perView) - 1;
            },
            next() {
                this.current = this.current < this.maxIndex ? this.current + 1 : 0;
            },
            prev() {
                this.current = this.current > 0 ? this.current - 1 : this.maxIndex;
            },
            init() {
                // Auto-slide every 5 seconds
                setInterval(() => this.next(), 5000);
            }
        }"
        class="relative pb-12" {{-- ➕ Added padding bottom to make space --}}
    >
        {{-- Slides Container --}}
        <div class="overflow-hidden">
            <div 
                class="flex transition-transform duration-500 ease-in-out"
                :style="`transform: translateX(-${current * 100}%)`"
            >
                @foreach(array_chunk($posts, 3) as $slideGroup)
                    <div class="w-full flex-shrink-0 grid grid-cols-1 md:grid-cols-3 gap-6 px-2">
                        @foreach($slideGroup as $post)
                            <div class="relative rounded-3xl overflow-hidden h-[520px] shadow-lg">
                                {{-- Background Image --}}
                                <img 
                                    src="{{ $post['image'] }}" 
                                    alt="{{ $post['title'] }}" 
                                    class="w-full h-full object-cover"
                                >
                                {{-- Gradient Overlay --}}
                                <div class="absolute bottom-0 left-0 w-full h-3/4 bg-gradient-to-t from-black/90 via-black/60 to-transparent"></div>

                                {{-- Content --}}
                                <div class="absolute bottom-0 left-0 w-full p-6 text-white">
                                    <h3 class="text-xl font-semibold mb-3 leading-snug">{{ $post['title'] }}</h3>
                                    <p class="text-sm text-gray-200 mb-4 line-clamp-2">{{ $post['excerpt'] }}</p>

                                    {{-- Date & Button --}}
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-300 flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $post['date'] }}
                                        </span>

                                        <a 
                                            href="{{ url('/post/'.$post['slug']) }}" 
                                            class="px-4 py-1.5 bg-red-600 text-white text-xs font-medium rounded-sm hover:bg-red-700 transition"
                                        >
                                            Read More..
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Navigation Arrows — ⬇️ MOVED FURTHER DOWN --}}
        <button 
            @click="prev()"
            class="absolute right-16 bottom-0 w-10 h-10 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition z-10"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <button 
            @click="next()"
            class="absolute right-4 bottom-0 w-10 h-10 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition z-10"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        {{-- Pagination Dots — ⬇️ MOVED FURTHER DOWN --}}
        <div class="absolute bottom-1 left-4 flex gap-2">
            @for($i = 0; $i < ceil(count($posts)/3); $i++)
                <button 
                    @click="current = {{ $i }}"
                    class="w-3 h-3 rounded-full transition-all"
                    x-bind:class="current === {{ $i }} ? 'bg-red-600 w-6' : 'bg-gray-300'"
                ></button>
            @endfor
        </div>
    </div>
</div>