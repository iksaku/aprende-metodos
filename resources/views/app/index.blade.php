@extends('app.partials.template')

@section('content')
    <div class="h-full w-full">
        <p>
            Has completado {{ $completedMethods }}/{{ $totalMethods }} métodos disponibles.
        </p>
    </div>
@endsection
