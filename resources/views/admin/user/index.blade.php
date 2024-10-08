@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>List Users</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active text-warning" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    
    <!-- begin row -->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card card-statistics">
                {{-- <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">List Of Users</h4>
                    </div>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Join Date</th>
                                    <th scope="col" class="action-column">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item)
                                <tr>
                                    <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                                    <td>
                                        <img src="{{ $item->photo != NULL ? $item->photo_url : asset('img/chef-profile.jpg') }}" alt="" width="30">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ strtoupper(implode(', ', $item->role_names)) }}</td>
                                    <td>{{ $item->formatted_created_at }}</td>
                                    <td class="action-column">
                                        {{-- <a href="{{ route('users.show', $item->id) }}" class="btn btn-info btn-xs">Details</a> --}}
                                        {{-- <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary btn-xs">Edit</a> --}}
                                        <form action="{{ route('users.destroy', $item->id) }}" method="post" style="display:inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">User not found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection

@push('styles')
<style>
    .action-column {
        width: 150px;
        white-space: nowrap;
    }

    .btn-xs {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
</style>
@endpush