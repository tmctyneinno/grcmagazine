@extends('layouts.app')

@section('title', 'GRCFincrimeToday - News')

@section('content')
      
    <livewire:banner 
        image="/assets/img/news-banner.jpg" 
        title="Technology, AI & RegTech"
    />
    <livewire:technologyAIRegTech />
    <livewire:general.recommended-posts />
@endsection