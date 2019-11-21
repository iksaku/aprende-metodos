<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        @livewireAssets

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @stack('styles')
    </head>

    <body class="bg-gray-200">
        <div class="min-h-screen h-screen w-full">
            @yield('body')
        </div>

        @stack('scripts')
    </body>
</html>
