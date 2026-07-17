@extends('layouts.app')

@section('title', 'GRCFincrimeToday - News')

@section('content')
      
    <livewire:postContent.post-header />
    {{-- ✅ Pass the article ID here --}}
    <livewire:postContent.leave-comment :postId="$article->id" />
@endsection 