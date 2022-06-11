<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page_title }}</title>

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li><a href="{{ route('dashboard.userDetails') }}">User Details</a></li>
            <li><a href="{{ route('dashboard.profile') }}">Profile</a></li>
            <li><a href="{{ route('dashboard.logout') }}">Logout</a></li>
        </ul>
    </nav>

    @yield('contents')

</body>

</html>
