<x-dropdown>
    <x-slot name="button">
        <span class="fas fa-user"></span>
    </x-slot>

    @auth
        <span class="w-full text-center px-4 py-2 whitespace-no-wrap">
            {{ Auth::user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                type="submit"
                class="w-full hocus:text-gray-100 bg-transparent hocus:bg-red-700 focus:outline-none px-4 py-2 transition ease-in-out duration-150"
            >
                Cerrar Sesión
            </button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="inline-block text-center hocus:text-blue-700 focus:outline-none transition ease-out duration-150 px-4 py-2">
            Iniciar Sesión
        </a>

        <a href="{{ route('register') }}" class="inline-block text-center hocus:text-blue-700 focus:outline-none transition ease-out duration-150 px-4 py-2">
            Registrarse
        </a>
    @endguest
</x-dropdown>
