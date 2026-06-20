@extends('layouts.app')

@section('title', 'GRCFincrimeToday - About')

@section('content')
    <livewire:banner 
        image="/assets/img/about-banner.jpg" 
        title="About us"
    />   
    <livewire:aboutus-content />   
@endsection 