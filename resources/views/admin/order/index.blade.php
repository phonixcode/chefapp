@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>List Orders</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active text-warning" aria-current="page">Orders</li>
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
                                    <th scope="col">Recipes Purchase</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Order Status</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col" class="action-column">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                <tr>
                                    <th scope="row">{{ $orders->firstItem() + $loop->index }}</th>
                                    <td>{{ count($item->items) }}</td>
                                    <td>
                                        <span class="{{ ($item->payment_status == 'paid') ? 'text-success'  : 'text-danger' }}">
                                            {{ strtoupper($item->payment_status) }}
                                        </span>
                                    </td>
                                    <td>€{{ $item->total_price }}</td>
                                    <td>
                                        <span class="{{ ($item->payment_status == 'paid') ? 'text-success'  : 'text-danger' }}">
                                            {{ strtoupper($item->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->formatted_created_at }}</td>
                                    <td class="action-column">
                                        <a href="{{ route('orders.detail', $item->id) }}" class="btn btn-primary btn-xs">Details</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">Orders not found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links('vendor.pagination.custom') }}
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