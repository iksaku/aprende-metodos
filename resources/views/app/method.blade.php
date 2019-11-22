<?php /** @var App\Method $method */ ?>

@extends('app.partials.template')

@include('app.components.use-katex')

@section('content')
    <div class="w-full">
        @if($completed ?? false)
            <div role="alert" class="w-full border border-l-4 border-green-500 p-4 mb-4">
                Ya has completado este tema.
            </div>
        @elseif($alert ?? false)
            <div role="alert" class="w-full border border-l-4 border-red-500 p-4 mb-4">
                {{ $alert }}
            </div>
        @endif

        <div class="w-full rich-text">
            <h1>
                {{ $method->name }}
            </h1>

            @parsedown($method->content)
        </div>

        @if(!$completed && $method->exercises()->count() >= 1)
            <div class="w-full block text-center mt-8">
                <a
                    href="{{ route('method.exercise', $method) }}"
                    role="button"
                    class="text-2xl text-gray-100 font-bold bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:shadow-outline px-4 py-2 rounded-lg"
                >
                    Iniciar Prueba
                </a>
            </div>
        @endif
    </div>
@endsection
