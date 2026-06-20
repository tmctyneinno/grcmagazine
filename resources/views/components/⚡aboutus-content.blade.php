<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class=" px-0 py-16 bg-white text-gray-900">
    {{-- Top Section --}}
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-16">
        {{-- Image with red bottom border --}}
        <div class="relative">
            <img 
                src="images/about-img.png" 
                alt="Top Stories from Around the World" 
                class="w-full h-auto rounded-tl-3xl rounded-tr-3xl rounded-br-3xl object-cover"
            >
        </div>

        {{-- Heading & Description --}}
        <div>
            <h2 class="text-[clamp(1.8rem,4vw,2.8rem)] font-bold leading-tight mb-3">
                Top Stories from Around the world
            </h2>
            <p class="text-red-600 font-semibold mb-4">GRC & Financial Crime Prevention Magazine</p>
            <p class="text-gray-700 leading-relaxed">
                GRC & Financial Crime Prevention Magazine was created with a simple idea in mind... that governance, risk, compliance, and financial crime prevention deserve a home that treats them as the vital pillars they are. Not just for banks or regulators, but for every industry learning to operate in a world where integrity, transparency and accountability can't be optional anymore.
            </p>
        </div>
    </div>

    {{-- Three Feature Cards --}}
    <div class="max-w-6xl mx-auto  grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        {{-- Our Evolution --}}
        <div class="bg-white rounded-3xl shadow-lg p-6 relative pt-10">
            <div class="absolute -top-5 left-1/2 -translate-x-1/2 w-15 h-15 rounded-full bg-white shadow-md flex items-center justify-center border border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-center text-lg font-bold mb-3">Our Evolution</h3>
            <p class="text-sm text-gray-700 leading-relaxed text-center">
                Over time the publication has grown into a place where people come to understand what's really happening across the ecosystem. News, analysis, long-form stories, expert interviews, research pieces, practical tools... all woven together with the goal of making complex issues feel a little clearer and a lot more actionable.
            </p>
        </div>

        {{-- Our Coverage --}}
        <div class="bg-white rounded-3xl shadow-lg p-6 relative pt-10">
            <div class="absolute -top-5 left-1/2 -translate-x-1/2 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center border border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h3 class="text-center text-lg font-bold mb-3">Our Coverage</h3>
            <p class="text-sm text-gray-700 leading-relaxed text-center">
                We cover the shifts shaping global markets. The investigations that change how organisations think about fraud and financial crime. The policies and frameworks that redefine governance. The emerging risks keeping leaders awake at night. And, maybe most importantly, the ideas and innovations moving the profession forward.
            </p>
        </div>

        {{-- Our Audience --}}
        <div class="bg-white rounded-3xl shadow-lg p-6 relative pt-10">
            <div class="absolute -top-5 left-1/2 -translate-x-1/2 w-18 h-18 rounded-full bg-white shadow-md flex items-center justify-center border border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM9 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h3 class="text-center text-lg font-bold mb-3">Our Audience</h3>
            <p class="text-sm text-gray-700 leading-relaxed text-center">
                The magazine serves a wide audience: regulators, financial institutions, fintech innovators, insurers, risk professionals, auditors, compliance leaders, law enforcement, investigators, cybersecurity teams and anyone whose work touches the world of organisational integrity. People who understand that GRC isn't just a department... it's the backbone of responsible enterprise.
            </p>
        </div>
    </div>

    {{-- Bottom Section --}}
    <div>
        {{-- Gradient Header Bar --}}
        <div class="w-full mx-auto bg-gradient-to-r from-red-600 to-white-500 text-white font-medium py-3 px-6 rounded-t-md mb-6">
            Alongside our regular reporting, readers will find
        </div>

        {{-- List Items --}}
        <ul class="max-w-6xl mx-auto  space-y-2 text-gray-800 pl-6">
            <li class="flex items-start gap-2">
                <span class="text-red-600 font-bold">●</span>
                <span>Exclusive features and interviews with global voices shaping the future of GRC and financial crime prevention.</span>
            </li>
            <li class="flex items-start gap-2">
                <span class="text-red-600 font-bold">●</span>
                <span>Research insights and trend tracking, grounding today's decisions in better data.</span>
            </li>
            <li class="flex items-start gap-2">
                <span class="text-red-600 font-bold">●</span>
                <span>Professional commentary on new regulations, enforcement actions and case studies.</span>
            </li>
            <li class="flex items-start gap-2">
                <span class="text-red-600 font-bold">●</span>
                <span>Practical guides, tools, and frameworks that help organisations strengthen controls.</span>
            </li>
            <li class="flex items-start gap-2">
                <span class="text-red-600 font-bold">●</span>
                <span>Stories from across regions and industries, spotlighting what's working and what still needs to evolve.</span>
            </li>
            <li class="flex items-start gap-2">
                <span class="text-red-600 font-bold">●</span>
                <span>Community-driven dialogue, powered by judges, advisors, practitioners and partners who contribute from all corners of the world</span>
            </li>
        </ul>
    </div>
</div>