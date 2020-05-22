@extends('layouts.app')

@section('content')
    <div class="h-full w-full flex flex-col items-center justify-center">
        <p class="text-6xl">
            <span class="text-green-600">
                {{ $completedMethods }}
            </span>
            <span>
                / {{ $totalMethods }}
            </span>
        </p>
        <p class="text-3xl">
            Métodos completados.
        </p>
    </div>
@endsection
