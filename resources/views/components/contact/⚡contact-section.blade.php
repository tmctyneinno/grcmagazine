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

<div class="w-full bg-[#f8f5ee] py-16 px-4 sm:px-6 lg:px-8" style="font-family: 'EB Garamond', serif;">
    <div class="max-w-6xl mx-auto">
        
        {{-- MAIN CONTACT SECTION --}}
        <div class="border border-[#eaddc5] rounded-2xl p-6 md:p-10 bg-white/50 backdrop-blur-sm shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                {{-- LEFT: Contact Information Card --}}
                <div class="bg-white rounded-xl p-8 shadow-md border border-gray-100 h-full">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Contact Information</h2>
                    <p class="text-gray-600 text-sm leading-relaxed mb-8">
                        The new payments framework makes key changes in areas such as fraud prevention and customer safeguards, including a new verification of payee scheme, reimbursement rules and potential liability for online.
                    </p>

                    {{-- Phone --}}
                    <div class="flex items-start gap-4 mb-6">
                        <div class="mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#c9a227]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Phone Number</h3>
                            <p class="text-gray-600 text-sm">+353877123968, +442078560149</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-start gap-4 mb-6">
                        <div class="mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#c9a227]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Email Address</h3>
                            <a href="mailto:enquiries@grcfincrimetoday.org" class="text-[#c9a227] hover:underline text-sm">
                                enquiries@grcfincrimetoday.org
                            </a>
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="flex items-start gap-4">
                        <div class="mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#c9a227]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Postal Address</h3>
                            
                            <p class="text-gray-800 text-sm font-semibold mb-1">HQ United Kingdom:</p>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">85 Great Portland Street, First Floor, W1W 7LT, London, UK</p>

                            <p class="text-gray-800 text-sm font-semibold mb-1">United States:</p>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">1111B S Governors Ave, Suite 57613, Dover, DE 19904</p>

                            <p class="text-gray-800 text-sm font-semibold mb-1">Nigeria:</p>
                            <p class="text-gray-600 text-sm leading-relaxed">2nd Floor, 1 Adeola Adeoye Street, Toyin Street, Ikeja, Lagos, Nigeria</p>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Get In Touch Form Card --}}
                <div class="bg-white rounded-xl p-8 shadow-md border border-gray-100 h-full flex flex-col">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Get In Touch</h2>
                    <p class="text-gray-600 text-sm leading-relaxed mb-8">
                        The new payments framework makes key changes in areas such as fraud prevention and customer safeguards, including a new verification of payee scheme, reimbursement rules and potential liability for online.
                    </p>

                    <form wire:submit.prevent="submitForm" class="space-y-4 flex-grow">
                        <div>
                            <input 
                                type="text" 
                                wire:model="name" 
                                placeholder="Name" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#c9a227] focus:ring-1 focus:ring-[#c9a227] bg-transparent text-gray-800 placeholder-gray-400 transition-colors"
                            >
                            @error('name') <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <input 
                                type="email" 
                                wire:model="email" 
                                placeholder="Email Address" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#c9a227] focus:ring-1 focus:ring-[#c9a227] bg-transparent text-gray-800 placeholder-gray-400 transition-colors"
                            >
                            @error('email') <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <input 
                                type="text" 
                                wire:model="phone" 
                                placeholder="Phone Number" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#c9a227] focus:ring-1 focus:ring-[#c9a227] bg-transparent text-gray-800 placeholder-gray-400 transition-colors"
                            >
                            @error('phone') <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <textarea 
                                wire:model="message" 
                                placeholder="Message" 
                                rows="4" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-[#c9a227] focus:ring-1 focus:ring-[#c9a227] bg-transparent text-gray-800 placeholder-gray-400 transition-colors resize-none"
                            ></textarea>
                            @error('message') <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <button 
                            type="submit" 
                            class="w-full bg-[#c9a227] hover:bg-[#b08d22] text-white font-bold py-3.5 px-6 rounded-lg shadow-sm transition-colors duration-200 mt-2"
                        >
                            Send Message
                        </button>

                        @if(session()->has('success'))
                            <div class="text-green-700 text-center mt-3 text-sm font-medium bg-green-50 py-2 rounded">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>

            </div>
        </div>

        {{-- MAP SECTION --}}
        <div class="mt-16 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">
                Visit Our Office For In-person Inquiries
            </h2>

            <div class="rounded-2xl overflow-hidden shadow-lg border border-[#eaddc5]">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.634118427999!2d-0.1454366886051928!3d51.51992820967146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761b29b579875d%3A0x6b8c8c8c8c8c8c8c!2s85%20Great%20Portland%20St%2C%20London%20W1W%207LT%2C%20UK!5e0!3m2!1sen!2sng!4v1781884541630!5m2!1sen!2sng" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>
</div>