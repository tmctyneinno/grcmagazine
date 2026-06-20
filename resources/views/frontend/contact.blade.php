@extends('layouts.app')

@section('title', 'GRCFincrimeToday - News')

@section('content')
      
    <livewire:banner 
        image="/assets/img/news-banner.jpg" 
        title="Contact"
    />
    <livewire:contact-section />
    <livewire:office-map-section />
@endsection