@extends('layouts.main')

@section('content')

    @include('partials.breadcrumb', ['title' => 'Wishlist'])

    <section class="wishlist spad">
        <div class="container">
            <div class="row">
                @if ($wishlistItems->isEmpty())
                    <div class="col-lg-12">
                        <p>You have no wishlist.</p>
                    </div>
                @else
                    <div class="col-lg-12">
                        <div class="wishlist__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Reciepe</th>
                                        <th>Price</th>
                                        {{-- <th></th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlistItems as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td class="product__cart__item">
                                                <a href="{{ route('recipes.details', $item->recipe->slug) }}">
                                                    <div class="product__cart__item__pic">
                                                        <img src="{{ asset('img/shop/' . $item->recipe->images[0]->image_path) }}" alt="" width="100">
                                                    </div>
                                                    <div class="product__cart__item__text">
                                                        <h6>{{ $item->recipe->title }}</h6>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="cart__price wishlist_price">€{{ number_format($item->recipe->price, 2) }}</td>
                                            {{-- <td class="cart__btn"><a href="javascript:void(0);" class="primary-btn wishlist_cart">Add to cart</a></td> --}}
                                            <td class="cart__close"><a href="javascript:void(0);"><span class="icon_close"></span></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
