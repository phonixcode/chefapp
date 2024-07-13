@extends('layouts.main')

@section('content')
    <section class="spad">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="contact__form">
                    <h3 class="mb-4">Register</h3>

                    <form id="register-form" action="{{ route('register.submit') }}" method="post">
                        @csrf
                        @include('partials._alert')
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="******">
                            </div>
                            <div class="col-lg-6">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="******">
                            </div>

                            <div class="col-lg-6">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="State" value="{{ old('state') }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" placeholder="City" {{ old('city') }}>
                            </div>
                            
                            <div class="col-lg-12">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" placeholder="Address" cols="30" rows="10">{{ old('address') }}</textarea>
                            </div>

                            <div class="col-lg-6 chef-field" style="display: none;">
                                <label for="restaurant_name">Restaurant Name</label>
                                <input type="text" id="restaurant_name" name="restaurant_name" placeholder="Restaurant Name" value="{{ old('restaurant_name') }}">
                            </div>
                            <div class="col-lg-6 chef-field" style="display: none;">
                                <label for="restaurant_address">Restaurant Address</label>
                                <input type="text" id="restaurant_address" name="restaurant_address" placeholder="Restaurant Address" value="{{ old('restaurant_address') }}">
                            </div>
                            <div class="col-lg-6 chef-field" style="display: none;">
                                <label for="restaurant_city">Restaurant City</label>
                                <input type="text" id="restaurant_city" name="restaurant_city" placeholder="Restaurant City" value="{{ old('restaurant_city') }}">
                            </div>
                            <div class="col-lg-6 chef-field" style="display: none;">
                                <label for="restaurant_state">Restaurant State</label>
                                <input type="text" id="restaurant_state" name="restaurant_state" placeholder="Restaurant State" value="{{ old('restaurant_state') }}">
                            </div>
                            <div class="col-lg-6 chef-field" style="display: none;">
                                <label for="speciality">Speciality</label>
                                <input type="text" id="speciality" name="speciality" placeholder="Speciality" value="{{ old('speciality') }}">
                            </div>
                            <div class="col-lg-6 chef-field" style="display: none;">
                                <label for="experience">Years of Experience</label>
                                <input type="number" id="experience" name="experience" placeholder="Years of Experience" value="{{ old('experience') }}">
                            </div>

                            <div class="col-lg-12">
                                <span>Already have an account? <a href="{{ route('login') }}">Click here</a></span><br><br>
                                <button type="submit" class="site-btn">Submit</button>
                                <span>Become a Registered Chef: <a href="{{ route('register', ['action' => 'chef']) }}"
                                        id="chef-link">Sign Up Here</a></span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
@endsection
@push('js')
    <script>
        // Check if URL contains ?action=chef and display additional fields if true
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('action') && urlParams.get('action') === 'chef') {
                document.querySelectorAll('.chef-field').forEach(field => {
                    field.style.display = 'block';
                });

                // Append the action=chef parameter to the form action URL
                const form = document.getElementById('register-form');
                form.action += '?action=chef';
            }
        });
    </script>
@endpush
