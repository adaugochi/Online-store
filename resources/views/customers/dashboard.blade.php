@extends('layouts.portal')
@section('title', 'My Dashboard')
@section('header-breadcrumb')
    <li class="active">Dashboard</li>
@endsection()
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="#" class="border rounded p-3 d-flex flex-column card-full">
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-journal-text fs-48 text-accent"></i>
                    </div>
                    <h3 class="fs-20 font-weight-bold text-black">
                        Address Book
                    </h3>
                    <span class="text-gray">Your default shipping address</span>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <a href="#" class="border rounded p-3 d-flex flex-column card-full">
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-person-circle fs-48 text-accent"></i>
                    </div>
                    <h3 class="fs-20 font-weight-bold text-black">
                        Account Details
                    </h3>
                    <span class="text-gray">Change password</span>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <a href="#" class="border rounded p-3 d-flex flex-column card-full">
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-cart-check fs-48 text-accent"></i>
                    </div>
                    <h3 class="fs-20 font-weight-bold text-black">
                        My Orders
                    </h3>
                    <span class="text-gray">Total: 10</span>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <a href="#" class="border rounded p-3 d-flex flex-column card-full">
                    <div class="d-flex justify-content-between">
                        <i class="bi bi-heart fs-48 text-accent"></i>
                    </div>
                    <h3 class="fs-20 font-weight-bold text-black">
                        Saved Items
                    </h3>
                    <span class="text-gray">Total: 5</span>
                </a>
            </div>
        </div>
    </div>
@endsection
