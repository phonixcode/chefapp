@extends('layouts.main')

@section('content')
    <section class="spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="contact__form">
                    <h3 class="mb-4">Forgot Password</h3>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Email" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="site-btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
