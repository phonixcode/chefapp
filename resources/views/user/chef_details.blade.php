@extends('layouts.main')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>{{ $chef->name }}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('chefs') }}">Chef</a>
                        <span>Information</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <div class="product__details__big__img">
                            <img class="big_img" src="{{ $chef->photo != NULL ? $chef->photo_url : asset('img/chef-profile.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <div class="product__label mb-3">Chef</div>
                        <p>Name: {{ $chef->name }}</p>
                        <p>Email: {{ $chef->email }}</p>
                        <p>Restaurant Name: {{ ucwords($chef->restaurant_name) }}</p>
                        <p>Restaurant Address: {{ $chef->restaurant_address }}</p>
                        <p>Restaurant City: {{ $chef->restaurant_city }}</p>
                        <p>Restaurant State: {{ $chef->restaurant_state }}</p>
                        <p>Specialty: {{ $chef->specialty }}</p>
                        <p>Experience: {{ $chef->experience }}</p>
                    </div>
                </div>
            </div>
            <div class="product__details__tab">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Recipes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Book Session</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews(1)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex mt-5">
                                    <div class="related__products__slider owl-carousel">
                                        @foreach ($chef->recipes as $item)
                                            <div class="col-lg-3">
                                                <div class="product__item">
                                                    <div class="product__item__pic set-bg"
                                                        data-setbg="{{ $item->image_urls[0] }}">
                                                        <div class="product__label">
                                                            <span>{{ $item->category->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__item__text">
                                                        <h6><a href="{{ route('recipes.details', $item->slug) }}">{{ $item->title }}</a></h6>
                                                        <div class="product__item__price">€{{ $item->price }}</div>
                                                        <div class="cart_add">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                    
                                    </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row d-flexr">
                                <div class="col-lg-8">
                                    <p>
                                        {{-- {!! $recipe->additional_description !!} --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row d-flex ">
                                <div class="col-lg-8">
                                    <div class="blog__details__comment mt-5">

                                        <form action="">

                                        </form>

                                        <h5>03 Comment</h5>
                                        <div class="blog__details__comment__item">
                                            <div class="blog__details__comment__item__pic">
                                                <img src="{{ asset('img/blog/details/comment-1.jpg') }}" alt="">
                                            </div>
                                            <div class="blog__details__comment__item__text mb-5">
                                                <h6>Dylan Stewart</h6>
                                                <span>26 Feb 2020</span>
                                                <span>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore magna aliqua vel facilisis.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->
@endsection
