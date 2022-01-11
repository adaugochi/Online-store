@extends('layouts.app')

@section('content')
    @include('partials.header-banner')

    <div class="product-area pt-95 pb-100">
        <div class="container">
            <div class="product-style">
                <div class="product-tab-list text-center mb-5 nav product-menu-mrg" role=tablist>
                    <a class="active btn btn-bottom-line" href="#latest" data-toggle="tab" role="tab"
                       aria-selected="true" aria-controls="latest">
                        Latest Design
                    </a>
                    <a class="btn btn-bottom-line" href="#trending" data-toggle="tab" role="tab"
                       aria-selected="false" aria-controls="trending">
                        Trending Design
                    </a>
                </div>
                <div class="tab-content jump">
                    <div class="tab-pane active show fade" id="latest" role="tabpanel">
                        <div class="row">
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <div class="col-lg-3 col-md-4 mb-4">
                                        <div class="single-preview-item__wrap text-center">
                                            <div class="frame-screen">
                                                <div class="single-preview-item__thumbnail">
                                                    <img class="img-fluid" src="/uploads/products/{{$product->image}}" alt="">
                                                    @if($product->discount)
                                                        <span class="price-tag">
                                                            {{$product->discount}}% Off
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="single-preview-item__info">
                                                    <div>
                                                    <span class="heading font-weight-bold">
                                                        {{ $product->name }}
                                                    </span>
                                                        <div class="btn-text text-left cursor-pointer"
                                                            onclick="viewProduct({{$product}})">
                                                            view <i class="ml-1 button-icon bi bi-arrow-right"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span>
                                                            ${{ $product->discount ? $product->price_discount : $product->price}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    No Product available
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="trending" role="tabpanel">
                        <div class="row">
                            @for($i = 0; $i < 4; $i++)
                                <div class="col-lg-3 col-md-4 mb-4">
                                    <div class="single-preview-item__wrap text-center">
                                        <div class="frame-screen">
                                            <div class="single-preview-item__thumbnail">
                                                <img class="img-fluid" src="/img/site/collection2.jpg" alt="">
                                                <span class="price-tag">20% Off</span>
                                            </div>
                                            <div class="single-preview-item__info">
                                                <div>
                                                    <span class="heading font-weight-bold">V-neck blouse</span>
                                                    <div class="btn-text text-left cursor-pointer" data-toggle="modal"
                                                         data-target="#exampleModal{{$i}}">
                                                        view <i class="ml-1 button-icon bi bi-arrow-right"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span>$100</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.modals.view-product-modal')
    @include('partials.view-collections')
    @include('partials.how-it-works')

@endsection
@section('script')
    <script>
        (function ($) {

            $('#addCart').click(function () {
                let productId = $('#productId').val(),
                    productSize = $("select[name='product_size']").val(),
                    productQty = $("input[name='quantity']").val();

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
            });

            $('#saveItem').click(function () {
                let productId = $('#productId').val(),
                    productSize = $("select[name='product_size']").val(),
                    productQty = $("input[name='quantity']").val();

                $.ajax({
                    url: '/customer/product/save',
                    type: 'post',
                    data: {
                        product_id: productId,
                        size: productSize,
                        quantity: productQty
                    },
                    success: function (data) {
                        toastr.success(data['message']);
                    },
                    error: function(xhr) {
                        const status = xhr.status
                        let err = JSON.parse(xhr.responseText);
                        if(status === 422) {
                            console.log(err.errors)
                        }
                        if(status === 401) {
                            window.location.href = "{{ route('login') }}";
                        }
                    }
                });
            });
        })(jQuery)

        let arrSizes = [];
        arrSizes = jQuery.parseJSON('{!! json_encode(\App\Models\Product::$sizes) !!}');

        function viewProduct(product) {
            $('#productSize')
                .empty()
                .append('<option value="">Please Select size</option>');

            let oldField = $('#productPrice .old'),
                newField = $('#productPrice .new'),
                discount = product.discount,
                unitPrice = product.unit_price,
                sizes = product.size;

            $('#viewProductModal').modal('show');
            $('#productId').val(product.id);
            $('#productName').text(product.name)
            $('#productDescription').text(product.description)
            $('#productImg').attr('src', `/uploads/products/${product.image}`)
            if(discount > 0) {
                let totalPrice = discount/100 * unitPrice;
                oldField.removeClass('d-none')
                oldField.text(`$${unitPrice}`)
                newField.text(`$${totalPrice}`)
            } else {
                newField.text(`$${unitPrice}`)
                oldField.addClass('d-none')
            }

            $.each(sizes, function (i, item) {
                $('#productSize').append($('<option>', {
                    value: item,
                    text : arrSizes[item]
                }));
            })}
    </script>
@endsection
