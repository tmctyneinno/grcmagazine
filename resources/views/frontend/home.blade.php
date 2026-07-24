@extends('layouts.app')

@section('title', 'GRCFincrimeToday - Home')

@section('content')
    <livewire:home.hero-slider />   
    <livewire:home.latest-posts /> 
    <livewire:home.category-section /> 
    <livewire:home.regulatory-section /> 
@endsection   