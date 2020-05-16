@extends('layouts.app')

@section('content')
    <div>
        <p>
            Has completado {{ $completedMethods }}/{{ $totalMethods }} métodos disponibles.
        </p>
    </div>
@endsection
