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
    public $comments; // ✅ To hold and display existing comments

    protected $rules = [
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'website' => 'nullable|url|max:255',
        'comment' => 'required|string',
    ];

    public function mount($postId = null)
    {
        $this->postId = $postId;
        $this->loadComments(); // ✅ Load comments when component starts
    }

    // ✅ Load only approved comments for this article
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

        // ✅ Set status directly to approved
        Comment::create([
            'post_id' => $this->postId,
            'name'    => $this->name,
            'email'   => $this->email,
            'website' => $this->website,
            'content' => $this->comment,
            'status'  => 'approved', // ✅ Auto-approve
        ]);

        $this->reset(['name', 'email', 'website', 'comment']);
        $this->loadComments(); // ✅ Refresh list after posting
        session()->flash('success', 'Comment posted successfully!');
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- Error Message --}}
            @if(session()->has('error'))
                <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-3 mb-4 rounded max-w-5xl mx-auto">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Success Message --}}
            @if(session()->has('success'))
                <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-3 mb-4 rounded max-w-5xl mx-auto">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ✅ Display Existing Comments --}}
            @if($comments->isNotEmpty())
                <div class="w-full max-w-7xl mx-auto mt-10 mb-6">
                    <div class="max-w-5xl mx-auto">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">Comments ({{ $comments->count() }})</h3>
                        <div class="space-y-5">
                            @foreach($comments as $c)
                                <div class="bg-gray-50 border border-gray-100 rounded-lg p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <h4 class="font-bold text-gray-900">{{ $c->name }}</h4>
                                        <span class="text-xs text-gray-500">{{ $c->created_at->format('d F, Y h:i A') }}</span>
                                    </div>
                                    @if($c->website)
                                        <a href="{{ $c->website }}" target="_blank" rel="nofollow" class="text-sm text-red-600 hover:underline mb-2 inline-block">
                                            {{ $c->website }}
                                        </a>
                                    @endif
                                    <p class="text-gray-700 leading-relaxed">{{ $c->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{-- Leave a Comment Form --}}
            <div class="w-full max-w-7xl mx-auto my-[40px]">
                <div class="bg-gradient-to-r from-red-700 via-red-500 to-red-100 text-white font-semibold text-lg py-3 px-6 rounded-t-md">
                    Leave a comment
                </div>

                <div class="max-w-5xl mx-auto">
                    <p class="text-gray-600 text-sm my-4 px-1">
                        Your email address will not be published. Required fields are marked with *
                    </p>

                    <form wire:submit.prevent="submit" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <input 
                                    type="text" 
                                    wire:model="name" 
                                    placeholder="Name *" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-red-600"
                                >
                                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <input 
                                    type="email" 
                                    wire:model="email" 
                                    placeholder="Email *" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-red-600"
                                >
                                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <input 
                                    type="url" 
                                    wire:model="website" 
                                    placeholder="Website" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-red-600"
                                >
                                @error('website') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <textarea 
                                wire:model="comment" 
                                placeholder="Comment *" 
                                rows="6" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-red-600"
                            ></textarea>
                            @error('comment') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex justify-end">
                            <button 
                                type="submit" 
                                class="bg-red-700 hover:bg-red-800 text-white px-6 py-2 rounded-full transition"
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