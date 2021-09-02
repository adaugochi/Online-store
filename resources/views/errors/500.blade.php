@extends('layouts.error')
@section('title', 'Internal Server Error')
@section('imageURL', asset('img/errors/500.svg'))
@section('error-title', 'Server Error Occurred')
@section('content')
    <span>Ooops, something went wrong on our server</span>
    <p>Please refresh and try again.</p>
@endsection()
