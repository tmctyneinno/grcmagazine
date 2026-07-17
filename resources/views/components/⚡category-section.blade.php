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
        <div class="lg:col-span-9 flex flex-col gap-12">
            
            {{-- SECTION 1: TOP STORIES HEADER --}}
            <div class="flex items-center gap-4 mb-2">
                <span class="bg-[#dcb352] text-white text-xs font-bold tracking-widest uppercase px-4 py-1.5">
                    Top Stories
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>

            {{-- SECTION 2: 3-COLUMN GRID CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 border border-gray-200 rounded-lg overflow-hidden bg-white shadow-sm">
                
                {{-- Card 1: Fraud --}}
                <div class="p-8 border-b md:border-b-0 md:border-r border-gray-200 flex flex-col justify-between h-full min-h-[400px]">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-red-600 text-xs font-bold uppercase tracking-wider">Fraud</span>
                            <span class="w-8 h-[2px] bg-red-600"></span>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-gray-900 leading-tight mb-6">
                            APP Fraud Losses Hit £560M in H1 – PSR Demands Mandatory Reimbursement Now
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-8">
                            The Payment Systems Regulator’s new reporting framework has exposed the true scale of authorised push payment fraud, with major banks resisting full reimbursement liability ahead of October’s mandatory deadline.
                        </p>
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-900 hover:text-[#dcb352] transition-colors group">
                        Full Analysis 
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                    </a>
                </div>

                {{-- Card 2: AML --}}
                <div class="p-8 border-b md:border-b-0 md:border-r border-gray-200 flex flex-col justify-between h-full min-h-[400px]">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-blue-600 text-xs font-bold uppercase tracking-wider">AML</span>
                            <span class="w-8 h-[2px] bg-blue-600"></span>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-gray-900 leading-tight mb-6">
                            The CMLRO Under Fire: SM&CR Review and What It Means for MLROs
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-8">
                            New accountability mapping requirements are forcing boards to revisit MLRO mandate structures — and some institutions are finding significant gaps in their governance frameworks.
                        </p>
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-900 hover:text-[#dcb352] transition-colors group">
                        Full Analysis 
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                    </a>
                </div>

                {{-- Card 3: Africa Desk --}}
                <div class="p-8 flex flex-col justify-between h-full min-h-[400px]">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-pink-600 text-xs font-bold uppercase tracking-wider">Africa Desk</span>
                            <span class="w-8 h-[2px] bg-pink-600"></span>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-gray-900 leading-tight mb-6">
                            Nigeria’s SCUML Overhaul: New Obligations Every DNFBP Must Understand
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-8">
                            The Special Control Unit Against Money Laundering has issued sweeping new guidance for designated non-financial businesses, with compliance deadlines running to September 2026.
                        </p>
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-900 hover:text-[#dcb352] transition-colors group">
                        Full Analysis 
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                    </a>
                </div>
            </div>

            {{-- SECTION 3: OPINION HEADER --}}
            <div class="flex items-center gap-4 mt-4 mb-2">
                <span class="bg-[#dcb352] text-white text-xs font-bold tracking-widest uppercase px-4 py-1.5">
                    Opinion
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>

            {{-- SECTION 4: OPINION QUOTE CARD --}}
            <div class="bg-[#0b1325] rounded-xl p-10 md:p-14 relative overflow-hidden shadow-lg">
                <!-- Decorative background element (optional) -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-[0.03] rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>

                <blockquote class="relative z-10">
                    <p class="text-2xl md:text-3xl font-serif italic text-[#e2e8f0] leading-relaxed mb-8">
                        "The compliance profession has spent two decades building frameworks to detect financial crime. It is now time we build institutions capable of preventing it – not merely reporting it after the fact."
                    </p>
                    
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 border-t border-gray-700 pt-6">
                        <div class="text-sm text-[#dcb352] font-medium tracking-wide">
                            — Dr. Enoch Foluso Amusa, PhD <span class="text-gray-500 mx-2">·</span> Founder & Chairman, IGRCFP & The Morgans Consortium
                        </div>
                        
                        <a href="#" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#dcb352] hover:text-white transition-colors group whitespace-nowrap">
                            Read The Full Column 
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                        </a>
                    </div>
                </blockquote>
            </div>

        </div>

        {{-- ========================================== --}}
        {{-- RIGHT COLUMN: SIDEBAR (Span 3)             --}}
        {{-- ========================================== --}}
        <div class="lg:col-span-3">
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden sticky top-6">
                
                {{-- Sidebar Header --}}
                <div class="bg-[#0b1325] px-6 py-4 flex items-center justify-between">
                    <h4 class="text-[#dcb352] text-xs font-bold uppercase tracking-widest">Latest Briefs</h4>
                    <a href="#" class="text-gray-400 hover:text-white text-xs transition-colors">View All</a>
                </div>

                {{-- Sidebar List --}}
                <div class="divide-y divide-gray-100">
                    
                    {{-- Item 1 --}}
                    <div class="p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-purple-600 mb-2 block">Sanctions</span>
                        <h5 class="text-sm font-bold text-gray-900 leading-snug mb-2 group-hover:text-[#dcb352] transition-colors">
                            UK OFSI Imposes Asset Freeze on 14 Russian Shell Companies Linked to Evaded Commodity Export Controls
                        </h5>
                        <span class="text-[10px] text-gray-400">1h ago</span>
                    </div>

                    {{-- Item 2 --}}
                    <div class="p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-red-600 mb-2 block">Fraud</span>
                        <h5 class="text-sm font-bold text-gray-900 leading-snug mb-2 group-hover:text-[#dcb352] transition-colors">
                            Chainalysis: $1.2B Laundered Through Cross-Chain Bridges in First Half of 2026
                        </h5>
                        <span class="text-[10px] text-gray-400">3h ago</span>
                    </div>

                    {{-- Item 3 --}}
                    <div class="p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-blue-600 mb-2 block">AML</span>
                        <h5 class="text-sm font-bold text-gray-900 leading-snug mb-2 group-hover:text-[#dcb352] transition-colors">
                            Kenyan FRC Issues Draft Guidance on Politically Exposed Person Screening for Banking Sector
                        </h5>
                        <span class="text-[10px] text-gray-400">Yesterday</span>
                    </div>

                    {{-- Item 4 --}}
                    <div class="p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-teal-600 mb-2 block">Crypto</span>
                        <h5 class="text-sm font-bold text-gray-900 leading-snug mb-2 group-hover:text-[#dcb352] transition-colors">
                            AUSTRAC Issues Amended AML/CTF Rules Covering Remittance Network Providers
                        </h5>
                        <span class="text-[10px] text-gray-400">Yesterday</span>
                    </div>

                    {{-- Item 5 --}}
                    <div class="p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-pink-600 mb-2 block">Africa</span>
                        <h5 class="text-sm font-bold text-gray-900 leading-snug mb-2 group-hover:text-[#dcb352] transition-colors">
                            Metropolitan Police Disrupts £30M Romance Fraud Network Operating From West Africa
                        </h5>
                        <span class="text-[10px] text-gray-400">2 days ago</span>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</div> 