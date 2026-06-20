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

<div>
    <section class="relative w-full h-[85vh] md:h-[95vh] overflow-hidden">
        @if(!$this->post)
            <div class="w-full h-full flex items-center justify-center bg-gray-900 text-white">
                <p>No published post available.</p>
            </div>
        @else
            {{-- Static Image --}}
            <div class="w-full h-full">
                <img 
                    src="{{ asset('storage/' . $this->post->image) }}" 
                    alt="{{ $this->post->title }}" 
                    class="w-full h-full object-cover object-center"
                >
                {{-- Dark overlay on image --}}
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f172a]/50 to-[#0f172a]/70"></div>
            </div>

            {{-- Black background bar at bottom --}}
            <div class="absolute bottom-0 items-center left-0 w-full bg-gradient-to-b from bg-black/80 to bg-black/80 text-white px-6 md:px-12 lg:px-16 py-6 z-10">
                {{-- Title --}}
                <h2 class="text-[clamp(1.4rem,3vw,2.5rem)] font-bold mb-3">
                    {{ $this->post->title }}
                </h2>

                {{-- Views and Comments --}}
                <div class="flex items-center mx-auto  gap-6 text-sm md:text-base text-gray-200">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        32 Views
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.687 3.227 1.087.16 2.184.283 3.287.368v4.28a.75.75 0 0 0 1.28.53l3.712-3.712a.42.42 0 0 1 .298-.123h3.754c1.564 0 2.687-1.407 2.687-3.007V6.627c0-1.6-1.123-2.994-2.687-3.227A26.373 26.373 0 0 0 12 3c-1.103 0-2.2-.088-3.287-.227C7.149 2.54 6.026 1.133 4.462 2.733 2.899 2.966 1.776 4.36 1.776 5.96v6.8Z" />
                        </svg>
                        18 Comments
                    </div>
                </div>
            </div>
        @endif
    </section>

    {{-- ✅ POST CONTENT PLACED EXACTLY HERE — BELOW THE SECTION YOU SPECIFIED --}}
    @if($this->post)
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16 py-8">
            <div class="prose prose-lg max-w-none">
                {!! $this->post->content !!}
            </div>
        </div>
    @endif
</div>