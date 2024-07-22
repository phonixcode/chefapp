@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'Checkout'])

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="#">
                <div class="row justify-content-center">
                    
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__order">
                            <h6 class="order__title">Your order</h6>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <li><samp>01.</samp> Vanilla salted caramel <span>$ 300.0</span></li>
                                <li><samp>02.</samp> German chocolate <span>$ 170.0</span></li>
                                <li><samp>03.</samp> Sweet autumn <span>$ 170.0</span></li>
                                <li><samp>04.</samp> Cluten free mini dozen <span>$ 110.0</span></li>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>$750.99</span></li>
                                <li>Total <span>$750.99</span></li>
                            </ul>

                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                            
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
    
@endsection