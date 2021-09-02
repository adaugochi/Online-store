@extends('layouts.error')
@section('title', 'Unauthorized')
@section('imageURL', asset('img/errors/404.svg'))
@section('error-title', 'Unauthorized')
@section('content')
    <span>Sorry, Permission Denied!. You are not authorize to access that page</span>
    <p>Please refresh and try again.</p>
@endsection()
