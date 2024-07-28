@extends('layouts.main')

@section('content')
    <section class="order-success spad">
        <div class="container">
            <div class="order__success__message">
                <h2>Order Completed Successfully!</h2>
                <p>Thank you for your purchase. Your order is now completed.</p>
                {{-- @if(session('pdfPath'))
                    <a href="{{ route('order.download', ['path' => session('pdfPath')]) }}" class="btn btn-primary">Download Recipe</a>
                @endif --}}
            </div>
        </div>
    </section>
@endsection
