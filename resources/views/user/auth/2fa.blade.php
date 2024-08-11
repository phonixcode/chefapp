@extends('layouts.main')

@section('content')
    <section class="spad">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="contact__form">
                    <h3 class="mb-4">Two-Factor Authentication</h3>

                    <form method="POST" action="{{ route('2fa.verify.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="two_factor_code">Enter the code sent to your email</label>
                            <input type="text" class="form-control" id="two_factor_code" name="two_factor_code" required>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <button type="submit" class="site-btn">Verify</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
