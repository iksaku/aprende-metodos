@extends('partials.main')

@section('body')
    <div class="h-full w-full flex flex-col items-stretch">
        @include('app.partials.header')

        <div class="h-full w-full flex items-stretch">
            @include('app.partials.sidebar')

            <div class="h-full w-full p-4">
                @yield('content')
            </div>
        </div>

        @include('app.partials.footer')
    </div>
@endsection
