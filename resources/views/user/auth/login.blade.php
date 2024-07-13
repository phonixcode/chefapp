@extends('layouts.main')

@section('content')
    <section class="spad">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="contact__form">
                    <h3 class="mb-4">Login</h3>

                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        @include('partials._alert')
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Email</label>
                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="">Password</label>
                                <input type="password" placeholder="******" name="password">
                            </div>
                            <div class="col-lg-12">
                                <a href="{{ route('forget.password') }}">Forget Password?</a><br><br>
                                <button type="submit" class="site-btn">Submit</button>
                                <span>Don't Have an Account <a href="{{ route('register') }}">Click here</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
