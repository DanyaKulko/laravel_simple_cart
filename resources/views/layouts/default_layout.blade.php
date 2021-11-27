<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <nav class="main_section">
            <ul>
                <li><a href="{{ route('categories') }}">Categories</a></li>
                <li><a href="{{ route('cart') }}">Cart</a></li>
            </ul>
        </nav>
    </header>

    <div class="main_section wrap_content">
        @yield('main_content')
    </div>

    <footer class="main_section footer">
        this is footer!
    </footer>

</div>
</body>
</html>
