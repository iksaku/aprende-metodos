<div class="w-1/4 p-4 pr-0 overflow-y-auto scrolling-touch text-gray-700 border-r border-gray-400 shadow-inner">
    <div class="w-full mb-8">
        <span class="font-bold uppercase">
            <a href="{{ route('index') }}">
                @lang('Home')
            </a>
        </span>
    </div>

    @foreach(App\Topic::all() as $topic)
        <div class="w-full mb-8 last:mb-0">
            <span class="font-bold uppercase">
                {{ $topic->name }}
            </span>

            <ul class="w-full pl-4">
                @foreach($topic->methods as $method)
                    <li class="list-disc mb-1 last:mb-0">
                        <a href="{{ route('method', compact('method')) }}" class="hover:text-blue-700 focus:text-blue-700">
                            {{ $method->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
