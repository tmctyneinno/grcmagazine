<?php

use Livewire\Component;
use App\Models\Article;

new class extends Component
{
    public $post;

    public function mount()
    {
        // Get only 1 latest published post
        $this->post = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->first();
    }
};
?>

<div class="min-h-screen bg-[#f8f6f0]" style="font-family: 'EB Garamond', serif;">
    
    @if(!$post)
        <div class="w-full h-screen flex items-center justify-center bg-gray-900 text-white">
            <p>No published post available.</p>
        </div>
    @else
        {{-- ✅ NEW HEADER SECTION (Matches Screenshot) --}}
       
    @endif
</div>