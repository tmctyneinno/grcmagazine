<?php

use Livewire\Component;

new class extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    public function submitForm()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        // Add your email/save logic here
        session()->flash('success', 'Your message has been sent successfully!');
        $this->reset();
    }
};
?>

<div class="max-w-6xl mx-auto px-4 py-16">
    {{-- Outer border container --}}
    <div class="border border-red-600 rounded-[20px] p-6 md:p-8 bg-white shadow-lg">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- Left: Contact Information --}}
            <div class="bg-white rounded-[20px] p-6 md:p-8 shadow-md">
                <h2 class="text-[clamp(1.5rem,3vw,2.2rem)] font-bold text-gray-900 mb-6 relative inline-block">
                    Contact Information
                    <span class="absolute -bottom-1 left-0 w-full h-1 bg-red-600"></span>
                </h2>
                <p class="text-gray-700 leading-relaxed mb-10">
                    The new payments framework makes key changes in areas such as fraud prevention and customer safeguards, including a new verification of payee scheme, reimbursement rules and potential liability for online.
                </p>

                {{-- Phone --}}
                <div class="flex items-start gap-4 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-red-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-1">Phone Number</h3>
                        <p class="text-gray-700">+353877123968, +442078560149</p>
                    </div>
                </div>

                {{-- Email --}}
                <div class="flex items-start gap-4 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-red-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-1">Email Address</h3>
                        <a href="mailto:enquiries@grcfincrimetoday.org" class="text-red-600 underline hover:text-red-800">
                            enquiries@grcfincrimetoday.org
                        </a>
                    </div>
                </div>

                {{-- Address --}}
                <div class="flex items-start gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-red-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Postal Address</h3>
                        
                        <p class="text-gray-700 font-semibold mb-1">HQ United Kingdom:</p>
                        <p class="text-gray-700 leading-relaxed mb-3">85 Great Portland Street, First Floor, W1W 7LT, London, UK</p>

                        <p class="text-gray-700 font-semibold mb-1">United States:</p>
                        <p class="text-gray-700 leading-relaxed mb-3">1111B S Governors Ave, Suite 57613, Dover, DE 19904</p>

                        <p class="text-gray-700 font-semibold mb-1">Nigeria:</p>
                        <p class="text-gray-700 leading-relaxed">2nd Floor, 1 Adeola Adeoye Street, Toyin Street, Ikeja, Lagos, Nigeria</p>
                    </div>
                </div>
            </div>

            {{-- Right: Get In Touch Form --}}
            <div class="bg-red-50 rounded-[20px] p-6 md:p-8 shadow-md">
                <h2 class="text-[clamp(1.5rem,3vw,2.2rem)] font-bold text-gray-900 mb-4 relative inline-block">
                    Get In Touch
                    <span class="absolute -bottom-1 left-0 w-full h-1 bg-red-600"></span>
                </h2>
                <p class="text-gray-700 leading-relaxed mb-8">
                    The new payments framework makes key changes in areas such as fraud prevention and customer safeguards, including a new verification of payee scheme, reimbursement rules and potential liability for online.
                </p>

                {{-- Form --}}
                <form wire:submit.prevent="submitForm" class="space-y-4">
                    <div>
                        <input 
                            type="text" 
                            wire:model="name" 
                            placeholder="Name" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-400 focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600 bg-transparent"
                        >
                        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <input 
                            type="email" 
                            wire:model="email" 
                            placeholder="Email Address" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-400 focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600 bg-transparent"
                        >
                        @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <input 
                            type="text" 
                            wire:model="phone" 
                            placeholder="Phone Number" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-400 focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600 bg-transparent"
                        >
                        @error('phone') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <textarea 
                            wire:model="message" 
                            placeholder="Message" 
                            rows="5" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-400 focus:outline-none focus:ring-1 focus:ring-red-600 focus:border-red-600 bg-transparent"
                        ></textarea>
                        @error('message') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button 
                        type="submit" 
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded-full transition"
                    >
                        Send Message
                    </button>

                    @if(session()->has('success'))
                        <div class="text-green-600 text-center mt-2 font-medium">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>

        </div>
    </div>
</div>