@extends('layouts.base')

@section('body')
    <div class="min-h-screen w-full flex flex-col bg-gray-50">
        <x-app.header />

        <div class="flex-grow flex items-stretch">
            @if($showSidebar ?? true)
                <x-app.sidebar />
            @endif

            <div class="flex-grow p-4 overflow-y-auto">
                @yield('content')
            </div>
        </div>

        <x-app.footer />
    </div>
@endsection
