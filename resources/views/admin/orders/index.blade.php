@extends('layouts.admin')
@section('content-title', "Customer's Orders ")

@section('content')
    <div class="empty-state">
        <i class="bi bi-cart-check empty-state__icon icon-grey"></i>
        <p class="empty-state__description mt-2">No order has been made yet.</p>
    </div>
@endsection
