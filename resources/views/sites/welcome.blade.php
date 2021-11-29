@extends('layouts.app')

@section('content')

    @include('partials.header-banner')
    @include('partials.sales-collection')
    @include('partials.modals.view-product-modal')
    @include('partials.view-collections')
    @include('partials.how-it-works')

@endsection
