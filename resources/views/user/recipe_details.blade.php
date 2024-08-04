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
                            <img class="big_img" src="{{ $recipe->image_urls[0] }}"
                                alt="">
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
                        <h5>€{{ $recipe->price }}</h5>
                        <ul>
                            <li>SKU: <span>{{ $recipe->sku }}</span></li>
                            <li>Category: <span>{{ $recipe->category->name }}</span></li>
                        </ul>
                        <div class="product__details__option">
                            <a href="{{ route('cart') }}" class="primary-btn">Add to cart</a>
                            @auth
                            <a href="javascript:void(0);" class="heart__btn" data-id="{{ $recipe->id }}"><span class="icon_heart_alt"></span></a>
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
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Previews(1)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>
                                        {!! $recipe->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>
                                        {!! $recipe->additional_description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                        arrives with a greeting card of your choice that you can personalize online!3
                                    </p>
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
    </section>
    <!-- Related Products Section End -->
@endsection
