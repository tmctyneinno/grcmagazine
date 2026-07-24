@extends('layouts.app')

@section('title', 'GRCFincrimeToday - About')

@section('content')
    <livewire:banner 
        image="/assets/img/about-banner.jpg" 
        title="Governance, Risk & ESG"
    />   
    <livewire:governance-risk-esg />
    <livewire:general.recommended-posts />  
@endsection  