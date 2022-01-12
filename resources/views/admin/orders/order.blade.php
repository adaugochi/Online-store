@extends('layouts.admin')
@section('content-title', "Orders")

@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner table-responsive">
                <table id="list-order" class="table table-hover">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="product-thumbnail">
                                <img src="/uploads/products/{{ $order->product->image }}" alt="products" height="200">
                            </td>
                            <td class="product-name">
                                <span>{{ $order->product->name }}</span><br>
                                <span class="amount">$</span>
                                <span class="amount unit-price">{{ number_format($order->unit_price, 2) }}</span>
                            </td>
                            <td class="product-quantity">{{ $order->quantity }}</td>
                            <td class="product-size">{{ \App\Models\Product::$sizes[$order->size] }}</td>
                            <td class="product-created-at">{{ $order->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        (function ($) {
            $(document).ready(function() {
                $('#list-order').DataTable();
            } );
        })(jQuery)
    </script>
@endsection
