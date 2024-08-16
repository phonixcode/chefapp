@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Chef Verification</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active text-warning" aria-current="page">Chef Verification</li>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Chef Name</th>
                                    <th scope="col">Certificate</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Submitted At</th>
                                    <th scope="col" class="action-column">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($chefVerifications as $verification)
                                <tr>
                                    <th scope="row">{{ $chefVerifications->firstItem() + $loop->index }}</th>
                                    <<td>{{ $verification->user->name }}</td>
                                    <td>
                                        @if($verification->certificate)
                                            <a href="{{ asset('storage/' . $verification->certificate) }}" target="_blank" class="text-primary">View Certificate</a>
                                        @else
                                            No Certificate Uploaded
                                        @endif
                                    </td>
                                    <td>{{ ucfirst($verification->status) }}</td>
                                    <td>{{ $verification->created_at->format('d M Y, h:i A') }}</td>
                                    <td class="action-column">
                                        <form action="{{ route('chef-verifications.update', $verification->id) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="status" value="completed" class="btn btn-success btn-sm"
                                                {{ $verification->status != 'pending' ? 'disabled' : '' }}>Approve</button>
                                            <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm"
                                                {{ $verification->status != 'pending' ? 'disabled' : '' }}>Reject</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">chef verification not found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $chefVerifications->links('vendor.pagination.custom') }}
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