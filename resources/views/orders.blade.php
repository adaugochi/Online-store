@extends('layouts.portal')
@section('title', 'My Orders')
@section('header-breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="active">Orders</li>
@endsection()
@section('content')
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Orders (5 Items)</h1>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-name">S/N</th>
                                <th class="product-price">image</th>
                                <th class="product-name">Product</th>
                                <th class="product-quantity">Status</th>
                                <th class="product-subtotal">Created At</th>
                                <th class="product-price">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i < 3; $i++)
                                <tr id="cart_row_{{$i}}">
                                    <td class="product-remove">
                                        {{ $i + 1 }}
                                    </td>
                                    <td class="product-thumbnail">
                                        <img src="/img/site/collection.jpg" alt="">
                                    </td>
                                    <td class="product-name">
                                        <span>V-neck Blouse</span><br>
                                        <span class="amount">$</span>
                                        <span class="amount unit-price">{{ 160.08 + $i }}</span>
                                    </td>
                                    <td class="product-price">
                                        <label class="badge badge-success">Delivered</label>
                                    </td>
                                    <td class="product-quantity">
                                        Jan 23, 2021
                                    </td>
                                    <td class="product-subtotal">
                                        <div class="btn-text text-left cursor-pointer" data-toggle="modal"
                                             data-target="#orderModal{{$i}}">
                                            view details
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
