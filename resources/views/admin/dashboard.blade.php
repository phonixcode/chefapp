@extends('layouts.admin')

@section('content')
<div class="container-fluid">
                        
    <!-- begin row -->
    <div class="row">
        <div class="col-lg-6 col-xxl-3 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-body">
                    <div class="d-flex h-100">
                        <div class="align-self-center">
                            <div class="apexchart-wrapper">
                                <div id="datingdemo5"></div>
                            </div>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h3 class="f-26 mb-0"><span class="count">{{ $recipes }}</span></h3>
                            <p class="text-muted mb-0">Recipes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-3 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-body">
                    <div class="d-flex h-100">
                        <div class="align-self-center">
                            <div class="apexchart-wrapper">
                                <div id="datingdemo6"></div>
                            </div>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h3 class="f-26 mb-0"><span class="count">{{ $orders }}</span></h3>
                            <p class="text-muted mb-0">Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-3 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-body">
                    <div class="d-flex h-100">
                        <div class="align-self-center">
                            <div class="apexchart-wrapper">
                                <div id="datingdemo7"></div>
                            </div>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h3 class="f-26 mb-0"><span class="count">{{ $blogs }}</span></h3>
                            <p class="text-muted mb-0">Blog</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-3 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-body">
                    <div class="d-flex h-100">
                        <div class="apexchart-wrapper">
                            <div id="datingdemo8"></div>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h3 class="f-26 mb-0"><span class="count">€{{ number_format($revenues,2) }}</span></h3>
                            <p class="text-muted mb-0">Revenue</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-8 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header d-block d-sm-flex justify-content-between align-items-center">
                    <div class="card-heading mb-2 mb-sm-0">
                        <h4 class="card-title"> Orders</h4>
                    </div>
                    <div class="dropdown">
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-light">Weekly </button>
                            <button type="button" class="btn btn-light">Monthly</button>
                            <button type="button" class="btn btn-light">Yearly</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="apexchart-wrapper">
                        <div id="datingdemo1" class="chart-fit"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header">
                    <h4 class="card-title">Orders</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <div class="d-flex">
                            <p>Successful</p>
                            <h5 class="text-muted ml-auto mb-0">4251</h5>
                        </div>
                        <div class="progress progress-sm m-b-10" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                            </div>
                        </div>
                    </div>
                    <div class="mb-1">
                        <div class="d-flex">
                            <p>Pending</p>
                            <h5 class="text-muted ml-auto mb-0">1459</h5>
                        </div>
                        <div class="progress progress-sm m-b-10" style="height: 5px;">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apexchart-wrapper">
                    <div id="datingdemo4"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- end row -->
</div>
@endsection