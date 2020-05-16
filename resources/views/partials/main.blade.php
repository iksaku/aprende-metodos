<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <livewire:styles />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @stack('styles')
    </head>

    <body class="bg-gray-200 overflow-hidden">
        <div class="min-h-screen h-full w-full">
            @yield('body')
        </div>

        <livewire:scripts />
        @stack('scripts')
    </body>
</html>
