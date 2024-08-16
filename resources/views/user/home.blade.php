@extends('layouts.main')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="img/hero/2.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Welcome to Recipe Community</h2>
                                <a href="{{ route('recipes') }}" class="primary-btn">Recipe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/2.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Delicious Recipes Awaiting</h2>
                                <a href="{{ route('recipes') }}" class="primary-btn">Recipe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            @include('user._include._about-section')
        </div>
    </section>
    <!-- About Section End -->

    <!-- Categories Section Begin -->
    @if ($categories)
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($categories as $item)
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>{{ $item->name }} recipes</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    @if ($recipes)
    <section class="product spad">
        <div class="container">
            <div class="row">
                @foreach ($recipes as $item)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item" data-id="{{ $item->id }}">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{ $item->image_urls[0] }}">
                            <div class="product__label">
                                <span>{{ $item->category->name }}</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <span><a class="text-info" href="{{ route('chefs.details', $item->user->id) }}">
                                {{ $item->user->name }}
                                @if($item->user->chefVerification && $item->user->chefVerification->status == 'completed')
                                    <img src="{{ asset('img/verify.png') }}" alt="" width="20">
                                @endif
                            </a></span>
                            <h6><a href="{{ route('recipes.details', $item->slug) }}">{{ $item->title }}</a></h6>
                            <div class="product__item__price" data-price="{{ $item->price }}">€{{ $item->price }}</div>
                            <div class="cart_add">
                                <a href="javascript:void(0);">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    
    <!-- Product Section End -->

    @if ($chefs)
    @include('user._include._chef', ['chefs', $chefs])
    @endif

    <!-- Testimonial Section Begin -->
    @include('user._include._testimonial')
    <!-- Testimonial Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Follow us on instagram</span>
                            <h2>Sweet moments are saved as memories.</h2>
                        </div>
                        <h5><i class="fa fa-instagram"></i> @culinarycrafts</h5>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/shop/1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/shop/2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/shop/3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/shop/4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/shop/5.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/shop/6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Map Begin -->
    @include('user._include._map')
    <!-- Map End -->
@endsection
