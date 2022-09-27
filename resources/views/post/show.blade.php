
@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item" href="{{ route('home') }}" aria-current="page"> Home</a>
            <a class="breadcrumb-item" href="{{ route('post.index') }}" aria-current="page">Post List</a>
            <a class="breadcrumb-item active" aria-current="page">Post Detail</a>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>{{ $post->title }}</h4>
            <hr>
            <div class="mb-2">
                <span class="badge bg-primary">
                    <i class="bi bi-grid"></i>
                    {{ $post->category->title }}
                </span>
                <span class="badge bg-secondary">
                    <i class="bi bi-person"></i>
                    {{ $post->user->name }}
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
            <div class="">
                <div class="row">
                    @foreach($post->photos as $photo)
                        <div class="col-2">
                            <img src="{{ asset('storage/'.$photo->name) }}" class="img-fluid h-100"  alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-between">
                <a href="{{ route('post.index') }}" class="btn btn-primary"> Post Lists</a>
                <a href="{{ route('post.create') }}" class="btn btn-outline-primary">Create New Post</a>
            </div>
        </div>
    </div>
@endsection
