<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="w-full bg-[#f8f5ee] py-16 px-4 sm:px-6 lg:px-8" style="font-family: 'EB Garamond', serif;">
    <div class="max-w-6xl mx-auto">
        
        {{-- TOP SECTION: Image & Intro --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
            
            {{-- Left: Image with Gold Border --}}
            <div class="relative p-1 bg-gradient-to-br from-[#c9a227] to-[#e6c866] rounded-2xl shadow-lg">
                <img 
                    src="images/about-img.png" 
                    alt="Library and busts" 
                    class="w-full h-auto rounded-xl object-cover aspect-[4/3]"
                >
            </div>

            {{-- Right: Text Content --}}
            <div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-2">
                    Top Stories from <br>
                    <span class="text-[#c9a227]">Around the world</span>
                </h2>
                
                <p class="text-lg font-serif font-bold text-gray-900 mb-6 mt-4">
                    GRC & Financial Crime Prevention Magazine
                </p>
                
                <p class="text-gray-700 text-base leading-relaxed">
                    GRC & Financial Crime Prevention Magazine was created with a simple idea in mind... that governance, risk, compliance, and financial crime prevention deserve a home that treats them as the vital pillars they are. Not just for banks or regulators, but for every industry learning to operate in a world where integrity, transparency and accountability can't be optional anymore.
                </p>
            </div>
        </div>

        {{-- MIDDLE SECTION: 3 Feature Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            
            {{-- Card 1: Our Evolution --}}
            <div class="bg-white rounded-xl shadow-md p-8 pt-12 relative mt-6 border border-gray-100">
                {{-- Floating Icon --}}
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 bg-white rounded-full shadow-md border border-gray-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 text-center mb-4">Our Evolution</h3>
                <p class="text-sm text-gray-600 leading-relaxed text-center">
                    Over time the publication has grown into a place where people come to understand what's really happening across the ecosystem. News, analysis, long-form stories, expert interviews, research pieces, practical tools... all woven together with the goal of making complex issues feel a little clearer and a lot more actionable.
                </p>
            </div>

            {{-- Card 2: Our Coverage --}}
            <div class="bg-white rounded-xl shadow-md p-8 pt-12 relative mt-6 border border-gray-100">
                {{-- Floating Icon --}}
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 bg-white rounded-full shadow-md border border-gray-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 text-center mb-4">Our Coverage</h3>
                <p class="text-sm text-gray-600 leading-relaxed text-center">
                    We cover the shifts shaping global markets. The investigations that change how organisations think about fraud and financial crime. The policies and frameworks that redefine governance. The emerging risks keeping leaders awake at night. And, maybe most importantly, the ideas and innovations moving the profession forward.
                </p>
            </div>

            {{-- Card 3: Our Audience --}}
            <div class="bg-white rounded-xl shadow-md p-8 pt-12 relative mt-6 border border-gray-100">
                {{-- Floating Icon --}}
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 bg-white rounded-full shadow-md border border-gray-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM9 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 text-center mb-4">Our Audience</h3>
                <p class="text-sm text-gray-600 leading-relaxed text-center">
                    The magazine serves a wide audience: regulators, financial institutions, fintech innovators, insurers, risk professionals, auditors, compliance leaders, law enforcement, investigators, cybersecurity teams and anyone whose work touches the world of organisational integrity. People who understand that GRC isn't just a department... it's the backbone of responsible enterprise.
                </p>
            </div>

        </div>

        {{-- BOTTOM SECTION: List --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            
            {{-- Gold Gradient Header --}}
            <div class="bg-gradient-to-r from-[#c9a227] via-[#dcb352] to-[#eaddc5] px-8 py-4">
                <h4 class="text-white font-bold text-lg tracking-wide">Alongside our regular reporting, readers will find</h4>
            </div>

            {{-- List Items --}}
            <div class="p-8">
                <ul class="space-y-4">
                    <li class="flex items-start gap-4 text-gray-700">
                        <span class="mt-1.5 w-2 h-2 rounded-full border-2 border-[#c9a227] flex-shrink-0"></span>
                        <span class="text-sm leading-relaxed">Exclusive features and interviews with global voices shaping the future of GRC and financial crime prevention.</span>
                    </li>
                    <li class="flex items-start gap-4 text-gray-700">
                        <span class="mt-1.5 w-2 h-2 rounded-full border-2 border-[#c9a227] flex-shrink-0"></span>
                        <span class="text-sm leading-relaxed">Research insights and trend tracking, grounding today's decisions in better data.</span>
                    </li>
                    <li class="flex items-start gap-4 text-gray-700">
                        <span class="mt-1.5 w-2 h-2 rounded-full border-2 border-[#c9a227] flex-shrink-0"></span>
                        <span class="text-sm leading-relaxed">Professional commentary on new regulations, enforcement actions and case studies.</span>
                    </li>
                    <li class="flex items-start gap-4 text-gray-700">
                        <span class="mt-1.5 w-2 h-2 rounded-full border-2 border-[#c9a227] flex-shrink-0"></span>
                        <span class="text-sm leading-relaxed">Practical guides, tools, and frameworks that help organisations strengthen controls.</span>
                    </li>
                    <li class="flex items-start gap-4 text-gray-700">
                        <span class="mt-1.5 w-2 h-2 rounded-full border-2 border-[#c9a227] flex-shrink-0"></span>
                        <span class="text-sm leading-relaxed">Stories from across regions and industries, spotlighting what's working and what still needs to evolve.</span>
                    </li>
                    <li class="flex items-start gap-4 text-gray-700">
                        <span class="mt-1.5 w-2 h-2 rounded-full border-2 border-[#c9a227] flex-shrink-0"></span>
                        <span class="text-sm leading-relaxed">Community-driven dialogue, powered by judges, advisors, practitioners and partners who contribute from all corners of the world.</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>