@extends('layouts.main')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Recipes'])

    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="shop__option__search">
                            <form action="{{ route('recipes.filter') }}" method="post">
                                @csrf
                                <select id="category" name="category" onchange="this.form.submit();">
                                    <option value="">Categories</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->slug }}"
                                            {{ !empty($_GET['category']) && $_GET['category'] == $item->slug ? ' selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="shop__option__right">
                            <form action="{{ route('recipes.filter') }}" method="post">
                                @csrf
                                <select id="sortBy" name="sortBy" onchange="this.form.submit();">
                                    <option value="">Default sorting</option>
                                    <option value="newest"
                                        {{ !empty($_GET['sortBy']) && $_GET['sortBy'] == 'newest' ? ' selected' : '' }}>
                                        Newest
                                    </option>
                                    <option value="titleAsc"
                                        {{ !empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleAsc' ? ' selected' : '' }}>
                                        A -Z
                                    </option>
                                    <option value="titleDesc"
                                        {{ !empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleDesc' ? ' selected' : '' }}>
                                        Z - A
                                    </option>
                                    <option value="priceAsc"
                                        {{ !empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceAsc' ? ' selected' : '' }}>
                                        Price - Lower To Higher
                                    </option>
                                    <option value="priceDesc"
                                        {{ !empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceDesc' ? ' selected' : '' }}>
                                        Price - Higher To Lower
                                    </option>
                                </select>
                            </form>
                            {{-- <a href="#"><i class="fa fa-list"></i></a>
                        <a href="#"><i class="fa fa-reorder"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($recipes as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item" data-id="{{ $item->id }}">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ $item->image_urls[0] }}">
                                <div class="product__label">
                                    <span>{{ $item->category->name }}</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('recipes.details', $item->slug) }}">{{ $item->title }}</a></h6>
                                <div class="product__item__price" data-price="{{ $item->price }}">€{{ $item->price }}</div>
                                <div class="cart_add">
                                    <a href="javascript:void(0);">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="product__item">
                            <div class="product__item__text">
                                <h6>No Recipe Found</h6>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
            <div class="shop__last__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__pagination">
                            {{ $recipes->links('vendor.pagination.custom-pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
