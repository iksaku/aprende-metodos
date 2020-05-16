<header class="w-full text-gray-900 bg-gray-50 border-b">
    <nav class="container flex items-center justify-between px-4 sm:px-6 py-4 mx-auto">
        <a
            href="{{ route('index') }}"
            class="text-2xl font-semibold focus:outline-none focus:shadow-outline"
        >
            {{ config('app.name') }}
        </a>

        <div class="flex items-center justify-end">
            <x-app.header.acount />
        </div>
    </nav>
</header>
