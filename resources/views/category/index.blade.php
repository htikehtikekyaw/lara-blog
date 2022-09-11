@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Category Lists</h4>
            <hr>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Owner</th>
                        <th>Control</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                {{ $category->title }}
                                <br>
                                <span class="badge bg-info">{{ $category->slug }}</span>
                            </td>
                            <td>
                                {{ \App\Models\User::find($category->user_id)->name }}
                            </td>
                            <td>
                                @can('update',$category)
                                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                @endcan
                                @can('delete',$category)
                                    <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                            <td>
                                <small><i class="bi bi-calendar text-warning me-1 mb-0"></i>{{ $category->created_at->format('d-m-Y') }}</small>
                                    <br>
                                <small><i class="bi bi-clock text-seondary me-1 mb-0"></i>{{ $category->created_at->format('h:i a') }}</small>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
