@extends('layouts.main')

@section('content')
<section class="contact spad">
    <div class="container">
        @include('user._include._map')
        
        <div class="row">
            <div class="col-lg-4">
                <div class="contact__text">
                    <h3>Contact With us</h3>
                    <ul>
                        <li>Representatives or Advisors are available:</li>
                        <li>Mon-Fri: 5:00am to 9:00pm</li>
                        <li>Sat-Sun: 6:00am to 9:00pm</li>
                    </ul>
                    <img src="{{ asset('img/cake-piece.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact__form">
                    <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Message" required></textarea>
                                <button type="submit" class="site-btn">
                                    <span id="spinner" class="spinner-border spinner-border-sm" style="display: none;" role="status" aria-hidden="true"></span>
                                    Send Us
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="successMessage" style="display: none; color: green; margin-top: 10px;">
                        Message sent successfully!
                    </div>
                    <div id="errorMessage" style="display: none; color: red; margin-top: 10px;">
                        Something went wrong, please try again.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let form = event.target;
        let formData = new FormData(form);

        // Show spinner
        document.getElementById('spinner').style.display = 'inline-block';

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            }
        })
        .then(response => response.json())
        .then(data => {
            // Hide spinner
            document.getElementById('spinner').style.display = 'none';

            if (data.success) {
                document.getElementById('successMessage').style.display = 'block';
                form.reset(); // Clear the form
            } else {
                document.getElementById('errorMessage').style.display = 'block';
            }
        })
        .catch(error => {
            document.getElementById('spinner').style.display = 'none';
            document.getElementById('errorMessage').style.display = 'block';
        });
    });
</script>
@endpush
