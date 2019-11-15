@extends('partials.main')

@section('body')
    <div class="h-full w-full flex flex-col items-center justify-center p-4">
        <h1 class="text-gray-700 text-4xl font-bold mb-10">
            @lang('Register')
        </h1>

        <form
            method="post"
            action="{{ route('register') }}"
            class="max-w-sm w-full p-8 rounded-lg border border-gray-300 shadow-lg bg-gray-100"
        >
            @csrf

            <label class="w-full block mb-4">
                <span class="text-gray-700 text-sm font-bold">
                    @lang('Name')
                </span>
                <input
                    required
                    autofocus
                    autocomplete="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    class="form-input w-full block @error('name') border-red-500 @enderror"
                >
                @error('name')
                    <span class="text-red-500 text-sm italic">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="w-full block mb-4">
                <span class="text-gray-700 text-sm font-bold">
                    @lang('Email')
                </span>
                <input
                    required
                    autocomplete="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    class="form-input w-full block @error('email') border-red-500 @enderror"
                >
                @error('email')
                    <span class="text-red-500 text-sm italic">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="w-full block mb-4">
                <span class="text-gray-700 text-sm font-bold">
                    @lang('Password')
                </span>
                <input
                    required
                    autocomplete="new-password"
                    name="password"
                    type="password"
                    class="form-input w-full block @error('password') border-red-500 @enderror"
                >
                @error('password')
                    <span class="text-red-500 text-sm italic">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="w-full block mb-4">
                <span class="text-gray-700 text-sm font-bold">
                    @lang('Confirm Password')
                </span>
                <input
                    required
                    autocomplete="new-password"
                    name="password_confirmation"
                    type="password"
                    class="form-input w-full block @error('password') border-red-500 @enderror"
                >
                @error('password_confirmation')
                    <span class="text-red-500 text-sm italic">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <div class="w-full block flex items-center justify-end mb-4">
                <button
                    type="submit"
                    class="w-1/3 px-4 py-2 text-gray-100 font-bold bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 rounded-lg"
                >
                    @lang('Register')
                </button>
            </div>

            <div class="w-full block">
                <p class="text-sm text-gray-700 text-center">
                    @lang('Already registered?')
                    <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 focus:text-blue-700">
                        @lang('Login here')
                    </a>
                </p>
            </div>
        </form>
    </div>
@endsection
