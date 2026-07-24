@extends('layouts.app')

@section('title', 'GRCFincrimeToday - News')

@section('content')
      
    <livewire:eventContent.event-content :eventId="$event->id" />
@endsection   