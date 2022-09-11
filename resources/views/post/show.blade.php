
@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" href="{{ route('home') }}" aria-current="page">Home</li>
            <li class="breadcrumb-item" href="{{ route('post.index') }}" aria-current="page">Post List</li>
            <li class="breadcrumb-item" aria-current="page"> Post Detail </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>{{ $post->title }}</h4>
            <hr>
            <div class="mb-2">
                <span class="badge bg-primary">
                    <i class="bi bi-grid"></i>
                    {{ \App\Models\Category::find($post->category_id)->title }}
                </span>
                <span class="badge bg-secondary">
                    <i class="bi bi-person"></i>
                    {{ \App\Models\User::find($post->user_id)->name }}
                </span>
                <span class="text-nowrap"><i class="bi bi-calendar text-warning me-1 mb-0"></i>{{ $post->created_at->format('d-m-Y') }}</span>
                <span><i class="bi bi-clock text-seondary me-1 mb-0"></i>{{ $post->created_at->format('h:i a') }}</span>
            </div>
            @isset($post->featured_image)
                <div class="my-3">
                    <img src="{{ asset('storage/'.$post->featured_image) }}" class="w-100" alt="">
                </div>
            @endisset
            <p>
                {{ $post->description }}
            </p>
            <hr>
            <div class="d-flex justify-content-between align-items-between">
                <a href="{{ route('post.index') }}" class="btn btn-primary"> Post Lists</a>
                <a href="{{ route('post.create') }}" class="btn btn-outline-primary">Create New Post</a>
            </div>
        </div>
    </div>
@endsection
