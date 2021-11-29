@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="/plugins/css/intlTelInput.css">
@endsection
@section('content')
    <!-- contact-area start -->
    <div class="bg-white contact-area ptb-100" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="contact-info">
                        <h2 class="header-text">Contact Info</h2>
                        <div class="row">
                            <div class="col-12">
                                <div class="single-contact-info mb-40">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="contact-info-content align-self-center">
                                        <p>
                                            77, avenue, Brat road USA.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-contact-info mb-40">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div class="contact-info-content align-self-center">
                                        <p>+012 345 678 102</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-contact-info mb-40">
                                    <div class="contact-info-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="contact-info-content align-self-center">
                                        <p>
                                            <a href="mailto:info@example.com" class="text-primary">info@example.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="contact-form-wrap">
                        <h2 class="header-text">Bespoke / Bulk Purchase Contact Page.</h2>
                        <div class="contact-from-wrapper section-space--mt_30">
                            <form action="#" method="post" id="contactForm">
                                @csrf
                                <div class="contact-page-form">
                                    <div class="row">
                                        <x-input name="name"
                                                 placeholder="Your Name *"
                                                 value="{{ old('name') }}"
                                                 column="col-md-6"></x-input>
                                        <x-input name="email"
                                                 type="email"
                                                 placeholder="Your Email *"
                                                 value="{{old('email')}}"
                                                 column="col-md-6 pl-2"></x-input>
                                        <x-input name="phone_number"
                                                 placeholder="Your Phone number *"
                                                 value="{{ old('phone_number') }}"
                                                 class="phone-number"
                                                 fieldName="international_number"></x-input>
                                        <div class="col-12">
                                            <div class="form-input">
                                                <select name="quantity">
                                                    <option value="">Select quantity *</option>
                                                    <option value="single">Single</option>
                                                    <option value="bulk">Bulk</option>
                                                </select>
                                            </div>
                                        </div>
                                        <x-input name="item_name"
                                                 placeholder="Specific item you are interested in *"
                                                 value="{{ old('item_name') }}"></x-input>
                                    </div>

                                    <div class="form-input contact-message">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                    </div>

                                    <div class="comment-submit-btn">
                                        <button class="btn btn--black btn-block" type="submit">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('plugins/js/intlTelInput-jquery.min.js') }}"></script>
    <script src="{{ asset('js/intltel.js') }}"></script>
@endsection
