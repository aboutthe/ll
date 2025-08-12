@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
@endphp

<x-guest-layout>
    {{-- Language switcher --}}
    <div class="flex justify-end mb-6">
        <div class="inline-flex rounded-lg border bg-white overflow-hidden">
            @foreach (LaravelLocalization::getSupportedLocales() as $code => $props)
                <a hreflang="{{ $code }}"
                   href="{{ LaravelLocalization::getLocalizedURL($code, null, [], true) }}"
                   class="px-3 py-1 text-sm {{ app()->getLocale() === $code ? 'bg-gray-100 font-semibold' : 'hover:bg-gray-50' }}"
                   title="{{ $props['native'] ?? strtoupper($code) }}">
                    {{ strtoupper($code) }}
                </a>
            @endforeach
        </div>
    </div>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        {{-- Статус (например, после сброса пароля) --}}
        <x-auth-session-status class="mb-4" :status="session('status')" />

        {{-- Ошибки валидации --}}
        <x-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" :value="__('auth.email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                         :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" :value="__('auth.password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                         required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('auth.remember') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('password.request') }}">
                        {{ __('auth.forgot') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('auth.login') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
