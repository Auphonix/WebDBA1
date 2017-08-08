<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('shared.header')
<body>
    @include('shared.navbar')
    <div class="container">
        @yield('content')
    </div>
    @include('shared.footer')
</body>
</html>
