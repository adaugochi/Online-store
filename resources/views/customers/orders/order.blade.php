@extends('layouts.portal')
@section('title', 'My Orders')
@section('header-breadcrumb')
    <li><a href="{{ route('customer.home') }}">Dashboard</a></li>
    <li><a href="{{ route('customer.orders') }}">Order</a></li>
    <li class="active">Product Orders</li>
@endsection()
@section('content')
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Orders ({{ count($orders) }} Items)</h1>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-name">S/N</th>
                                <th class="product-price">image</th>
                                <th class="product-name">Product</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-size">Size</th>
                                <th class="product-created-at">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr id="order_row_{{$key}}">
                                    <td class="product-remove">
                                        {{ $key+1 }}
                                    </td>
                                    <td class="product-thumbnail">
                                        <img src="/uploads/products/{{ $order->product->image }}" alt="products">
                                    </td>
                                    <td class="product-name">
                                        <span>{{ $order->product->name }}</span><br>
                                        <span class="amount">$</span>
                                        <span class="amount unit-price">{{ number_format($order->unit_price, 2) }}</span>
                                    </td>
                                    <td class="product-quantity">
                                        {{ $order->quantity }}
                                    </td>
                                    <td class="product-size">
                                        {{ \App\Models\Product::$sizes[$order->size] }}
                                    </td>
                                    <td class="product-created-at">
                                        {{ $order->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
