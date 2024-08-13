@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Profile Settings</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active text-warning" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <!-- end row -->

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
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <form action="{{ route('profile.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="specialty">Specialty</label>
                            <input type="text" class="form-control" id="specialty" placeholder="" name="specialty"
                                value="{{ auth()->user()->specialty }}">
                        </div>   

                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" class="form-control" id="experience" placeholder="" name="experience"
                                value="{{ auth()->user()->experience }}">
                        </div>   

                        <div class="form-group">
                            <label for="restaurant_name">Restaurant Name</label>
                            <input type="text" class="form-control" id="restaurant_name" placeholder="" name="restaurant_name"
                                value="{{ auth()->user()->restaurant_name }}">
                        </div>
                                        
                        <div class="form-group">
                            <label for="restaurant_city">Restaurant City</label>
                            <input type="text" class="form-control" id="restaurant_city" placeholder=" " name="restaurant_city"
                                value="{{ auth()->user()->restaurant_city }}">
                        </div>                   
                        <div class="form-group">
                            <label for="restaurant_state">Restaurant State</label>
                            <input type="text" class="form-control" id="restaurant_state" placeholder="" name="restaurant_state"
                                value="{{ auth()->user()->restaurant_state }}">
                        </div>                   

                        <div class="form-group">
                            <label for="restaurant_address">Restaurant Address</label>
                            <textarea class="form-control" id="restaurant_address" placeholder=""
                                name="restaurant_address">{{ auth()->user()->restaurant_address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="photo">Chef Photo</label>
                            <input type="file" class="form-control" accept="image/*" id="photo" name="photo">
                            @if (auth()->user()->photo != NULL)
                                <img src="{{ auth()->user()->photo_url }}" alt="" width="100" class="mt-2">
                            @endif
                        </div>     

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Booking Infomation</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('booking.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="calendar_link">Calendar Link</label>
                            <input type="url" class="form-control" id="calendar_link" placeholder="" name="calendar_link"
                                value="{{ old('calendar_link', $booking->calendar_link ?? '') }}">

                            <small>Note: Get your link from <a href="https://calendly.com/" target="_blank" rel="noopener noreferrer">calendly.com</a></small>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">
                            Chef Verification

                            <span class="btn btn-badge btn-dark">
                                Not Verify
                            </span>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="upload_certificate">Upload Certificate</label>
                            <input type="file" class="form-control" id="upload_certificate" placeholder="" name="upload_certificate">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection