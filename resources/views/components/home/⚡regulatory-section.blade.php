<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        {{-- ========================================== --}}
        {{-- LEFT COLUMN: MAIN CONTENT (Span 9)         --}}
        {{-- ========================================== --}}
        <div class="lg:col-span-9 flex flex-col gap-16">
            
            {{-- SECTION 1: REGULATORY WATCH HEADER --}}
            <div class="flex items-center gap-4 mb-2">
                <span class="bg-[#dcb352] text-white text-xs font-bold tracking-widest uppercase px-3 py-1.5">
                    Regulatory Watch
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>

            {{-- SECTION 2: DUAL ARTICLE CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Card 1 --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-shadow duration-300">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" alt="Meeting" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-3 left-4 flex items-center gap-2">
                            <span class="bg-red-600 text-white text-[10px] font-bold uppercase px-2 py-0.5 rounded-sm">Breaking</span>
                            <span class="text-white text-[10px] font-medium bg-black/30 backdrop-blur-sm px-2 py-0.5 rounded-sm">AML</span>
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-serif font-bold text-gray-900 leading-tight mb-3 group-hover:text-[#dcb352] transition-colors">
                            OFAC Expands SDN List — 47 Entities Added in Largest Single Designation Action of 2026
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6 line-clamp-3 flex-grow">
                            The Treasury’s designations span six jurisdictions and include front companies alleged to have channelled funds to sanctioned state actors through third-country intermediaries.
                        </p>
                        
                        <div class="border-t border-gray-100 pt-4 mt-auto">
                            <a href="#" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-900 hover:text-[#dcb352] transition-colors mb-4">
                                Read Full Brief 
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                            </a>
                            <div class="text-[10px] text-gray-400 italic">Washington Desk . 26 June 2026</div>
                        </div>
                    </div>
                </div>

                {{-- Card 2 (Duplicate for layout) --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-shadow duration-300">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" alt="Meeting" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute bottom-3 left-4 flex items-center gap-2">
                            <span class="bg-red-600 text-white text-[10px] font-bold uppercase px-2 py-0.5 rounded-sm">Breaking</span>
                            <span class="text-white text-[10px] font-medium bg-black/30 backdrop-blur-sm px-2 py-0.5 rounded-sm">AML</span>
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-serif font-bold text-gray-900 leading-tight mb-3 group-hover:text-[#dcb352] transition-colors">
                            OFAC Expands SDN List — 47 Entities Added in Largest Single Designation Action of 2026
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6 line-clamp-3 flex-grow">
                            The Treasury’s designations span six jurisdictions and include front companies alleged to have channelled funds to sanctioned state actors through third-country intermediaries.
                        </p>
                        
                        <div class="border-t border-gray-100 pt-4 mt-auto">
                            <a href="#" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-900 hover:text-[#dcb352] transition-colors mb-4">
                                Read Full Brief 
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                            </a>
                            <div class="text-[10px] text-gray-400 italic">Washington Desk . 26 June 2026</div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- SECTION 3: MAGAZINE EDITION BANNER --}}
            <div class="mt-4">
                <div class="flex items-center gap-4 mb-4">
                    <span class="bg-[#dcb352] text-white text-xs font-bold tracking-widest uppercase px-3 py-1.5">
                        Regulatory Watch
                    </span>
                    <div class="h-[1px] bg-gray-300 flex-grow"></div>
                </div>

                <div class="bg-[#0b1325] rounded-xl p-8 md:p-10 flex flex-col md:flex-row gap-8 items-start shadow-lg relative overflow-hidden">
                    <!-- Subtle background texture -->
                    <div class="absolute top-0 right-0 w-96 h-96 bg-[#dcb352] opacity-[0.03] rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>

                    {{-- Left: Cover Info --}}
                    <div class="md:w-1/3 border-r border-gray-700 pr-8 flex flex-col justify-center text-center md:text-left">
                        <div class="text-[10px] text-[#dcb352] font-bold uppercase tracking-widest mb-3">Vol. VII . Issue 24</div>
                        <h4 class="text-2xl font-serif font-bold text-white leading-tight mb-4">
                            GRC & Financial Crime <span class="text-[#dcb352]">Today</span>
                        </h4>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wide">June 2026 Edition</div>
                    </div>

                    {{-- Right: Content & CTA --}}
                    <div class="md:w-2/3 flex flex-col justify-center">
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-white mb-4">
                            June 2026: The Accountability Edition
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-8 max-w-2xl">
                            This edition examines the tightening of personal accountability regimes across UK and African jurisdictions — from the Senior Managers & Certification Regime to Nigeria’s evolving corporate liability framework for financial crime.
                        </p>
                        <div>
                            <a href="#" class="inline-flex items-center gap-2 bg-[#dcb352] hover:bg-[#c9a227] text-[#0b1325] text-xs font-bold uppercase tracking-widest px-6 py-3 rounded-sm transition-colors">
                                Read Online 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- ========================================== --}}
        {{-- RIGHT COLUMN: SIDEBAR (Span 3)             --}}
        {{-- ========================================== --}}
        <div class="lg:col-span-3 flex flex-col gap-8">
            
            {{-- WIDGET 1: EVENTS & AWARDS --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-[#0b1325] px-6 py-4 flex items-center justify-between">
                    <h4 class="text-[#dcb352] text-xs font-bold uppercase tracking-widest">Events & Awards 2026</h4>
                    <a href="#" class="text-gray-400 hover:text-white text-[10px] transition-colors">Full Calendar</a>
                </div>

                <div class="divide-y divide-gray-100">
                    {{-- Event 1 --}}
                    <div class="p-5 flex gap-4 hover:bg-gray-50 transition-colors">
                        <div class="text-center min-w-[50px]">
                            <div class="text-2xl font-serif font-bold text-gray-900 leading-none">6</div>
                            <div class="text-[10px] text-[#dcb352] font-bold uppercase tracking-wider mt-1">Nov</div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-start gap-2 mb-1">
                                <h5 class="text-sm font-bold text-gray-900 leading-snug">GRC & FinCrime Prevention Awards — Europe</h5>
                                <span class="bg-[#dcb352]/10 text-[#dcb352] text-[9px] font-bold uppercase px-2 py-0.5 rounded-sm whitespace-nowrap">Awards</span>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-1">Leonardo Hotel, London . Black Tie</p>
                        </div>
                    </div>

                    {{-- Event 2 --}}
                    <div class="p-5 flex gap-4 hover:bg-gray-50 transition-colors">
                        <div class="text-center min-w-[50px]">
                            <div class="text-2xl font-serif font-bold text-gray-900 leading-none">20</div>
                            <div class="text-[10px] text-[#dcb352] font-bold uppercase tracking-wider mt-1">Nov</div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-start gap-2 mb-1">
                                <h5 class="text-sm font-bold text-gray-900 leading-snug">GRC & FinCrime Prevention Awards — Africa</h5>
                                <span class="bg-[#dcb352]/10 text-[#dcb352] text-[9px] font-bold uppercase px-2 py-0.5 rounded-sm whitespace-nowrap">Awards</span>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-1">Marriott Hotel, Nairobi</p>
                        </div>
                    </div>

                    {{-- Event 3 --}}
                    <div class="p-5 flex gap-4 hover:bg-gray-50 transition-colors">
                        <div class="text-center min-w-[50px]">
                            <div class="text-2xl font-serif font-bold text-gray-900 leading-none">20</div>
                            <div class="text-[10px] text-[#dcb352] font-bold uppercase tracking-wider mt-1">Nov</div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-start gap-2 mb-1">
                                <h5 class="text-sm font-bold text-gray-900 leading-snug">Mid-Year GRC & FinCrime Prevention Summit</h5>
                                <span class="bg-blue-50 text-blue-600 text-[9px] font-bold uppercase px-2 py-0.5 rounded-sm whitespace-nowrap">Summit</span>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-1">Nairobi . Programme In Progress</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- WIDGET 2: QUALIFICATIONS --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-[#0b1325] px-6 py-4 flex items-center justify-between">
                    <h4 class="text-[#dcb352] text-xs font-bold uppercase tracking-widest">IGRCFP Qualifications</h4>
                    <a href="#" class="text-gray-400 hover:text-white text-[10px] transition-colors">igrcfp.org</a>
                </div>

                <div class="divide-y divide-gray-100">
                    {{-- Qual 1 --}}
                    <div class="p-6 hover:bg-gray-50 transition-colors group">
                        <h5 class="text-xs font-bold text-gray-900 uppercase tracking-widest mb-2">IGRCFP - CMLRO</h5>
                        <p class="text-xs text-gray-500 leading-relaxed mb-3">
                            Certified Money Laundering Reporting Officer qualification — benchmarked against the ICA Certified MLRO. Open for enrolment now.
                        </p>
                        <a href="#" class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-gray-900 hover:text-[#dcb352] transition-colors">
                            Read Full Brief 
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                        </a>
                    </div>

                    {{-- Qual 2 --}}
                    <div class="p-6 hover:bg-gray-50 transition-colors group">
                        <h5 class="text-xs font-bold text-gray-900 uppercase tracking-widest mb-2">IT GRC & Security</h5>
                        <p class="text-xs text-gray-500 leading-relaxed mb-3">
                            Professional certification across 10 modules covering cyber risk, governance frameworks, and security compliance.
                        </p>
                        <a href="#" class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-gray-900 hover:text-[#dcb352] transition-colors">
                            Read Full Brief 
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>