@extends('layouts.app')

@section('title', 'GRCFincrimeToday - News')

@section('content')
      
    <livewire:banner 
        image="/assets/img/news-banner.jpg" 
        title="Goverance, Risk & ESG"
    />
    <livewire:risk-esg />
    <livewire:recommended-posts />
@endsection