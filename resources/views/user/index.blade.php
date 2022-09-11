@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Manage User</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>User Lists</h4>
            <hr>
            <div class="d-flex justigy-content-between mb-2">
                <div class="w-50 d-flex align-items-center">
                    @if(request('keyword'))
                        <p class="mb-0 me-3">Search by : " {{ request('keyword') }} " </p> <a class="btn btn-sm btn-warning" href="{{ route('post.index') }}"><i class="bi bi-trash"></i></a>
                    @endif
                </div>
                <div class="w-50">
                    <form action="{{ route('post.index') }}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="keyword" required>
                            <button class="btn btn-outline-primary"> <i class="bi bi-search"></i> Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-hover table-bordered w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Eamil</th>
                        <th>Role</th>
                        <th>Control</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td class="text-nowrap">
                                {{ $user->email }}
                            </td>
                            <td class="text-nowrap">
                               {{ $user->role }}
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('user.show',$user->id) }}" class="btn btn-success btn-sm"><i class="bi bi-info-circle"></i></a>
                                @can('update',$user)
                                    <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                @endcan
                                @can('delete',$user)
                                        <form action="{{ route('user.destroy',$user->id) }}" class="d-inline-block" method="user">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                            <td>
                                <small class="text-nowrap"><i class="bi bi-calendar text-warning me-1 mb-0"></i>{{ $user->created_at->format('d-m-Y') }}</small>
                                    <br>
                                <small><i class="bi bi-clock text-seondary me-1 mb-0"></i>{{ $user->created_at->format('h:i a') }}</small>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">There is no post</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $users->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
