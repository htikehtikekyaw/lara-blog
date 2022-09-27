
@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" href="{{ route('home') }}" aria-current="page">Home</li>
            <li class="breadcrumb-item" href="{{ route('post.index') }}" aria-current="page">Post List</li>
            <li class="breadcrumb-item" aria-current="page">Create Post</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Create New Post</h4>
            <hr>
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="mb-3">
                    <label for="title">Post Title</label>
                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title">
                    @error('title')
                        <small class="invalid-feedback fw-bold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="invalid-feedback fw-bold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photos">Post Photo</label>
                    <input type="file" id="photos" class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror" value="{{ old('photos') }}" name="photos[]" multiple>
                    @error('photos.*')
                        <small class="invalid-feedback fw-bold">{{ $message }}</small>
                    @enderror
                    @error('photos')
                        <small class="invalid-feedback fw-bold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea type="text" rows="10" id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="invalid-feedback fw-bold">{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="">
                        <label for="featured_image">Featrued Image</label>
                        <input type="file" id="featured_image" class="form-control @error('featured_image') is-invalid @enderror" value="{{ old('featured_image') }}" name="featured_image">
                        @error('featured_image')
                            <small class="invalid-feedback fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Create Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
