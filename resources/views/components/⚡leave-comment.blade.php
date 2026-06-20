<?php


use Livewire\Component;

new class extends Component
{
    public $name;
    public $email;
    public $website;
    public $comment;
    public $postId;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'website' => 'nullable|url|max:255',
        'comment' => 'required|string',
    ];

    public function mount($postId = null)
    {
        $this->postId = $postId;
    }

    public function submit()
    {
        $this->validate();

        \App\Models\Comment::create([
            'post_id' => $this->postId,
            'name'    => $this->name,
            'email'   => $this->email,
            'website' => $this->website,
            'content' => $this->comment,
        ]);

        $this->reset(['name', 'email', 'website', 'comment']);
        session()->flash('success', 'Comment posted successfully!');
    }
};
?>

<div>
    {{-- Leave a Comment Form --}}
    <div class="w-full max-w-7xl mx-auto my-[40px]">
        {{-- Gradient Header --}}
        <div class="bg-gradient-to-r from-red-700 via-red-500 to-red-100 text-white font-semibold text-lg py-3 px-6 rounded-t-md">
            Leave a comment
        </div>

        <div class="max-w-5xl mx-auto">
            {{-- Info Text --}}
            <p class="text-gray-600 text-sm my-4 px-1">
                Your email address will not be published. Required fields are marked with *
            </p>

            {{-- Form --}}
            <form wire:submit.prevent="submit" class="space-y-4 ">
                {{-- Name, Email, Website Row --}}
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

                {{-- Comment Box --}}
                <div>
                    <textarea 
                        wire:model="comment" 
                        placeholder="Comment *" 
                        rows="6" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-red-600"
                    ></textarea>
                    @error('comment') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Success Message --}}
                @if(session()->has('success'))
                    <div class="text-green-600 text-sm px-1">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Submit Button --}}
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