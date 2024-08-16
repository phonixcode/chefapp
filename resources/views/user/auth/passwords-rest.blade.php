@extends('layouts.main')

@section('content')
    <section class="spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="contact__form">
                    <h3 class="mb-4">Reset Password</h3>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="New Password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="site-btn">Reset Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
