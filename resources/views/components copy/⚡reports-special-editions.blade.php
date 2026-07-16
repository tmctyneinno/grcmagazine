<?php

use Livewire\Component;

new class extends Component
{
    // Posts data — replace with DB query in production
    public $posts = [
        [
            'image' => '/assets/img/post-1.jpg',
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
        ]
    ];
};
?>

<div class="max-w-6xl mx-auto px-4 py-16">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-[clamp(1.5rem,3vw,2rem)] font-bold text-gray-900 relative">
            posts & Special Editions
            <span class="absolute -bottom-1 left-0 w-full h-1 bg-red-600"></span>
        </h2>
        <button class="px-6 py-2 rounded-full border border-gray-300 bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition">
            View All
        </button>
    </div>

    {{-- Posts Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($posts as $post)
        <div class="bg-white rounded-3xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg">
            {{-- Image / Placeholder --}}
            <div class="h-64 bg-gray-200">
                @if($post['image'])
                    <img 
                        src="{{ $post['image'] }}" 
                        alt="{{ $post['title'] }}" 
                        class="w-full h-full object-cover"
                    >
                @endif
            </div>

            {{-- Content --}}
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-900 mb-2 leading-snug">
                    {{ $post['title'] }}
                </h3>
                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                    {{ $post['excerpt'] }}
                </p>

                {{-- Date & Button --}}
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500 flex items-center gap-1">
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
</div>