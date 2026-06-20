@extends('layouts.app')

@section('title', 'GRCFincrimeToday - About')

@section('content')
    <livewire:banner 
        image="/assets/img/about-banner.jpg" 
        title="Fincrime & AML"
    />   
    <livewire:fincrime-aml />
    <livewire:recommended-posts />  
@endsection 