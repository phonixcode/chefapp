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
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Breakfast recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Lunch recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Dinner recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Appetizer recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Salad recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Main-course recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Side-dish recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Baked-goods recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Dessert recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Snack recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Soup recipes</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Vegetarian Dishes</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/shop/1.jpg">
                            <div class="product__label">
                                <span>Lunch Recipe</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('recipes.details') }}">Cheese Burger With a Touch of Curry and Cumin</a></h6>
                            <div class="product__item__price">€32.00</div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/shop/2.jpg">
                            <div class="product__label">
                                <span>Lunch Recipe</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('recipes.details') }}">Cheese Burger With a Touch of Curry and Cumin</a></h6>
                            <div class="product__item__price">€30.00</div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/shop/3.jpg">
                            <div class="product__label">
                                <span>Lunch Recipe</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('recipes.details') }}">Cheese Burger With a Touch of Curry and Cumin</a></h6>
                            <div class="product__item__price">€31.00</div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/shop/4.jpg">
                            <div class="product__label">
                                <span>Lunch Recipe</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('recipes.details') }}">Cheese Burger With a Touch of Curry and Cumin</a></h6>
                            <div class="product__item__price">€25.00</div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/shop/5.jpg">
                            <div class="product__label">
                                <span>Lunch Recipe</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('recipes.details') }}">Cheese Burger With a Touch of Curry and Cumin</a></h6>
                            <div class="product__item__price">€05.00</div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/shop/6.jpg">
                            <div class="product__label">
                                <span>Lunch Recipe</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('recipes.details') }}">Cheese Burger With a Touch of Curry and Cumin</a></h6>
                            <div class="product__item__price">€14.00</div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/shop/7.jpg">
                            <div class="product__label">
                                <span>Lunch Recipe</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('recipes.details') }}">Cheese Burger With a Touch of Curry and Cumin</a></h6>
                            <div class="product__item__price">€32.00</div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/shop/8.jpg">
                            <div class="product__label">
                                <span>Lunch Recipe</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('recipes.details') }}">Cheese Burger With a Touch of Curry and Cumin</a></h6>
                            <div class="product__item__price">€08.00</div>
                            <div class="cart_add">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Team Section Begin -->
    @include('user._include._chef')
    <!-- Team Section End -->

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
