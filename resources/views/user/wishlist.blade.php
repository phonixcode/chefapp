@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'Wishlist'])

<section class="wishlist spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wishlist__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Reciepe</th>
                                <th>Unit Price</th>
                                <th>Stock</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="img/shop/1.jpg" alt="" width="100">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <small>Cheese Burger With a Touch of Curry and Cumin</small>
                                    </div>
                                </td>
                                <td class="cart__price">€ 15.00</td>
                                <td class="cart__stock">In stock</td>
                                <td class="cart__btn"><a href="#" class="primary-btn">Add to cart</a></td>
                                <td class="cart__close"><span class="icon_close"></span></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection