<div class="flex-none w-64 text-gray-700 border-r p-4 overflow-auto scrolling-touch space-y-4">
    <div class="w-full flex flex-col font-semibold uppercase space-y-4">
        <a href="{{ route('index') }}">
            Inicio
        </a>

        <a href="#">
            Tabla de Puntuaciones
        </a>
    </div>

    <hr class="">

    <div class="space-y-8">
        @foreach(App\Topic::all() as $topic)
            <div class="w-full">
                <span class="font-semibold uppercase">
                    {{ $topic->name }}
                </span>

                <ul class="w-full list-outside list-disc pl-6 space-y-1">
                    @foreach($topic->methods as $method)
                        <li>
                            <a href="{{ strlen($method->content) < 1 ? '#' : route('method', compact('method')) }}" class="hocus:text-blue-700">
                                {{ $method->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>
