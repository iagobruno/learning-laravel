<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>

    @stack('extra_head')
</head>
<body>
    @include('layouts.partials.header')
    @include('layouts.partials.flash-messages')

    <div class="container">
        @yield('content')
    </div>

    <br>
    <hr>
    <footer>
        &copy; {{ config('app.name') }} {{ date('Y') }}
    </footer>

    @stack('extra_body')
    {{--
    @push('extra_body')
        <script src="/example.js"></script>
    @endpush
    --}}
</body>
</html>
