@extends('layouts.error')
@section('title', 'Page Not Found')
@section('imageURL', asset('img/errors/404.svg'))
@section('error-title', 'Page Not Found')
@section('content')
    <span>Sorry, the page you are looking for could not be found.</span>
    <p>Please refresh and try again.</p>
@endsection()
