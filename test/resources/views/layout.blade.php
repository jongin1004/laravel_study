<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'laravel')</title>
</head>
<body>
  <ul>
    <li><a href="/laravel">laravel</a></li>
    <li><a href="/ruby_on_rails">ruby on rails</a></li>
    <li><a href="/django">django</a></li>
  </ul>

  @yield('content')
</body>
</html>