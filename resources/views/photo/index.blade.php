@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item" href="{{ route('home') }}" aria-current="page"> Home</a>
            <a class="breadcrumb-item active" aria-current="page">Gallery</a>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @forelse(Auth::user()->photos as $photo)
                    <div class="col-3 mb-2">
                        <img src="{{ asset('storage/'.$photo->name) }}" class="img-fluid h-100 rounded"  alt="">
                    </div>
                @empty
            </div>

            @endforelse
        </div>
    </div>
@endsection
