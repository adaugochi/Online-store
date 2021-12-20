@extends('layouts.app')

@section('content')
    @include('partials.header-banner')

    <div class="product-area pt-95 pb-100">
        <div class="container">
            <div class="product-style">
                <div class="product-tab-list text-center mb-5 nav product-menu-mrg" role=tablist>
                    <a class="active btn btn-bottom-line" href="#latest" data-toggle="tab" role="tab" aria-selected="true" aria-controls="latest">
                        Latest Design
                    </a>
                    <a class="btn btn-bottom-line" href="#trending" data-toggle="tab" role="tab" aria-selected="false" aria-controls="trending">
                        Trending Design
                    </a>
                </div>
                <div class="tab-content jump">
                    <div class="tab-pane active show fade" id="latest" role="tabpanel">
                        <div class="row">
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
                                                    @if($product->discount)
                                                        <span>
                                                            ${{ number_format($product->unit_price * ($product->discount/100)) }}
                                                        </span>
                                                    @else
                                                        <span>${{ number_format($product->unit_price) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="trending" role="tabpanel">
                        <div class="row">
                            @for($i = 0; $i < 8; $i++)
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

        })(jQuery)

        function viewProduct(product) {
            let oldField = $('#productPrice .old'),
                newField = $('#productPrice .new'),
                discount = product.discount,
                unitPrice = product.unit_price;

            $('#viewProductModal').modal('show');
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
        }
    </script>
@endsection
