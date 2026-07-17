@extends('layouts.app')

@section('title', 'GRCFincrimeToday - News')

@section('content')
      
    <livewire:postContent.post-header />
    <livewire:postContent.leave-comment :postId="$article->id" />
    <livewire:recommended-posts />
@endsection 