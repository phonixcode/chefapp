@extends('layouts.main')

@section('content')
    @include('partials.breadcrumb', ['title' => 'Orders'])

    <section class="spad">
        <div class="container">
            <div class="row">
                @if($orders->isEmpty())
                <div class="col-lg-12">
                    <p>You have no orders.</p>
                </div>
                @else
                <div class="col-lg-12">
                    <div class="checkout__order">
                        <h6 class="order__title">List of Recipe's Purchase</h6>

                        <div class="wishlist__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Total Price</th>
                                        <th>Payment Status</th>
                                        <th>Items</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>
                                                <ul>
                                                    @foreach($order->items as $item)
                                                        <li>
                                                            {{ $item->recipe->title }} (Price: {{ $item->price }})
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

@endsection
