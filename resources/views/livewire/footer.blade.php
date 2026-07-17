<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<footer class="w-full text-white" style="background-color: #0b1220; font-family: 'EB Garamond', serif;">
    
    {{-- NEWSLETTER SECTION --}}
    <div class="border-b border-[#c9a227]/30 px-6 md:px-16 lg:px-24 py-12 md:py-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8">
            
            {{-- Left: Text --}}
            <div class="text-center md:text-left max-w-xl">
                <h2 class="text-3xl md:text-4xl font-bold mb-3 text-white">The Compliance Dossier</h2>
                <p class="text-gray-400 text-sm md:text-base leading-relaxed tracking-wide">
                    Intelligence briefings, regulatory alerts and analysis delivered weekly to 4,200+ GRC & FinCrime professionals worldwide.
                </p>
            </div>

            {{-- Right: Form --}}
            <div class="w-full md:w-auto flex-shrink-0">
                <form class="flex flex-col sm:flex-row items-center gap-3">
                    <input 
                        type="email" 
                        placeholder="Your professional email address" 
                        class="w-full sm:w-80 px-5 py-3.5 rounded-sm focus:outline-none text-gray-900 bg-white placeholder-gray-500 border border-transparent focus:border-[#c9a227] transition-colors"
                    >
                    <button 
                        type="submit" 
                        class="w-full  sm:w-auto px-8 py-3.5 rounded-full font-bold uppercase tracking-wider text-[#0b1220] hover:bg-[#e6c866] transition-colors whitespace-nowrap"
                        style="background-color: #c9a227;"
                    >
                        Subscribe
                    </button>
                </form>
                <p class="text-[10px] text-gray-500 mt-2 text-center sm:text-right tracking-wide">
                    No spam. Unsubscribe at any time. GDPR compliant.
                </p>
            </div>
        </div>
    </div>

    {{-- MAIN FOOTER CONTENT --}}
    <div class="px-6 md:px-16 lg:px-24 py-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8">
            
            {{-- COLUMN 1: BRAND (Span 5) --}}
            <div class="lg:col-span-5">
                 <div class="flex items-center bg-white px-8 py-3  mr-[140px] mb-4 ">
                    <img src="/assets/img/logo.png" alt="GRC & Financial Crime" class="h-10">
                </div>
                <!-- <h3 class="text-3xl md:text-4xl font-bold text-white mb-2">
                    GRC & Financial Crime <span style="color: #c9a227;">Today</span>
                </h3> -->
                <p class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] mb-6" style="color: #c9a227;">
                    An IGRCFP Publication · The Morgans Consortium
                </p>
                <p class="text-gray-400 text-sm leading-relaxed max-w-md">
                    The intelligence publication for governance, risk, compliance and financial crime prevention professionals across the UK, Africa and the world. Published from 85 Great Portland Street, London.
                </p>
            </div>

            {{-- COLUMN 2: COVERAGE (Span 2) --}}
            <div class="lg:col-span-2">
                <h4 class="text-sm font-bold uppercase tracking-widest mb-6" style="color: #c9a227;">Coverage</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">AML & CTF</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Sanctions</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Fraud & Cybercrime</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Regulatory Affairs</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Crypto & DeFi</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Africa Desk</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Opinion & Analysis</a></li>
                </ul>
            </div>

            {{-- COLUMN 3: ORGANISATION (Span 2) --}}
            <div class="lg:col-span-2">
                <h4 class="text-sm font-bold uppercase tracking-widest mb-6" style="color: #c9a227;">Organisation</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="https://igrcfp.org/" class="hover:text-white transition-colors">IGRCFP</a></li>
                    <li><a href="http://morgansconsortium.com" class="hover:text-white transition-colors">The Morgans Consortium</a></li>
                    <li><a href="https://wgrcfp.org/" class="hover:text-white transition-colors">WGRCFP</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">IFCFPN</a></li>
                    <li><a href="https://oysterchecks.com/" class="hover:text-white transition-colors">OysterChecks Platform</a></li>
                </ul>
            </div>

            {{-- COLUMN 4: AWARDS & EVENTS (Span 3) --}}
            <div class="lg:col-span-3">
                <h4 class="text-sm font-bold uppercase tracking-widest mb-6" style="color: #c9a227;">Awards & Events</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="https://www.grcfincrimeawards.com" class="hover:text-white transition-colors">2026 Awards — Europe</a></li>
                    <li><a href="https://www.eu.grcfincrimeawards.com" class="hover:text-white transition-colors">2026 Awards — Africa</a></li>
                    <li><a href="https://www.grcfincrimeawards.com/summit" class="hover:text-white transition-colors">Mid-Year Summit</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Past Winners</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Enter / Nominate</a></li>
                    <li><a href="https://www.grcfincrimeawards.com/sponsors" class="hover:text-white transition-colors">Judge & Sponsor</a></li>
                </ul>
            </div>

        </div>
    </div>

    {{-- BOTTOM BAR --}}
    <div class="border-t border-gray-800 px-6 md:px-16 lg:px-24 py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-xs text-gray-500 uppercase tracking-[0.15em]">
                © 2026 GRC & Financial Crime Today · A Morgans Consortium / IGRCFP Publication · 85 Great Portland Street, London W1W 7LT · All rights reserved.
            </p>
        </div>
    </div>

</footer>