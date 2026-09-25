<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-gray-900">
            Create your account
        </h1>

    <p class="mt-1 text-sm text-gray-600">
        Create an account to start using EventFlow.
    </p>
</div>

<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    <div>
        <x-input-label for="name" :value="__('Name')" />

        <x-text-input
            id="name"
            type="text"
            name="name"
            :value="old('name')"
            required
            autofocus
            autocomplete="name"
            class="mt-1"
        />

        <x-input-error :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />

        <x-text-input
            id="email"
            type="email"
            name="email"
            :value="old('email')"
            required
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
            autocomplete="new-password"
            class="mt-1"
        />

        <x-input-error :messages="$errors->get('password')" />
    </div>

    <div>
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            class="mt-1"
        />

        <x-input-error :messages="$errors->get('password_confirmation')" />
    </div>

    <x-primary-button class="justify-center w-full">
        {{ __('Register') }}
    </x-primary-button>
</form>

<p class="mt-6 text-sm text-center text-gray-600">
    Already have an account?
    <a
        href="{{ route('login') }}"
        class="font-medium text-blue-600 hover:text-blue-500"
    >
        Log in
    </a>
</p>

</x-guest-layout>
