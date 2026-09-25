<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-gray-900">
            Welcome back
        </h1>

    <p class="mt-1 text-sm text-gray-600">
        Sign in to your EventFlow account.
    </p>
</div>

<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <div>
        <x-input-label for="email" :value="__('Email')" />

        <x-text-input
            id="email"
            type="email"
            name="email"
            :value="old('email')"
            required
            autofocus
            autocomplete="username"
            class="mt-1"
        />

        <x-input-error :messages="$errors->get('email')" />
    </div>

    <div>
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input
            id="password"
            type="password"
            name="password"
            required
            autocomplete="current-password"
            class="mt-1"
        />

        <x-input-error :messages="$errors->get('password')" />
    </div>

    <div class="flex items-center justify-between">
        <label for="remember_me" class="inline-flex items-center">
            <input
                id="remember_me"
                type="checkbox"
                class="text-indigo-600 border-gray-300 rounded shadow-sm cursor-pointer focus:ring-indigo-500"
                name="remember"
            >

            <span class="text-sm text-gray-600 ms-2">
                {{ __('Remember me') }}
            </span>
        </label>

        @if (Route::has('password.request'))
            <a
                href="{{ route('password.request') }}"
                class="text-sm text-gray-600 underline hover:text-gray-900"
            >
                {{ __('Forgot password?') }}
            </a>
        @endif
    </div>

    <x-primary-button class="justify-center w-full">
        {{ __('Log in') }}
    </x-primary-button>
</form>

<p class="mt-6 text-sm text-center text-gray-600">
    Don't have an account?
    <a
        href="{{ route('register') }}"
        class="font-medium text-indigo-600 hover:text-indigo-500"
    >
        Register
    </a>
</p>

</x-guest-layout>
