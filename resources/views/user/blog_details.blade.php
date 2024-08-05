@extends('layouts.main')

@section('content')

<div class="blog-hero set-bg" data-setbg="{{ $blog->photo_url }}">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7">
                <div class="blog__hero__text">
                    <div class="label">Recipes</div>
                    <h2>{{ $blog->title }}</h2>
                    <ul>
                        <li>By <span>{{ $blog->user->name }}</span></li>
                        <li>{{ $blog->formatted_created_at }}</li>
                        <li>{{ formatViews($blog->views) }} Views</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__share">
                        <a href="javascript:void(0);" id="share-facebook" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="javascript:void(0);" id="share-twitter" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="javascript:void(0);" id="share-instagram" class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>

                    {!! $blog->long_description !!}
                    
                    
                    <div class="blog__details__author">
                        <div class="blog__details__author__pic">
                            <img src="{{ asset('img/chef-profile.jpg') }}" alt="">
                        </div>
                        <div class="blog__details__author__text">
                            <h6>{{ $blog->user->name }}</h6>
                            <div class="blog__details__author__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentUrl = window.location.href;
        const title = "{{ $blog->title }}";

        document.getElementById('share-facebook').addEventListener('click', function (e) {
            e.preventDefault();
            const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
            window.open(facebookUrl, 'Share', 'width=600,height=400');
        });

        document.getElementById('share-twitter').addEventListener('click', function (e) {
            e.preventDefault();
            const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(title)}`;
            window.open(twitterUrl, 'Share', 'width=600,height=400');
        });


        document.getElementById('share-instagram').addEventListener('click', function (e) {
            e.preventDefault();
            const instagramUrl = `https://www.instagram.com/`;
            window.open(instagramUrl, 'Share', 'width=600,height=400');
        });
    });
</script>
@endpush