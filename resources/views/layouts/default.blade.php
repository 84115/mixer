<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#222">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <title>{{ __('app.name') }} - @yield('title')</title>
    </head>
    <body>
        <div class="m-2">
            <h1 class="pt-4 text-center">@yield('title')</h1>
            <h2 class="text-center">{{ __('app.name') }}</h2>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("ingredients") }}">Ingredients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("cocktails") }}">Cocktails</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("mix") }}">Mix</a>
                </li>
            </ul>
            <br>

            @yield('content')
        </div>
        <div class="text-center mb-4">
            {{ __('app.created_by') }} <a target="_blank" href="https://james-ball.co.uk">James Ball</a>
        </div>
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    </body>
</html>
