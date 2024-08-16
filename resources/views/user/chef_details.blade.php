@extends('layouts.main')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>
                            {{ $chef->name }} 
                            @if($chef->chefVerification && $chef->chefVerification->status == 'completed')
                                    <img src="{{ asset('img/verify.png') }}" alt="" width="30">
                            @endif
                        </h2>
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
                            <img class="big_img"
                                src="{{ $chef->photo != null ? $chef->photo_url : asset('img/chef-profile.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <div class="product__label mb-3">Chef</div>
                        <span>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $averageRating)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @elseif ($i > $averageRating && $i < $averageRating + 1 && fmod($averageRating, 1) >= 0.5)
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @endif
                            @endfor
                        </span>

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
                            <a class="nav-link" data-toggle="tab" href="#tabs-3"
                                role="tab">Reviews({{ count($allReviews) }})</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex mt-5">
                                <div class="related__products__slider owl-carousel">
                                    @foreach ($chef->recipes as $item)
                                        <div class="col-lg-3">
                                            <div class="product__item" data-id="{{ $item->id }}">
                                                <div class="product__item__pic set-bg"
                                                    data-setbg="{{ $item->image_urls[0] }}">
                                                    <div class="product__label">
                                                        <span>{{ $item->category->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><a
                                                            href="{{ route('recipes.details', $item->slug) }}">{{ $item->title }}</a>
                                                    </h6>
                                                    <div class="product__item__price" data-price="{{ $item->price }}">€{{ $item->price }}</div>
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
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8 mb-5">
                                    <p>
                                        Interested in booking a one-on-one session with the chef? Click on the link below to schedule your meeting and explore personalized culinary guidance and insights tailored just for you.
                                    </p>
                                    <p>
                                        <a href="{{ $chef->bookings->calendar_link ?? '' }}" target="_blank" class="btn btn-dark">Book a Meeting</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row d-flex ">
                                <div class="col-lg-8">
                                    <div class="blog__details__comment mt-5">
                                        <h5>{{ count($allReviews) }} Comment</h5>
                                        @foreach ($allReviews as $review)
                                            <div class="blog__details__comment__item">
                                                <div class="blog__details__comment__item__pic">
                                                    {{-- <img src="{{ asset('img/blog/details/comment-1.jpg') }}" alt=""> --}}
                                                    <img src="{{ $review->user->photo != null ? $review->user->photo_url : asset('img/chef-profile.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="blog__details__comment__item__text mb-5">
                                                    <h6>{{ $review->user->name }}</h6>
                                                    <span>{{ $review->created_at->format('M d, Y') }}</span>
                                                    <span>
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <i class="fa fa-star{{ $i < $review->rating ? '' : '-o' }}"
                                                                aria-hidden="true"></i>
                                                        @endfor
                                                    </span>
                                                    <span>{{ $review->review }}</span>
                                                </div>
                                            </div>
                                        @endforeach
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
