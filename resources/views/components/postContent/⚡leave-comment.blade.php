<?php

use Livewire\Component;
use App\Models\Comment;
 
new class extends Component
{
    public $name;
    public $email;
    public $website;
    public $comment;
    public $postId;
    public $comments;

    protected $rules = [
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'website' => 'nullable|url|max:255',
        'comment' => 'required|string',
    ];

    public function mount($postId = null)
    {
        $this->postId = $postId;
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = Comment::where('post_id', $this->postId)
            ->where('status', 'approved')
            ->latest()
            ->get();
    }

    public function submit()
    {
        $this->validate();

        if (empty($this->postId) || !is_numeric($this->postId)) {
            session()->flash('error', 'Could not find the article. Please refresh and try again.');
            return;
        }

        Comment::create([
            'post_id' => $this->postId,
            'name'    => $this->name,
            'email'   => $this->email,
            'website' => $this->website,
            'content' => $this->comment,
            'status'  => 'approved',
        ]);

        $this->reset(['name', 'email', 'website', 'comment']);
        $this->loadComments();
        session()->flash('success', 'Comment posted successfully!');
    }

    public function render()
    {
        return <<<'HTML'
        <div class="w-full max-w-6xl mx-auto my-10 px-4 sm:px-6">
            
            {{-- Flash Messages --}}
            @if(session()->has('error'))
                <div class="bg-red-50 border-l-4 border-red-600 text-red-700 p-4 mb-6 rounded shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if(session()->has('success'))
                <div class="bg-green-50 border-l-4 border-green-600 text-green-700 p-4 mb-6 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Existing Comments Section --}}
            @if(isset($comments) && $comments->isNotEmpty())
                <div class="mb-12">
                    <h3 class="text-xl font-serif font-bold text-gray-900 mb-6 border-b border-gray-200 pb-2">
                        Comments ({{ $comments->count() }})
                    </h3>
                    <div class="space-y-6">
                        @foreach($comments as $c)
                            <div class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h4 class="font-bold text-gray-900 text-base">{{ $c->name }}</h4>
                                        @if($c->website)
                                            <a href="{{ $c->website }}" target="_blank" rel="nofollow" class="text-xs text-[#AB8B33] hover:underline block mt-1">
                                                {{ Str::limit($c->website, 30) }}
                                            </a>
                                        @endif
                                    </div>
                                    <span class="text-xs text-gray-400 font-medium">{{ $c->created_at->format('d M, Y') }}</span>
                                </div>
                                <p class="text-gray-700 text-sm leading-relaxed">{{ $c->content }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- ✅ LEAVE A COMMENT FORM (Matches Screenshot) --}}
            <div class="bg-[#f8f5ee] rounded-lg overflow-hidden shadow-sm border border-[#eaddc5]">
                
                {{-- Gold Gradient Header --}}
                <div class="bg-gradient-to-r from-[#AB8B33] via-[#dcb352] to-[#eaddc5] px-6 py-3">
                    <h3 class="text-white font-bold text-lg tracking-wide">Leave a comment</h3>
                </div>

                <div class="p-6 md:p-8">
                    <p class="text-gray-600 text-sm mb-6">
                        Your email address will not be published. Required fields are marked with <span class="text-red-600">*</span>
                    </p>

                    <form wire:submit.prevent="submit" class="space-y-5">
                        
                        {{-- Top Row Inputs --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    wire:model="name" 
                                    placeholder="Name *" 
                                    class="w-full px-4 py-3 bg-[#fdfbf7] border border-gray-400 rounded-md focus:outline-none focus:border-[#AB8B33] focus:ring-1 focus:ring-[#AB8B33] transition-colors placeholder-gray-400 text-gray-800"
                                >
                                @error('name') <span class="absolute -bottom-5 left-0 text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="relative">
                                <input 
                                    type="email" 
                                    wire:model="email" 
                                    placeholder="Email *" 
                                    class="w-full px-4 py-3 bg-[#fdfbf7] border border-gray-400 rounded-md focus:outline-none focus:border-[#AB8B33] focus:ring-1 focus:ring-[#AB8B33] transition-colors placeholder-gray-400 text-gray-800"
                                >
                                @error('email') <span class="absolute -bottom-5 left-0 text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="relative">
                                <input 
                                    type="url" 
                                    wire:model="website" 
                                    placeholder="Website" 
                                    class="w-full px-4 py-3 bg-[#fdfbf7] border border-gray-400 rounded-md focus:outline-none focus:border-[#AB8B33] focus:ring-1 focus:ring-[#AB8B33] transition-colors placeholder-gray-400 text-gray-800"
                                >
                                @error('website') <span class="absolute -bottom-5 left-0 text-red-600 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Comment Textarea --}}
                        <div class="relative">
                            <textarea 
                                wire:model="comment" 
                                placeholder="Comment *" 
                                rows="6" 
                                class="w-full px-4 py-3 bg-[#fdfbf7] border border-gray-400 rounded-md focus:outline-none focus:border-[#AB8B33] focus:ring-1 focus:ring-[#AB8B33] transition-colors placeholder-gray-400 text-gray-800 resize-none"
                            ></textarea>
                            @error('comment') <span class="block mt-1 text-red-600 text-xs">{{ $message }}</span> @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="flex justify-end pt-2">
                            <button 
                                type="submit" 
                                class="bg-[#AB8B33] hover:bg-[#927628] text-white font-semibold px-8 py-2.5 rounded-sm shadow-sm transition-colors duration-200"
                            >
                                Post Comment
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        HTML;
    }
};
?>