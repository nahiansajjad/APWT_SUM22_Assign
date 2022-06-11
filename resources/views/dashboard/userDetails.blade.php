@extends('layouts.with_logged_in')
@section('contents')
    <h1>User details</h1>
    <hr>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td><a href="{{ route('dashboard.getUser', ["id" => $user['id']]) }}">{{ $user['name'] }}</a></td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['type'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
