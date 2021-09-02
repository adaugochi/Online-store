@extends('layouts.admin')
@section('content-title', 'My Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="#" class="border rounded p-3 d-flex flex-column card-full">
                <div class="d-flex justify-content-between">
                    <i class="bi bi-person-check fs-48 text-accent"></i>
                </div>
                <h3 class="fs-20 font-weight-bold text-black">
                    Customers
                </h3>
                <span class="text-gray">Total: 50</span>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <a href="#" class="border rounded p-3 d-flex flex-column card-full">
                <div class="d-flex justify-content-between">
                    <i class="bi bi-view-list fs-48 text-accent"></i>
                </div>
                <h3 class="fs-20 font-weight-bold text-black">
                    Item Category
                </h3>
                <span class="text-gray">Total: 4</span>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <a href="#" class="border rounded p-3 d-flex flex-column card-full">
                <div class="d-flex justify-content-between">
                    <i class="bi bi-cart-check fs-48 text-accent"></i>
                </div>
                <h3 class="fs-20 font-weight-bold text-black">
                    Orders
                </h3>
                <span class="text-gray">Total: 10</span>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <a href="#" class="border rounded p-3 d-flex flex-column card-full">
                <div class="d-flex justify-content-between">
                    <i class="bi bi-box-seam fs-48 text-accent"></i>
                </div>
                <h3 class="fs-20 font-weight-bold text-black">
                    Items
                </h3>
                <span class="text-gray">Total: 20</span>
            </a>
        </div>
    </div>
@endsection
