<?php

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Str;

new class extends Component
{
    public $posts = [];
    public $visiblePostsCount = 6; // Show 6 by default
    public $showAll = false;

    // ✅ Fetch real latest posts from database
    public function mount()
    {
        $this->loadPosts();
    }

    // ✅ Load posts: latest first, only published
    public function loadPosts()
    {
        $query = Article::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc');

        if (!$this->showAll) {
            $query->take($this->visiblePostsCount);
        }

        $this->posts = $query->get()->map(function ($article) {
            return [
                'slug'    => $article->slug,
                'image'   => $article->image ? asset('storage/' . $article->image) : asset('images/default-post.jpg'),
                'title'   => $article->title,
                'excerpt' => Str::limit(strip_tags($article->excerpt ?? ''), 80),
                'date'    => $article->published_at?->format('M d, Y') ?? 'Draft',
            ];
        })->toArray();
    }

    // ✅ Load all posts when button is clicked
    public function viewAll()
    {
        $this->showAll = true;
        $this->loadPosts();
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
    @if(empty($posts))
        <div class="text-center py-12 text-gray-500">
            No articles have been published yet.
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <div class="bg-white rounded-3xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                {{-- Image --}}
                <div class="h-56 bg-gray-200">
                    <img 
                        src="{{ $post['image'] }}" 
                        alt="{{ $post['title'] }}" 
                        class="w-full h-full object-cover"
                        loading="lazy"
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

                    {{-- Date & Read More --}}
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $post['date'] }}
                        </span>

                        {{-- ✅ Correct link to your article page --}}
                        <a 
                            href="{{ route('articles.show', $post['slug']) }}" 
                            class="px-4 py-1.5 bg-red-600 text-white text-xs font-medium rounded-sm shadow hover:bg-red-700 transition"
                        >
                            Read More..
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>