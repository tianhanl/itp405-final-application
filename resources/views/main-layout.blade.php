<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        <ul class="nav">
            @if (Auth::check())
            <li class="nav-item">
                <a href="/profile" class="nav-link">My profile</a>
            </li>
            <li class="nav-item">
                <a href="/items" class="nav-link">Items</a>
            </li>
            <li class="nav-item">
                <a href="/transactions" class="nav-link">Transactions</a>
            </li>
            <li class="nav-item">
                <a href="/logout" class="nav-link">Logout</a>
            </li>
            @else
            <li class="nav-item">
                <a href="/login" class="nav-link">My profile</a>
            </li>
            <li class="nav-item">
                <a href="/signup" class="nav-link">Logout</a>
            </li>
            @endif
        </ul>
        @yield('content')
    </div>
</body>
</html>