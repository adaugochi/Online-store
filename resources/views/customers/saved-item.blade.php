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
                    <h1 class="cart-heading">Saved Items ({{ $savedItems ? count($savedItems) : 0 }})</h1>
                    @if(count($savedItems) > 0)
                        <div class="table-content table-responsive-lg">
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
                                @foreach($savedItems as $key => $savedItem)
                                    <tr id="saved_item_row_{{$key}}">
                                        <td class="product-remove">
                                            <i class="bi bi-x-lg cursor-pointer" onclick="removeItem({{$savedItem->id}})"></i>
                                        </td>
                                        <td class="product-thumbnail">
                                            <img src="/uploads/products/{{ $savedItem->product->image }}" alt="collection">
                                        </td>
                                        <td class="product-name fs-20">
                                            {{ $savedItem->product->name }}
                                            ({{ \App\Models\Product::$sizes[$savedItem->size] }})
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">$</span>
                                            <span class="amount unit-price">
                                                {{ number_format($savedItem->product->unit_price, 2) }}
                                            </span>
                                        </td>
                                        <td class="product-subtotal">
                                            <button class="btn btn--primary px-3"
                                                    {{ $savedItem->product->quantity <= 0 ? 'disabled' : '' }}
                                                    onclick="addToCart({{$savedItem}})">
                                                {{ $savedItem->product->quantity <= 0 ? 'sold out' : 'Add to cart' }}
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div>You have no saved item(s)</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        (function ($) {

        })(jQuery)

        function addToCart(obj) {
            console.log(obj)
            let productId = obj.product_id,
                productSize = obj.size,
                productQty = obj.quantity;

            $.ajax({
                url: '/cart/add',
                type: 'get',
                data: {
                    product_id: productId,
                    size: productSize,
                    quantity: productQty
                },
                success: function (data) {
                    toastr.success(data['message']);
                    $('#cart').html(data['total']);
                },
                error: function(xhr) {
                    const status = xhr.status
                    let err = JSON.parse(xhr.responseText);
                    if(status === 422) {
                        toastr.error(err.errors.size);
                    }
                }
            });
        }

        function removeItem(id) {
            $.ajax({
                url: '/customer/product/remove',
                type: 'post',
                data: {
                    id: id
                },
                success: function () {
                    window.location.reload();
                },
                error: function(xhr) {
                    const status = xhr.status
                    let err = JSON.parse(xhr.responseText);
                    if(status === 422) {
                        toastr.error(err.errors.size);
                    }
                }
            });
        }
    </script>
@endsection
