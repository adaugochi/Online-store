@extends('layouts.portal')
@section('title', 'My Cart')
@section('header-breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="active">Cart</li>
@endsection()
@section('content')
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Cart (3 Items)</h1>
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">remove</th>
                                        <th class="product-price">image</th>
                                        <th class="product-name">Item</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < 3; $i++)
                                    <tr id="cart_row_{{$i}}">
                                        <td class="product-remove">
                                            <i class="bi bi-x-lg cursor-pointer"></i>
                                        </td>
                                        <td class="product-thumbnail">
                                            <img src="/img/site/collection.jpg" alt="">
                                        </td>
                                        <td class="product-name">V-neck Blouse</td>
                                        <td class="product-price">
                                            <span class="amount">$</span>
                                            <span class="amount unit-price">{{ 160.08 + $i }}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <input value="{{ 1 + $i }}" type="number" class="quantity" min="0">
                                        </td>
                                        <td class="product-subtotal">
                                            <span>$</span>
                                            <span class="subtotal"></span>
                                        </td>
                                    </tr>
                                @endfor
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/cart.js"></script>
@endsection
