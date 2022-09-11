@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" href="{{ route('home') }}" aria-current="page">Home</li>
            <li class="breadcrumb-item" href="{{ route('category.index') }}" aria-current="page">Manage Category</li>
            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Edit Category</h4>
            <hr>
            <form action="{{ route('category.update',$category->id) }}" method="post">
                @csrf 
                @method('put')
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$category->title) }}" name="title">
                        @error('title')
                            <small class="invalid-feedback fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
