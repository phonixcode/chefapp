@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Order Details</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('orders') }}">Orders</a>
                            </li>
                            <li class="breadcrumb-item active text-warning" aria-current="page">Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    
    <!-- begin row -->
    <div class="row justify-content-md-center gutters">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-container">
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <p class="{{ ($order->payment_status == 'paid') ? 'text-success'  : 'text-danger' }}">
                                    {{ strtoupper($order->status) }}
                                </p>
                            </div>
                        </div>
                        <div class="spacer30"></div>
                        <div class="row gutters">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p class="font-weight-bold">{{ $order->user->name }}</p>
                                <p class="text-warning">{{ $order->user->email }}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p class="text-right"><small> {{ Carbon\Carbon::parse($order->created_at)->isoFormat('MMMM Do YYYY, hh:mm:ssa') }}</small></p>
                            </div>
                        </div>
                        <div class="spacer50"></div>
                        <div class="row gutters">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="display compact table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Image</th>
                                                <th>Recipe</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $item->recipe->image_urls[0] }}" alt="" width="50">
                                                </td>
                                                <td>{{ $item->recipe->title }}</td>
                                                <td>€{{ number_format($item->recipe->price,2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row gutters">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <table class="table plain">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="text-right">Subtotal</p>                            
                                                <p class="text-right text-warning"><strong>Grand Total</strong></p>
                                            </td>
                                            <td>
                                                <p class="text-right">€{{ number_format($order->total_price,2) }}</p>
                                                <p class="text-right text-warning ml-3"><strong>€{{ number_format($order->total_price,2) }}</strong></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="spacer20"></div>

                        
                    </div>
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
<style>
    .invoice-container {
        background-color: rgb(255, 255, 255);
        padding: 1rem;
    }
    .gutters {
        margin-right: -8px;
        margin-left: -8px;
    }
    .spacer20 {
        height: 20px;
    }
    .spacer30 {
        height: 30px;
    }
    .spacer50 {
        height: 50px;
    }
    </style>
@endpush