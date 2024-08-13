@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Withdrawals</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active text-warning" aria-current="page">Withdrawals</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert border-0 alert-danger m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    
    <!-- begin row -->
    <div class="row">
        
        <div class="col-12 col-lg-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Requested Withdrawals</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col" class="action-column">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdrawals as $item)
                                <tr>
                                    <th scope="row">{{ $withdrawals->firstItem() + $loop->index }}</th>
                                    <td>€{{ number_format($item->amount,2) }}</td>
                                    <td>
                                        <span class="{{ ($item->status == 'completed') ? 'text-success'  : ($item->status == 'rejected' ? 'text-danger' : 'text-warning' ) }}">
                                            {{ strtoupper($item->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->formatted_created_at }}</td>
                                    <td class="action-column">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu{{ $item->id }}">
                                            <a href="#" 
                                            class="dropdown-item" 
                                            data-toggle="modal" 
                                            data-target="#requestwithdrawal" 
                                            data-bank-info="{{ $item->user->withdrawalDetails->bank_information ?? 'No information available' }}">Details</a>
                                            @if($item->status === 'pending')
                                            <form action="{{ route('withdrawals.updateStatus', $item->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" class="dropdown-item">Complete</button>
                                            </form>
                                            <form action="{{ route('withdrawals.updateStatus', $item->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="dropdown-item">Reject</button>
                                            </form>
                                            @else
                                            <span class="dropdown-item disabled">Completed/Rejected</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Widthdrawals not found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $withdrawals->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="modal fade" id="requestwithdrawal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestwithdrawalTitle">Bank Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="bank-information"></p>
            </div>
        </div>
    </div>
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

@push('scripts')
<script>
    $('#requestwithdrawal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var bankInfo = button.data('bank-info');
        
        var modal = $(this);
        modal.find('#bank-information').html(bankInfo); 
    });
</script>

{{-- <script>
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            // Disable the buttons to prevent multiple submissions
            var buttons = form.querySelectorAll('button');
            buttons.forEach(function(button) {
                button.disabled = true;
            });
        });
    });
</script> --}}

@endpush