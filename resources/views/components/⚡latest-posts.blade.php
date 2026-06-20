<?php

use Livewire\Component;

new class extends Component
{
    // All posts data (replace with DB query in production)
    public $allPosts = [
        [
            'slug' => 'redefining-grc-for-a-new-generation',
            'image' => 'assets/img/post-1.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026'
        ],
        [
            'slug' => 'redefining-grc-for-a-new-generation-2',
            'image' => 'assets/img/post-2.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026'
        ],
        [
            'slug' => 'redefining-grc-for-a-new-generation-3',
            'image' => 'assets/img/post-3.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026'
        ],
        [
            'slug' => 'redefining-grc-for-a-new-generation-4',
            'image' => 'assets/img/post-2.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026'
        ],
        [
            'slug' => 'redefining-grc-for-a-new-generation-5',
            'image' => 'assets/img/post-3.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026'
        ],
        [
            'slug' => 'redefining-grc-for-a-new-generation-6',
            'image' => 'assets/img/post-1.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026'
        ],
        // Extra posts — loaded when clicking View All
        [
            'slug' => 'new-standards-in-financial-compliance',
            'image' => 'assets/img/post-2.jpg',
            'title' => 'New Standards in Financial Compliance',
            'excerpt' => 'We are updating our framework to meet global standards, ensuring safety and trust in every transaction..',
            'date' => 'Feb 02, 2026'
        ],
        [
            'slug' => 'risk-management-in-modern-business',
            'image' => 'assets/img/post-3.jpg',
            'title' => 'Risk Management in Modern Business',
            'excerpt' => 'How companies are adapting risk strategies to a fast-changing digital and regulatory landscape..',
            'date' => 'Feb 10, 2026'
        ],
    ];

    // ✅ MAKE THIS PUBLIC = GLOBAL VARIABLE available directly in Blade
    public $posts = [];
    public $visiblePostsCount = 6; // Show 6 by default
    public $showAll = false;

    // ✅ Runs once when component loads — sets $posts automatically
    public function mount()
    {
        $this->posts = array_slice($this->allPosts, 0, $this->visiblePostsCount);
    }

    // Load all posts when button clicked
    public function viewAll()
    {
        $this->visiblePostsCount = count($this->allPosts);
        $this->posts = array_slice($this->allPosts, 0, $this->visiblePostsCount);
        $this->showAll = true;
    }
};
?>

<div class="max-w-6xl mx-auto px-4 py-10">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-[clamp(1.5rem,3vw,2rem)] font-bold text-gray-900 relative">
            Latest Post
            <span class="absolute -bottom-1 left-0 w-full h-1 bg-red-600"></span>
        </h2>

        {{-- View All Button --}}
        @if(!$showAll)
            <button 
                wire:click="viewAll" 
                class="px-6 py-2 rounded-full border border-gray-300 bg-white text-gray-700 text-sm font-medium hover:bg-gray-50 transition"
            >
                View All
            </button>
        @endif
    </div>

    {{-- Posts Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
        {{-- Added hover:translate-y-[-5px] and hover:shadow-lg for lift effect --}}
        <div class="bg-white rounded-3xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
            {{-- Image or Gray Placeholder --}}
            <div class="h-56 bg-gray-200">
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

                {{-- Date & Read More --}}
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $post['date'] }}
                    </span>

                    {{-- Read More linked to single post page --}}
                    <a 
                        href="{{ url('/post/post-details') }}" 
                        class="px-4 py-1.5 bg-red-600 text-white text-xs font-medium rounded-sm shadow hover:bg-red-700 transition"
                    >
                        Read More..
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>