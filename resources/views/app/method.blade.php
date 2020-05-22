<?php
/** @var App\Method $method */
?>

@extends('layouts.app')

<x-use.katex />

@section('content')
    @if($time !== null)
        <div role="alert" class="w-full border border-l-4 border-green-500 p-4 mb-4">
            Ya has completado este tema.
        </div>
    @elseif(session()->get('alert', false))
        <div role="alert" class="w-full border border-l-4 border-red-500 p-4 mb-4">
            {{ session()->get('alert') }}
        </div>
    @endif

    <div class="space-y-4">
        <h1 class=" text-3xl font-bold">
            {{ $method->name }}
        </h1>

        <div
            x-cloak
            x-data="{ tab: 'content' }"
            class="w-full space-y-4"
        >
            {{-- Tabs --}}
            <div class="tab-row flex items-center border-gray-400 md:rounded-lg overflow-hidden pl-5 -ml-5 -mr-4">
                <button
                    class="text-sm font-medium focus:outline-none px-3 py-2 rounded-t-lg transform duration-100"
                    :class="tab === 'content' ? 'bg-gray-50 selected' : 'text-gray-700'"
                    @click.prevent="tab = 'content'"
                >
                    Lección
                </button>

                <button
                    class="text-sm font-medium focus:outline-none px-3 py-2 rounded-t-lg transform duration-100"
                    :class="tab === 'ranking' ? 'bg-gray-50 selected' : 'text-gray-700'"
                    @click.prevent="tab = 'ranking'"
                >
                    Tabla de Posiciones
                </button>
            </div>

            {{-- Lesson Contents --}}
            <div
                x-show="tab === 'content'"
                class="space-y-4 divide-y divide-gray-400"
            >
                <div class="markdown pl-1">
                    @markdown($method->content)
                </div>

                @if($time === null && $method->exercises->count() >= 1)
                    <div class="w-full text-center pt-4">
                        <a
                            href="{{ route('method.exercise', $method) }}"
                            role="button"
                            class=" text-2xl text-gray-100 font-bold bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:shadow-outline px-4 py-2 rounded-lg"
                        >
                            Iniciar Prueba
                        </a>
                    </div>
                @endif
            </div>

            {{-- Ranking --}}
            <div
                x-show="tab === 'ranking'"
                class="pl-1"
            >
                @livewire('method.ranking', ['method' => $method])
            </div>
        </div>
    </div>
@endsection
