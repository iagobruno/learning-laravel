<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('/js/app.js') }}" async defer></script>

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
