@extends('layouts.main')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Profile'])

    <section class="spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('partials._alert')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">User Info</h6>

                                <form action="{{ route('user.profile.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="name"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="email"
                                            value="{{ auth()->user()->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control" name="address" id="" cols="30" rows="10" style="height: 50px;">{{ auth()->user()->address }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control" placeholder="city"
                                            value="{{ auth()->user()->city }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">State</label>
                                        <input type="text" name="state" class="form-control" placeholder="state"
                                            value="{{ auth()->user()->state }}">
                                    </div>

                                    <button type="submit" class="btn btn-dark">
                                        Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Change Password</h6>
                        
                                <form action="{{ route('user.password.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="old-password">Old Password</label>
                                        <input type="password" name="old-password" class="form-control" placeholder="***" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-password">New Password</label>
                                        <input type="password" name="new-password" class="form-control" placeholder="***" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="***" required>
                                    </div>
                        
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
