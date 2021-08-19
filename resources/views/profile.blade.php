@extends('layouts.portal')
@section('title', 'My Profile')
@section('header-breadcrumb')
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="active">Profile</li>
@endsection()
@section('content')
    <section class="bg-white py-5">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Personal Information</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email Address <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>First Name <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Phone  <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Address Information</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Street Address <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Town / City <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Postcode / Zip Code</label>
                                    <div class="form-input">
                                        <input type="text" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Country<span class="required">*</span></label>
                                    <div class="form-input">
                                        <select class="select" name="country" id="country">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>State<span class="required">*</span></label>
                                    <div class="form-input">
                                        <select class="select" name="state" id="state">
                                        </select>
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
@endsection
