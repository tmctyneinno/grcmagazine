<?php

use Livewire\Component;

new class extends Component
{ 
    // Sample posts data — replace with DB query in production
    public $posts = [
        [
            'image' => '/assets/img/post-4.jpg',
            'title' => 'OFAC Expands SDN List — 47 Entities Added in Largest Single Designation Action of 2026',
            'excerpt' => 'The Treasury\'s designations span six jurisdictions and include front companies alleged to have channelled funds to sanctioned state actors through third-country intermediaries.',
            'date' => 'Washington Desk . 26 June 2026',
            'slug' => 'ofac-expands-sdn-list'
        ],
        [
            'image' => '/assets/img/post-2.jpg',
            'title' => 'New Standards in Financial Compliance',
            'excerpt' => 'We are updating our framework to meet global standards, ensuring safety and trust in every transaction across borders.',
            'date' => 'London Desk . 24 June 2026',
            'slug' => 'new-standards-financial-compliance'
        ],
        [
            'image' => '/assets/img/post-3.jpg',
            'title' => 'Risk Management in Modern Business',
            'excerpt' => 'How companies are adapting risk strategies to a fast-changing digital and regulatory landscape in 2026.',
            'date' => 'Nairobi Desk . 22 June 2026',
            'slug' => 'risk-management-modern-business'
        ],
        [
            'image' => '/assets/img/post-4.jpg',
            'title' => 'Digital Operational Resilience Act (DORA)',
            'excerpt' => 'Understanding the new EU requirements for ICT risk management and how they impact financial entities worldwide.',
            'date' => 'Brussels Desk . 20 June 2026',
            'slug' => 'dora-eu-requirements'
        ],
        [
            'image' => '/assets/img/post-2.jpg',
            'title' => 'Crypto Asset Reporting Framework (CARF)',
            'excerpt' => 'OECD releases new guidance on crypto tax reporting, setting global standards for transparency and compliance.',
            'date' => 'Paris Desk . 18 June 2026',
            'slug' => 'carf-crypto-reporting'
        ],
        [
            'image' => '/assets/img/post-3.jpg',
            'title' => 'Anti-Money Laundering Authority (AMLA)',
            'excerpt' => 'The new EU agency begins operations, taking over direct supervision of high-risk cross-border financial institutions.',
            'date' => 'Frankfurt Desk . 15 June 2026',
            'slug' => 'amla-eu-agency'
        ],
    ];

    
};
?>

<div class="w-full bg-[#f8f5ee] py-12 px-4 sm:px-6 lg:px-8" style="font-family: 'EB Garamond', serif;">
    <div class="max-w-7xl mx-auto space-y-12">
        
        {{-- ========================================== --}}
        {{-- SECTION 1: SIMILAR ARTICLES                --}}
        {{-- ========================================== --}}
        <section>
            {{-- Section Header --}}
            <div class="flex items-center gap-4 mb-6">
                <span class="bg-[#c9a227] text-white text-xs font-bold tracking-widest uppercase px-3 py-1.5">
                    Similar Articles
                </span>
                <div class="h-[1px] bg-gray-300 flex-grow"></div>
            </div>

            {{-- Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach(array_slice($posts, 0, 3) as $post)
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 group hover:shadow-md transition-shadow duration-300">
                        {{-- Image --}}
                        <div class="relative h-48 overflow-hidden">
                            <img 
                                src="{{ $post['image'] }}" 
                                alt="{{ $post['title'] }}" 
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                            >
                        </div>
                        
                        {{-- Content --}}
                        <div class="p-5 flex flex-col justify-between min-h-[220px]">
                            <div>
                                <h3 class="text-lg font-serif font-bold text-gray-900 leading-tight mb-3 line-clamp-2 group-hover:text-[#c9a227] transition-colors">
                                    {{ $post['title'] }}
                                </h3>
                                <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3">
                                    {{ $post['excerpt'] }}
                                </p>
                            </div>
                            
                            <div>
                                <a href="{{ url('/post/'.$post['slug']) }}" class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-gray-900 hover:text-[#c9a227] transition-colors mb-3">
                                    Read Full Brief 
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                                </a>
                                <div class="text-[10px] text-gray-400 italic border-t border-gray-100 pt-3">
                                    {{ $post['date'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ========================================== --}}
        {{-- SECTION 2: RECOMMENDED ARTICLES            --}}
        {{-- ========================================== --}}
        <section>
            {{-- Section Header --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-4 flex-grow">
                    <span class="bg-[#c9a227] text-white text-xs font-bold tracking-widest uppercase px-3 py-1.5">
                        Recommended Articles
                    </span>
                    <div class="h-[1px] bg-gray-300 flex-grow"></div>
                </div>
                <a href="#" class="text-sm font-medium text-gray-700 hover:text-[#c9a227] transition-colors ml-4 whitespace-nowrap">
                    See all
                </a>
            </div>

            {{-- Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach(array_slice($posts, 3, 3) as $post)
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 group hover:shadow-md transition-shadow duration-300">
                        {{-- Image --}}
                        <div class="relative h-48 overflow-hidden">
                            <img 
                                src="{{ $post['image'] }}" 
                                alt="{{ $post['title'] }}" 
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                            >
                        </div>
                        
                        {{-- Content --}}
                        <div class="p-5 flex flex-col justify-between min-h-[220px]">
                            <div>
                                <h3 class="text-lg font-serif font-bold text-gray-900 leading-tight mb-3 line-clamp-2 group-hover:text-[#c9a227] transition-colors">
                                    {{ $post['title'] }}
                                </h3>
                                <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3">
                                    {{ $post['excerpt'] }}
                                </p>
                            </div>
                            
                            <div>
                                <a href="{{ url('/post/'.$post['slug']) }}" class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-gray-900 hover:text-[#c9a227] transition-colors mb-3">
                                    Read Full Brief 
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m5-4H3"></path></svg>
                                </a>
                                <div class="text-[10px] text-gray-400 italic border-t border-gray-100 pt-3">
                                    {{ $post['date'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</div>