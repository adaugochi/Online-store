@extends('layouts.portal')
@section('link')
    <link rel="stylesheet" href="/plugins/css/intlTelInput.css">
@endsection
@section('title', 'My Checkout')
@section('header-breadcrumb')
    <li><a href="{{ route('customer.home') }}">Dashboard</a></li>
    <li class="active">Checkout</li>
@endsection()
@section('content')
    <section class="bg-white py-5">
        <div class="container">
            <form action="#" method="post" id="billingForm">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <p>(Fill in the correct details)</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Country <span class="required">*</span></label>
                                        <div class="form-input">
                                            <select class="select" name="country" id="country"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>First Name <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" name="first_name" value="{{ $user->first_name }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" name="last_name" value="{{ $user->last_name }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Email Address <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" name="email" value="{{ $user->email }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" name="phone_number" class="phone-number" value="{{ $user->phone_number }}"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Street Address <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" name="address"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Town / City <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" name="city"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>State <span class="required">*</span></label>
                                    <div class="form-input">
                                        <select class="select" name="state" id="state"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Postcode / Zip Code</label>
                                    <div class="form-input">
                                        <input type="text" name="postal_code"/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input">
                                        <label>Order Notes</label>
                                        <textarea placeholder="Notes about your order, e.g. special notes for delivery."
                                                  name="message" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carts as $cart)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $cart['name'] }}
                                                <strong class="cart-quantity"> × {{ $cart['quantity'] }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <input value="{{$cart['quantity'] * $cart['unit_price']}}" type="hidden" class="product-amount">
                                                $<span class="amount">
                                                {{ number_format($cart['quantity'] * $cart['unit_price'], 2) }}
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td>$<span class="cart-sub-amount"></span></td>
                                        <input type="hidden" class="cart-subtotal-input"/>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Delivery Fee</th>
                                        <td>$<span class="cart-delivery-fee">25.00</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="cart-total-amount">240.00</span></strong></td>
                                        <input type="hidden" class="cart-total-input" name="total_amount"/>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="mt-5">
                                <h3>Payment Method</h3>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="panel-group" id="paymentMethod">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="bankTransfer" name="payment_method"
                                                           class="custom-control-input" value="bank-transfer">
                                                    <label class="panel-title custom-control-label" for="bankTransfer">
                                                        <a data-toggle="collapse" aria-expanded="true" class="text-gray"
                                                           data-parent="#paymentMethod" href="#payment-1">
                                                            Direct Bank Transfer.
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="payment-1" class="panel-collapse collapse show">
                                                <div class="panel-body">
                                                    <p>
                                                        Make your payment directly into our bank account. Please use your
                                                        Order ID as the payment reference. Your order won’t be shipped
                                                        until the funds have cleared in our account.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="onlinePayment" name="payment_method"
                                                           class="custom-control-input" value="online">
                                                    <label class="panel-title custom-control-label" for="onlinePayment">
                                                        <a data-toggle="collapse" aria-expanded="true" class="text-gray"
                                                           data-parent="#paymentMethod" href="#payment-2">
                                                            Online Payment.
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="payment-2" class="panel-collapse collapse show">
                                                <div class="panel-body">
                                                    <p>
                                                        For easy, smooth and secure payment, make payment online using via
                                                        Stripe. Your transaction is secure
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn--black btn-block">Confirm Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script src="/js/countries.js"></script>
    <script>
        populateCountries("country", "state");
    </script>
    <script src="{{ asset('plugins/js/intlTelInput-jquery.min.js') }}"></script>
    <script src="{{ asset('js/intltel.js') }}"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
@endsection
