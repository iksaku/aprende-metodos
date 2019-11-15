<?php /** @var App\Method $method */ ?>

@extends('app.partials.template')

@section('content')
    <div class="h-full w-full p-4">
        <h1 class="font-4xl font-bold">
            {{ $method->name }}
        </h1>

        {{ $method->content }}
    </div>
@endsection
