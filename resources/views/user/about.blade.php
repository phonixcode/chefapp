@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'About'])

<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about__video set-bg" data-setbg="img/about-video.jpg">
                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1"
                    class="play-btn video-popup"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
        @include('user._include._about-section')
    </div>
</section>

@include('user._include._testimonial')

@include('user._include._chef')

@include('user._include._map')
    
@endsection