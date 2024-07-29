@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'About'])

<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about__video set-bg">
                    <img src="{{ asset('img/about.png') }}" alt="">
                </div>
            </div>
        </div>
        @include('user._include._about-section')
    </div>
</section>

@include('user._include._testimonial')

@include('user._include._chef', ['chefs', $chefs])

@include('user._include._map')
    
@endsection