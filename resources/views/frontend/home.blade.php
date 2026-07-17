@extends('layouts.app')

@section('title', 'GRCFincrimeToday - Home')

@section('content')
    <livewire:hero-slider />   
    <livewire:latest-posts /> 
    <livewire:category-section /> 
    <livewire:regulatory-section /> 


@endsection   