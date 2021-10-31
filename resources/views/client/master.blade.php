<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    @include('client.components.link')
    @yield('css')
</head>

<body>
    @include('client.components.header')

    @yield('content')

    @include('client.components.footer')

    @include('client.components.script')
    @yield('js')
</body>

</html>
