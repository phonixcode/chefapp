@extends('layouts.main')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Recipe detail</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('recipes') }}">Recipes</a>
                        <span>{{ $recipe->title }}</span>
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
                            <img class="big_img" src="{{ $recipe->image_urls[0] }}" alt="">
                        </div>
                        <div class="product__details__thumb">
                            @foreach ($recipe->image_urls as $key => $image)
                                <div class="pt__item{{ $key === 0 ? ' active' : '' }}">
                                    <img data-imgbigurl="{{ $image }}" src="{{ $image }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <div class="product__label">{{ $recipe->category->name }}</div>
                        <h4>{{ $recipe->title }}</h4>
                        <h6 class="d-none"><a href="#">{{ $recipe->title }}</a></h6>
                        <h5 class="product__item__price" data-price="{{ $recipe->price }}">€{{ $recipe->price }}</h5>
                        <ul>
                            <li>
                                Chef: 
                                <span>
                                    <a href="{{ route('chefs.details', $recipe->user->id) }}">
                                        {{ $recipe->user->name }}
                                        @if($recipe->user->chefVerification && $recipe->user->chefVerification->status == 'completed')
                                            <img src="{{ asset('img/verify.png') }}" alt="" width="20">
                                        @endif
                                    </a>
                                </span>
                            </li>
                            <li>Category: <span>{{ $recipe->category->name }}</span></li>
                        </ul>
                        <div class="product__details__option cart_add">
                            <a href="javascript:void(0);" class="primary-btn">Add to cart</a>
                            @auth
                                <a href="javascript:void(0);" class="heart__btn" data-id="{{ $recipe->id }}"><span
                                        class="icon_heart_alt"></span></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__details__tab">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" id="review-tab">Reviews({{ count($recipe->reviews) }})</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex">
                                <div class="col-lg-8">
                                    <p>
                                        {!! $recipe->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row d-flexr">
                                <div class="col-lg-8">
                                    <p>
                                        {!! $recipe->additional_description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row d-flex ">
                                <div class="col-lg-8">
                                    <div class="blog__details__comment mt-5">
                                        @auth
                                            @if(auth()->user()->id !== $recipe->user_id)

                                                <h4>Submit Review</h4>
                                                <form action="{{ route('reviews.store') }}" method="POST" id="review-form">
                                                    @csrf
                                                    <div class="form-group mt-2">
                                                        <span>Your Rating</span>
                                                        <div class="stars">
                                                            <input type="radio" name="rate" class="star-1" id="star-1"
                                                                value="1">
                                                            <label class="star-1" for="star-1">1</label>
                                                            <input type="radio" name="rate" class="star-2" id="star-2"
                                                                value="2">
                                                            <label class="star-2" for="star-2">2</label>
                                                            <input type="radio" name="rate" class="star-3" id="star-3"
                                                                value="3">
                                                            <label class="star-3" for="star-3">3</label>
                                                            <input type="radio" name="rate" class="star-4" id="star-4"
                                                                value="4">
                                                            <label class="star-4" for="star-4">4</label>
                                                            <input type="radio" name="rate" class="star-5" id="star-5"
                                                                value="5">
                                                            <label class="star-5" for="star-5">5</label>
                                                        </div>
                                                        @error('rate')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror

                                                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">

                                                        <div class="form-group">
                                                            <label for="comments">Leave a Comment</label>
                                                            <textarea class="form-control" id="comments" rows="5" name="review" data-max-length="150" required></textarea>
                                                        </div>

                                                        <button type="submit" class="site-btn">Submit Review</button>
                                                    </div>
                                                </form>
                                            @endif
                                        @endauth
                                        
                                        @include('partials.reviews')
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

    <!-- Related Products Section Begin -->
    <section class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Related Recipe</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related__products__slider owl-carousel">
                    @foreach ($relatedRecipes as $item)
                        <div class="col-lg-3">
                            <div class="product__item" data-id="{{ $item->id }}">
                                <div class="product__item__pic set-bg" data-setbg="{{ $item->image_urls[0] }}">
                                    <div class="product__label">
                                        <span>{{ $item->category->name }}</span>
                                    </div>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{ route('recipes.details', $item->slug) }}">{{ $item->title }}</a>
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
    </section>
    <!-- Related Products Section End -->
@endsection
@push('css')
    <style>
        a:hover {
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
        }
        .primary-btn:hover{
            color: #ffffff;
            background: #c80614d4;
        }
    </style>
@endpush
@push('js')
    <script>
        $(document).on('submit', '#review-form', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('reviews.store') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        // Reload the comments list
                        loadComments();
                        updateReviewTabCount();
                        $('#review-form')[0].reset(); // Reset the form
                        $('.stars input').prop('checked', false); // Uncheck all stars
                    }
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(key, value) {
                            $('#' + key).after('<span class="text-danger">' + value[0] +
                                '</span>');
                        });
                    } else {
                        alert('Error submitting review');
                    }
                }
            });
        });

        function loadComments() {
            $.get('{{ route('reviews.list', $recipe->id) }}', function(data) {
                $('.blog__details__comment').html(data);
            });
        }

        function updateReviewTabCount() {
            $.get('{{ route("reviews.count", $recipe->id) }}', function(count) {
                $('#review-tab').text('Reviews(' + count + ')');
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const addToCartButton = document.querySelector('.cart_add .primary-btn');
    const cartCountElement = document.querySelector('.header__top__right__cart a span');
    const cartPriceElement = document.querySelector('.cart_price');

    function updateCartInfo() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartCount = cart.length;
        const cartTotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0).toFixed(2);

        cartCountElement.textContent = cartCount;
        cartPriceElement.textContent = `€${cartTotal}`;
    }

    addToCartButton.addEventListener('click', (event) => {
        event.preventDefault();

        const recipeId = "{{ $recipe->id }}";
        const recipeTitle = "{{ $recipe->title }}";
        const recipePrice = parseFloat("{{ $recipe->price }}");
        const recipeImage = "{{ $recipe->image_urls[0] }}"; // Assuming the first image is the main image

        const cartItem = {
            id: recipeId,
            title: recipeTitle,
            price: recipePrice,
            image: recipeImage,
            quantity: 1
        };

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existingItemIndex = cart.findIndex(item => item.id === recipeId);

        if (existingItemIndex > -1) {
            alert('Item already exists in the cart');
        } else {
            cart.push(cartItem);
            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Item added to cart');
            updateCartInfo();
        }
    });

    // Initialize cart info on page load
    updateCartInfo();
});

    </script>
@endpush
