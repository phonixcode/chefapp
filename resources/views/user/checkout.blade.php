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
                            <ul class="checkout__total__products" id="checkout-products">
                                <!-- Cart items will be populated here by JavaScript -->
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span id="subtotal-amount">$0.00</span></li>
                                <li>Total <span id="total-amount">$0.00</span></li>
                            </ul>

                            <p>
                                the recipe will be sent to your email address
                            </p>
                            
                            <button type="submit" class="site-btn" id="order-item">
                                PLACE ORDER
                                <span class="button-spinner" id="button-spinner"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
    
@endsection

@push('css')
    <style>
        /* Spinner inside button */
        .button-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 10px;
            vertical-align: middle;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Disable button during loading */
        .disable-button {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
@endpush
