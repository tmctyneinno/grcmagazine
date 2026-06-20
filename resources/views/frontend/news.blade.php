@extends('layouts.app')

@section('title', 'GRCFincrimeToday - News')

@section('content')
      
    <livewire:banner 
        image="/assets/img/news-banner.jpg" 
        title="News & Analytics"
    />
    <livewire:news-analytics />
    <livewire:recommended-posts />
@endsection