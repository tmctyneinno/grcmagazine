<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<footer class="bg-[#000000] text-white rounded-t-[40px] overflow-hidden">
    {{-- Newsletter Section --}}
    <div class="bg-gradient-to-r from-black to-[#990000] px-6 md:px-12 lg:px-16 py-12 md:py-16 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="text-center md:text-left">
            <h2 class="text-[clamp(1.8rem,4vw,2.5rem)] font-bold leading-tight">Subscribe to our<br>newsletter</h2>
        </div>
        <div class="w-full md:w-auto">
            <form class="flex flex-col sm:flex-row items-center bg-white rounded-full p-1 shadow-lg">
                <input 
                    type="email" 
                    placeholder="Enter your email" 
                    class="flex-1 px-6 py-3 rounded-full focus:outline-none text-gray-800 w-full sm:w-auto"
                >
                <button 
                    type="submit" 
                    class="bg-[#1a2c42] text-white px-8 py-3 rounded-full font-medium hover:bg-[#253b57] transition whitespace-nowrap"
                >
                    Subscribe
                </button>
            </form>
            <p class="text-xs text-gray-300 mt-2 text-center sm:text-left">
                By subscribing you agree to our <a href="#" class="underline hover:text-white">privacy policy</a>
            </p>
        </div>
    </div>

    {{-- Main Footer Content --}}
    <div class="px-6 md:px-12 lg:px-16 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            {{-- Brand & Description --}}
            <div>
                <div class="flex items-center bg-white rounded-[50px] px-8 py-3  mr-[140px] mb-4 ">
                    <img src="/assets/img/logo.png" alt="GRC & Financial Crime" class="h-10">
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">
                    GRC & Financial Crime Prevention Magazine was created with a simple idea in mind... that governance, risk, compliance, and financial crime prevention deserve a home that treats them as the vital pillars they are. Not just for banks or regulators, but for every industry learning to operate in a world where integrity, transparency and accountability can't be optional anymore.
                </p>
            </div>

            {{-- Contact Address --}}
            <div>
                <h3 class="text-lg font-semibold mb-3">Contact Address</h3>
                
                <p class="text-sm text-gray-400 mb-2"><strong>HQ United Kingdom:</strong></p>
                <p class="text-sm text-gray-400 mb-3">85 Great Portland Street, First Floor, W1W 7LT, London, UK</p>

                <p class="text-sm text-gray-400 mb-2"><strong>United States:</strong></p>
                <p class="text-sm text-gray-400 mb-3">1111B S Governors Ave, Suite 57613, Dover, DE 19904</p>

                <p class="text-sm text-gray-400 mb-2"><strong>Nigeria:</strong></p>
                <p class="text-sm text-gray-400 mb-3">2nd Floor, 1 Adeola Adeoye Street, Toyin Street, Ikeja, Lagos, Nigeria</p>

                <p class="text-sm text-gray-400 mt-2"><strong>Phone:</strong> +353877123968, +442078560149</p>
                <p class="text-sm text-gray-400 mt-1"><strong>Official Email:</strong> enquiries@grcfincrimetoday.org</p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition">Recommended Posts</a></li>
                    <li><a href="#" class="hover:text-white transition">Trending Posts</a></li>
                    <li><a href="#" class="hover:text-white transition">Reports & Special Editions</a></li>
                    <li><a href="#" class="hover:text-white transition">Events</a></li>
                    <li><a href="#" class="hover:text-white transition">About Us</a></li>
                </ul>
            </div>
            
        </div>

        {{-- Divider --}}
        <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">
            {{-- Social Icons --}}
            <div class="flex gap-4">
                <a href="#" class="text-gray-400 hover:text-white transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.99 3.65 9.12 8.43 9.87v-6.97h-2.54V12h2.54V9.8c0-2.51 1.49-3.89 3.77-3.89 1.09 0 2.23.19 2.23.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.9h-2.33v6.97C18.35 21.12 22 16.99 22 12z"/></svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm3.435 14.235c-.14.21-.42.33-.705.33-.285 0-.56-.12-.705-.33l-1.02-1.53-1.02 1.53c-.145.21-.42.33-.705.33-.285 0-.56-.12-.705-.33-.12-.18-.12-.42 0-.6l1.275-1.905-1.275-1.905c-.12-.18-.12-.42 0-.6.145-.21.42-.33.705-.33.285 0 .56.12.705.33l1.02 1.53 1.02-1.53c.145-.21.42-.33.705-.33.285 0 .56.12.705.33.12.18.12.42 0 .6l-1.275 1.905 1.275 1.905c.12.18.12.42 0 .6z"/></svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.222a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.868 9.868 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12s5.374 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.441 16.892c-1.171.371-2.194.627-3.224.746-1.033.123-2.123.186-3.217.186-1.094 0-2.184-.063-3.217-.186-1.03-.119-2.053-.375-3.224-.746a9.982 9.982 0 01-3.56-2.356 9.904 9.904 0 01-2.144-3.56c-.371-1.171-.627-2.194-.746-3.224-.123-1.033-.186-2.123-.186-3.217 0-1.094.063-2.184.186-3.217.119-1.03.375-2.053.746-3.224a9.982 9.982 0 012.356-3.56 9.904 9.904 0 013.56-2.144c1.171-.371 2.194-.627 3.224-.746 1.033-.123 2.123-.186 3.217-.186 1.094 0 2.184.063 3.217.186 1.03.119 2.053.375 3.224.746a9.982 9.982 0 013.56 2.356 9.904 9.904 0 012.144 3.56c.371 1.171.627 2.194.746 3.224.123 1.033.186 2.123.186 3.217 0 1.094-.063 2.184-.186 3.217-.119 1.03-.375 2.053-.746 3.224a9.982 9.982 0 01-2.356 3.56 9.904 9.904 0 01-3.56 2.144z"/></svg>
                </a>
            </div>

            {{-- Copyright --}}
            <p class="text-xs text-gray-500 text-center md:text-left">
                Copyright © 2026 GRC & Financial Crime today All Rights Reserved.
            </p>

            {{-- Legal Links --}}
            <div class="flex gap-4 text-xs text-gray-500">
                <a href="#" class="hover:text-white transition">Terms of use</a>
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <a href="#" class="hover:text-white transition">Privacy policy</a>
            </div>
        </div>
    </div>
</footer>