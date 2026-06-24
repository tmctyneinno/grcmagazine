@extends('layouts.app')

@section('title', 'GRCFincrimeToday - News')

@section('content')
      
    <livewire:post-header />
    {{-- ✅ Pass the article ID here --}}
    <livewire:leave-comment :postId="$article->id" />
@endsection