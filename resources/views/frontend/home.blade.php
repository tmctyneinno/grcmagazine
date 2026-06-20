@extends('layouts.app')

@section('title', 'GRCFincrimeToday - Home')

@section('content')
    <livewire:hero-slider />   
    <livewire:latest-posts />
    <livewire:recommended-posts />
    <livewire:most-read />
    <livewire:reports-special-editions />
@endsection  