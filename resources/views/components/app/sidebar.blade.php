<div class="absolute h-full w-64 text-gray-700 border-r p-4 overflow-y-auto scrolling-touch space-y-4">
    <div class="w-full flex flex-col font-semibold uppercase space-y-4">
        <a href="{{ route('index') }}">
            Inicio
        </a>
    </div>

    <hr>

    <div class="space-y-8">
        @foreach(App\Topic::all() as $topic)
            <div class="w-full">
                <span class="font-semibold uppercase">
                    {{ $topic->name }}
                </span>

                <ul class="w-full list-outside list-disc pl-6 space-y-1">
                    @foreach($topic->methods as $method)
                        <li>
                            <a
                                href="{{ strlen($method->content) < 1 ? '#' : route('method', $method) }}"
                                class="hocus:text-blue-700 @if(url()->current() === route('method', $method)) text-blue-700 font-semibold @endif"
                            >
                                {{ $method->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>
