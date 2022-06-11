@extends('layouts.without_logged_in')

@section('contents')
    <h1>Login</h1>
    <hr>
    <div>
        <form method="post">
            {{ @csrf_field() }}

            @if ($errors->credential->first())
                <span class="error">{{ $errors->credential->first() }}</span><br>
            @endif

            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">

            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror

            <br>

            <label for="pass">Password: </label>
            <input type="password" name="pass" id="pass" value="{{ old('pass') }}">

            @error('pass')
                <span class="error">{{ $message }}</span>
            @enderror

            <br>

            <input type="submit" value="Login">
        </form>
    </div>
@endsection
