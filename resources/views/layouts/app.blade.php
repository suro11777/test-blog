<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.includes.css')
    @include('partials.includes.top_js')

</head>
<body>
<div class="w-100">
    <!-- Sidebar Holder -->
    @include('partials.header')
    <main class="w-100 py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>
    @include('partials.footer')
</div>
@include('partials.includes.bottom_js')
<!-- Scripts -->
</body>
</html>
