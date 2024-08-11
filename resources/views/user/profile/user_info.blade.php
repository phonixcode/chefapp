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

                            <div class="checkout__order">
                                <h6 class="order__title">2 Factor Authentication</h6>
                        
                                <form id="2fa-form" action="{{ route('update.2fa') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="switch">
                                            <input type="checkbox" id="2fa-toggle" {{ auth()->user()->is_2fa_enabled ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>                        
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    </style>
@endpush

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('2fa-toggle');
        const form = document.getElementById('2fa-form');
    
        toggle.addEventListener('change', function () {
            // Get the current state of the checkbox
            const isEnabled = toggle.checked;
    
            // Create a FormData object
            const formData = new FormData();
            formData.append('_token', form.querySelector('input[name="_token"]').value);
            formData.append('is_2fa_enabled', isEnabled ? 1 : 0);
    
            // Send AJAX request to update 2FA status
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('2FA status updated');
                } else {
                    console.error('Failed to update 2FA status');
                    // Optionally, revert the checkbox state if there's an error
                    toggle.checked = !isEnabled;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Optionally, revert the checkbox state if there's an error
                toggle.checked = !isEnabled;
            });
        });
    });
    </script>
    
@endpush
