@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'Cart'])

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Recipe</th>
                                <th></th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Cart items will be populated here by JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{ route('recipes') }}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span class="sub_total_price">€0.00</span></li>
                        <li>Total <span class="total_price">€0.00</span></li>
                    </ul>
                    <a href="{{ route('checkout') }}" class="primary-btn" style="display: none;">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection