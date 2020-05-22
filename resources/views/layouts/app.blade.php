@extends('layouts.base')

@section('body')
    <div class="min-h-screen w-full flex flex-col bg-gray-50">
        <x-app.header />

        <div class="flex-grow flex">
            @if($showSidebar ?? true)
                <div class="flex-none relative w-64">
                    <x-app.sidebar />
                </div>
            @endif

            <div class="flex-grow p-4 overflow-y-auto">
                @yield('content')
            </div>
        </div>

        <x-app.footer />
    </div>
@endsection
