@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Withdrawal</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active text-warning" aria-current="page">Withdrawal</li>
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
        <div class="col-md-12 m-b-30">
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <a href="#" class="btn btn-outline-primary btn-icon-text" data-toggle="modal" data-target="#bankDetail">
                        Withdrawal Details
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-icon-text" data-toggle="modal" data-target="#requestwithdrawal">
                        Request For Withdrawal
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Withdrawal History</h4>
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
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Widthdrawal not found</td>
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

<div class="modal fade" id="bankDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bankDetailTitle">Add Bank Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('withdrawal.bank.information.submit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="bank_information">Bank Information</label>
                        <textarea class="form-control summernote" id="bank_information" name="bank_information"
                            placeholder="Enter your bank details here...">{{ old('bank_information', $withdrawalDetail->bank_information ?? '') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="requestwithdrawal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestwithdrawalTitle">Request Withdrawal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('withdrawal.revenue.submit') }}" method="POST">
                    @csrf
                    <label for="">Total Revenue : €{{ number_format($revenues,2) }}</label>
                    <div class="form-group">
                        <label for="">Enter Amount</label>
                        <input type="number" class="form-control" step="any" name="amount" id="amount">
                    </div>

                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endpush