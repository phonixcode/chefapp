@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'Recipes'])

<section class="shop spad">
    <div class="container">
        <div class="shop__option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="shop__option__search">
                        <form action="#">
                            <select>
                                <option value="">Categories</option>
                                <option value="">Breakfast</option>
                                <option value="">Lunch</option>
                                <option value="">Dinner</option>
                                <option value="">Appetizer</option>
                                <option value="">Salad</option>
                                <option value="">Main-course</option>
                                <option value="">Side-dish</option>
                                <option value="">Baked-goods</option>
                                <option value="">Dessert</option>
                                <option value="">Snack</option>
                                <option value="">Soup</option>
                                <option value="">Vegetarian</option>
                            </select>
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="shop__option__right">
                        <select>
                            <option value="">Default sorting</option>
                            <option value="">A to Z</option>
                            <option value="">1 - 8</option>
                            <option value="">Name</option>
                        </select>
                        {{-- <a href="#"><i class="fa fa-list"></i></a>
                        <a href="#"><i class="fa fa-reorder"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/shop/1.jpg') }}">
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
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/shop/2.jpg') }}">
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
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/shop/3.jpg') }}">
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
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/shop/4.jpg') }}">
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
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/shop/5.jpg') }}">
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
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/shop/6.jpg') }}">
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
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/shop/7.jpg') }}">
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
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/shop/8.jpg') }}">
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
        <div class="shop__last__option">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><span class="arrow_carrot-right"></span></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__last__text">
                        <p>Showing 1-9 of 10 results</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection