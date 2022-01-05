@extends('layouts.portal')
@section('title', 'My Saved Items')
@section('header-breadcrumb')
    <li><a href="{{ route('customer.home') }}">Dashboard</a></li>
    <li class="active">Saved items</li>
@endsection()
@section('content')
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Saved Items (8)</h1>
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-name">Remove</th>
                                    <th class="product-price">Image</th>
                                    <th class="product-name">Item/Size</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-subtotal">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < 8; $i++)
                                    <tr id="saved_item_row_{{$i}}">
                                        <td class="product-remove">
                                            <i class="bi bi-x-lg cursor-pointer"></i>
                                        </td>
                                        <td class="product-thumbnail">
                                            <img src="/img/site/collection2.jpg" alt="collection">
                                        </td>
                                        <td class="product-name fs-20">V-neck Blouse (M)</td>
                                        <td class="product-price">
                                            <span class="amount">$</span>
                                            <span class="amount unit-price">{{ 160.08 + $i }}</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <a href="#" class="btn btn--primary px-3">
                                                Add to cart
                                            </a>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
