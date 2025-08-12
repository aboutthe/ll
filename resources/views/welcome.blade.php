<x-guest-layout>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end mb-6">
            @php
                $supported = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales();
                $current   = app()->getLocale();
            @endphp
            <div class="inline-flex rounded-lg border bg-white overflow-hidden">
                @foreach ($supported as $code => $props)
                    <a hreflang="{{ $code }}"
                       href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($code, null, [], true) }}"
                       class="px-3 py-1 text-sm {{ $current === $code ? 'bg-gray-100 font-semibold' : 'hover:bg-gray-50' }}"
                       title="{{ $props['native'] ?? strtoupper($code) }}">
                        {{ strtoupper($code) }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 items-center">
            <div class="space-y-6">
                <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight">
                    {{ __('messages.welcome_title', ['app' => config('app.name')]) }}
                </h1>
                <p class="text-lg text-slate-600">
                    {{ __('messages.welcome_subtitle') }}
                </p>
                <div class="flex gap-3">
                    <a href="{{ route('register') }}" class="px-5 py-3 rounded-xl bg-slate-900 text-white hover:bg-slate-800">
                        {{ __('messages.register') }}
                    </a>
                    <a href="{{ route('login') }}" class="px-5 py-3 rounded-xl border hover:bg-white">
                        {{ __('messages.login') }}
                    </a>
                </div>

                @if (session('status'))
                    <div class="p-4 rounded-xl bg-green-50 border border-green-200 text-green-800">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <div class="grid grid-cols-3 gap-4">
                    <div class="aspect-video rounded-xl bg-gradient-to-br from-slate-200 to-slate-100"></div>
                    <div class="aspect-video rounded-xl bg-gradient-to-br from-slate-200 to-slate-100"></div>
                    <div class="aspect-video rounded-xl bg-gradient-to-br from-slate-200 to-slate-100"></div>
                    <div class="aspect-video rounded-xl bg-gradient-to-br from-slate-200 to-slate-100"></div>
                    <div class="aspect-video rounded-xl bg-gradient-to-br from-slate-200 to-slate-100"></div>
                    <div class="aspect-video rounded-xl bg-gradient-to-br from-slate-200 to-slate-100"></div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
