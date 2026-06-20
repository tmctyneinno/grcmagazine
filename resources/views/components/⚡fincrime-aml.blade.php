<?php

use Livewire\Component;

new class extends Component
{
    public $posts = [
        [
            'image' => '/assets/img/post-1.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-generation-1'
        ],
        [
            'image' => '/assets/img/post-2.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-generation-2'
        ],
        [
            'image' => '/assets/img/post-3.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-generation-3'
        ],
        [
            'image' => '/assets/img/post-4.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-generation-4'
        ],
        [
            'image' => '/assets/img/post-2.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-generation-5'
        ],
        [
            'image' => '/assets/img/post-3.jpg',
            'title' => 'Redefining GRC for a new generation',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 16, 2026',
            'slug' => 'redefining-grc-generation-6'
        ],
        [
            'image' => '/assets/img/post-4.jpg',
            'title' => 'A second wave of compliance reform',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 20, 2026',
            'slug' => 'redefining-grc-generation-7'
        ],
        [
            'image' => '/assets/img/post-1.jpg',
            'title' => 'Why financial crime teams are rethinking risk',
            'excerpt' => 'A Place to Call Home For a long time, we simply wanted to build something that felt like a home rather than just another..',
            'date' => 'Jan 22, 2026',
            'slug' => 'redefining-grc-generation-8'
        ],
    ];

    public $currentPage = 1;
    public $perPage = 6;

    public function setPage($page)
    {
        $this->currentPage = $page;
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->totalPages()) {
            $this->currentPage++;
        }
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
        }
    }

    public function totalPages()
    {
        return (int) ceil(count($this->posts) / $this->perPage);
    }

    public function getPaginatedPostsProperty()
    {
        $offset = ($this->currentPage - 1) * $this->perPage;

        return array_slice($this->posts, $offset, $this->perPage);
    }
};
?>

<div class="max-w-6xl mx-auto px-4 py-16 bg-white">
    {{-- Header --}}
    <div class="mb-10">
        <h2 class="text-[clamp(1.5rem,3vw,2rem)] font-bold text-gray-900 relative inline-block">
            Fincrime & AML
            <span class="absolute -bottom-1 left-0 w-full h-1 bg-red-600"></span>
        </h2>
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        @foreach ($this->paginatedPosts as $post)
            <div class="bg-white rounded-3xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg">
                {{-- Image --}}
                <div class="h-60 overflow-hidden">
                    <img
                        src="{{ $post['image'] }}"
                        alt="{{ $post['title'] }}"
                        class="w-full h-full object-cover"
                    >
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
                            href="{{ url('/post/' . $post['slug']) }}"
                            wire:navigate
                            class="rounded-2xl px-4 py-1.5 bg-red-600 text-white text-xs font-medium  hover:bg-red-700 transition"
                        >
                            Read More..
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    @if ($this->totalPages() > 1)
        <div class="flex justify-center items-center gap-3">
            <button
                wire:click="previousPage"
                @disabled($currentPage === 1)
                class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition disabled:opacity-40 disabled:cursor-not-allowed"
                aria-label="Previous page"
            >
                &laquo;
            </button>

            @for ($i = 1; $i <= $this->totalPages(); $i++)
                <button
                    wire:click="setPage({{ $i }})"
                    @class([
                        'w-9 h-9 flex items-center justify-center rounded-full font-medium transition',
                        'bg-red-600 text-white hover:bg-red-700' => $currentPage === $i,
                        'bg-gray-100 text-gray-700 hover:bg-gray-200' => $currentPage !== $i,
                    ])
                    aria-current="{{ $currentPage === $i ? 'page' : 'false' }}"
                >
                    {{ $i }}
                </button>
            @endfor

            <button
                wire:click="nextPage"
                @disabled($currentPage === $this->totalPages())
                class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition disabled:opacity-40 disabled:cursor-not-allowed"
                aria-label="Next page"
            >
                &raquo;
            </button>
        </div>
    @endif
</div>