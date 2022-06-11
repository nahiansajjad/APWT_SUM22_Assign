@extends('layouts.without_logged_in')

@section('contents')
    <h1>Register</h1>
    <hr>
    <div>
        <form method="post">
            {{ @csrf_field() }}

            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">

            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror

            <br>

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

            <label for="cpass">Confirm Password: </label>
            <input type="password" name="cpass" id="cpass" value="{{ old('cpass') }}">

            @error('cpass')
                <span class="error">{{ $message }}</span>
            @enderror

            <br>

            <div>
                <label for="type">User type: </label>
                <select name="type" id="type">
                    <option value="user" {{ old('type') == 'user' ? "selected" : "" }}>User</option>
                    <option value="admin" {{ old('type') == 'admin' ? "selected" : "" }}>Admin</option>
                </select>

                @error('type')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>
            <input type="submit" value="Register">
        </form>
    </div>
@endsection
