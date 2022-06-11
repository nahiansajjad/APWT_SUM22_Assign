@extends('layouts.with_logged_in')
@section('contents')
    <h1>User dashboard | <small>{{ Session::get('loggeduser')->name }}</small></h1>
    <hr>

    <h3>Name: {{ Session::get('loggeduser')->name }}</h3><br>
    <h3>Email: {{ Session::get('loggeduser')->email }}</h3><br>
    <h3>User Type: {{ Session::get('loggeduser')->type }}</h3><br>
@endsection
