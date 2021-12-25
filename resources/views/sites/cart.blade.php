@extends('layouts.app')
@section('content')
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Cart ({{count($carts)}} Items)</h1>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Remove</th>
                                    <th class="product-price">Image</th>
                                    <th class="product-name">Item</th>
                                    <th class="product-size">Size</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $key => $cart)
                                <tr id="cart_row_{{$key}}" class="cart_row">
                                    <form action="{{ route('cart.update') }}" method="post" class="cart-form">
                                        @csrf
                                        <input type="hidden" value="{{$key}}" name="id"/>
                                        <input type="hidden" value="{{$cart['quantity']}}" name="quantity" class="cart-qty">
                                        <input type="hidden" value="{{$cart['size']}}" name="size" class="cart-size">
                                    </form>
                                    <td class="product-remove">
                                        <i class="bi bi-x-lg cursor-pointer"></i>
                                    </td>
                                    <td class="product-thumbnail">
                                        <img src="/uploads/products/{{$cart['image']}}" alt="product image">
                                    </td>
                                    <td class="product-name">
                                        {{ $cart['name'] }}
                                        <span class="amount">($</span>
                                        <span class="amount unit-price">{{ $cart['unit_price'] }}</span>
                                        <span class="amount">)</span>
                                    </td>
                                    <td class="product-size">
                                        <select class="select size" required>
                                            @foreach(\App\Models\Product::$sizes as $key => $size)
                                                <option value="{{ $key }}"
                                                    {{ $cart['size'] == $key ? 'selected' : '' }}>{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">$</span>
                                        <span class="amount unit-price">{{ $cart['unit_price'] }}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <input value="{{ $cart['quantity'] }}" type="number" class="quantity" min="0">
                                    </td>
                                    <td class="product-subtotal">
                                        <span>$</span>
                                        <span class="subtotal"></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 col-md-8 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <p>Delivery fee not included yet</p>
                                <ul>
                                    <li>
                                        Subtotal ($)<span>100.00</span>
                                    </li>
                                    <li>Total ($) <span class="total-amount"></span></li>
                                </ul>
                                <a href="{{ route('checkout') }}" class="mt-4 btn btn--primary btn-block">
                                    Proceed to checkout
                                </a>
                                <a href="/" class="mt-4 btn btn--white btn-block">Continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/cart.js"></script>
@endsection
