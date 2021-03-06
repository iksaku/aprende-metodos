<?php /** @var App\Method $method */ ?>
<?php /** @var App\Exercise $exercise */ ?>

@extends('layouts.app', ['showSidebar' => false])

<x-use.katex />

@section('content')
    <div class="h-full w-full markdown flex flex-col items-center justify-center hidden">
        <h2>
            Tu tiempo se ha agotado
        </h2>

        <a href="{{ route('method', $method) }}">Regresar a la lectura del método.</a>
    </div>

    <div class="w-full container mx-auto space-y-4 divide-y divide-gray-400">
        <div class="w-full markdown">
            <p>
                Tiempo restante: <span id="time"></span>
            </p>

            <h1>
                {{ $method->name }} - Ejercicio
            </h1>

            @markdown($exercise->content)
        </div>

        <div class="w-full text-center pt-4">
            <form method="post" action="{{ route('method.exercise', $method) }}">
                @csrf

                <label class="w-1/4 mx-auto block mb-4">
                    <span class="text-gray-700">
                        Respuesta
                    </span>
                    <input
                        required
                        autocomplete="off"
                        type="text"
                        name="answer"
                        value="{{ old('answer') }}"
                        class="form-input w-full block @error('answer') border-red-500 @enderror"
                    >
                    @error('answer')
                        <span class="text-sm text-red-500 italic">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <button
                    type="submit"
                    class="text-gray-100 font-bold bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:shadow-outline px-4 py-2 rounded-lg"
                >
                    Comprobar Respuesta
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const content = document.getElementById('content');
        const notice = document.getElementById('notice');

        const timer = document.getElementById('time');
        const ttl = parseInt('{{ $closes_at * 1000 }}');

        function updateTimer() {
            let now = new Date().getTime();
            let dif = ttl - now;

            let minuteDif = Math.floor((dif % (1000 * 60 * 60)) / (1000 * 60));
            if (minuteDif <= 0) {
                minuteDif = 0;
            }

            let secondDif = Math.floor((dif % (1000 * 60)) / 1000);

            if (minuteDif <= 0 && secondDif <= 0) {
                content.classList.toggle('hidden');
                notice.classList.toggle('hidden');

                setTimeout(redirectToMethod, 5000);

                return;
            }

            let minutes = `${minuteDif}`.padStart(2, '0');
            let seconds = `${secondDif}`.padStart(2, '0');

            timer.textContent = `${minutes}:${seconds}`;

            setTimeout(updateTimer, 500);
        }

        function redirectToMethod() {
            window.location.href = '{{ route('method', $method) }}';
        }

        updateTimer();
    </script>
@endpush
