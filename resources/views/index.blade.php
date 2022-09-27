@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-center">Blog by Htike Htike Kyaw</h1>
                <div class="my-2">
                    <form action="{{ route('page.index') }}" method="get">
                        <div class="input-group">
                            <input type="search" value="{{ request('keyword') }}" class="form-control" name="keyword" required>
                            <button class="btn btn-outline-primary">Search</button>
                        </div>
                    </form>
                </div>
                @forelse($posts as $post)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <div class="">
                                <a href="{{ route('page.category',$post->category->slug) }}">
                                    <span class="badge bg-info">{{ $post->category->title }}</span>
                                </a>
                            </div>
                            <p class="my-2">{{ $post->excerpt }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <a style="text-decoration: none;" href="{{ route('page.user',$post->user->name) }}"><p class="mb-0">{{ $post->user->name }}</p></a>
                                    <a style="text-decoration: none;" href="{{ route('page.day',$post->created_at->format('d-m-Y')) }}"><p class="mb-0">{{ $post->created_at->diffforHumans() }}</p></a>
                                </div>
                                <a href="{{ route('page.detail',$post->slug) }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <h1>There is no posts yets</h1>
                        </div>
                    </div>
                @endforelse
                <div class="d-flex justify-content-end">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection