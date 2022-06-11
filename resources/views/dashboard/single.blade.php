@extends('layouts.with_logged_in')
@section('contents')
    <h1>User Detail | <small>{{ $user->name }}</small></h1>
    <hr>

    <span>Name: {{ $user->name }}</span><br>
    <span>Email: {{ $user->email }}</span><br>
    <span>User Type: {{ $user->type }}</span><br>
@endsection
