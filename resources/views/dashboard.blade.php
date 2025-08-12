{{-- Business Central–style Tile Dashboard (Jetstream) --}}
{{-- IMPORTANT: Use Jetstream's component layout. Do NOT @extends('layouts.app') because that view is a component view expecting $slot. --}}

@php
    $tiles = $tiles ?? [
        ['title' => __('dashboard.sales'),    'value' => '1 254',   'icon' => 'shopping-cart', 'color' => 'bg-blue-600',    'href' => url('/')],
        ['title' => __('dashboard.customers'),'value' => '342',     'icon' => 'users',          'color' => 'bg-emerald-600', 'href' => url('/')],
        ['title' => __('dashboard.orders'),   'value' => '58',      'icon' => 'clipboard-list', 'color' => 'bg-amber-600',   'href' => url('/')],
        ['title' => __('dashboard.inventory'),'value' => '12 543',  'icon' => 'boxes',          'color' => 'bg-violet-600',  'href' => url('/')],
        ['title' => __('dashboard.invoices'), 'value' => '37',      'icon' => 'file-invoice',   'color' => 'bg-cyan-600',    'href' => url('/')],
        ['title' => __('dashboard.payments'), 'value' => '€87 230', 'icon' => 'credit-card',    'color' => 'bg-rose-600',    'href' => url('/')],
    ];
@endphp



@php
    if (!function_exists('bc_icon')) {
        function bc_icon(string $name): string {
            $icons = [
                'shopping-cart' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" class="w-7 h-7"><path fill="currentColor" d="M7 18a2 2 0 1 0 .001 3.999A2 2 0 0 0 7 18zm10 0a2 2 0 1 0 .001 3.999A2 2 0 0 0 17 18zM7.338 5l.53 2H21a1 1 0 0 1 .97 1.243l-1.8 7.2A2 2 0 0 1 18.23 17H8.77a2 2 0 0 1-1.94-1.557L4.28 3H2a1 1 0 1 1 0-2h3a1 1 0 0 1 .97.758L6.07 3H21a1 1 0 1 1 0 2H7.338z"/></svg>',
                'users'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7"><path fill="currentColor" d="M16 11a4 4 0 1 0-3.999-4A4 4 0 0 0 16 11zM8 12a4 4 0 1 0-3.999-4A4 4 0 0 0 8 12zm8 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zM8 14c-2.67 0-8 1.34-8 4v2h6v-2c0-.71.22-1.37.61-1.97C7.2 14.57 7.58 14.25 8 14z"/></svg>',
                'clipboard-list'=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7"><path fill="currentColor" d="M9 2h6a2 2 0 0 1 2 2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2a2 2 0 0 1 2-2zm0 4h6V4H9v2zm1 5h8v2h-8v-2zm0 4h8v2h-8v-2zM6 11h2v2H6v-2zm0 4h2v2H6v-2z"/></svg>',
                'boxes'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7"><path fill="currentColor" d="M21 8l-9 5-9-5 9-5 9 5zm-9 7l9-5v10l-9 5-9-5V10l9 5z"/></svg>',
                'file-invoice'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7"><path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16l4-2 4 2 4-2 4 2V8l-6-6zM8 10h4v2H8v-2zm0 4h8v2H8v-2zm6-7V3.5L18.5 8H15a1 1 0 0 1-1-1z"/></svg>',
                'credit-card'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7"><path fill="currentColor" d="M2 5h20a2 2 0 0 1 2 2v3H0V7a2 2 0 0 1 2-2zm-2 7h24v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-5zm4 3h6v2H4v-2z"/></svg>',
            ];
            return $icons[$name] ?? $icons['boxes'];
        }
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.title') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                @foreach($tiles as $t)
                    <a href="{{ $t['href'] ?? '#' }}"
                       class="group rounded-2xl p-5 text-white shadow hover:shadow-lg transition ring-1 ring-black/5 {{ $t['color'] }}">
                        <div class="flex items-start justify-between">
                            <div class="opacity-90 group-hover:opacity-100">{!! bc_icon($t['icon']) !!}</div>
                            <span class="inline-flex items-center rounded-full bg-white/20 px-2 py-0.5 text-xs font-medium">
                                {{ __('dashboard.link') }}
                            </span>
                        </div>
                        <div class="mt-4">
                            <div class="text-sm/5 opacity-90">{{ $t['title'] }}</div>
                            <div class="mt-1 text-3xl font-semibold tracking-tight">{{ $t['value'] }}</div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-5">
                <div class="col-span-2 rounded-2xl bg-white shadow p-5">
                    <h3 class="text-lg font-semibold mb-3">{{ __('dashboard.activity') }}</h3>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li>• {{ __('dashboard.open_sales_orders') }} — 12</li>
                        <li>• {{ __('dashboard.new_customers_today') }} — 4</li>
                        <li>• {{ __('dashboard.bills_due_7d') }} — 9</li>
                    </ul>
                </div>
                <div class="rounded-2xl bg-white shadow p-5">
                    <h3 class="text-lg font-semibold mb-3">{{ __('dashboard.quick_actions') }}</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="#" class="inline-flex items-center rounded-lg border px-3 py-1.5 text-sm hover:bg-gray-50">+ {{ __('dashboard.create_order') }}</a>
                        <a href="#" class="inline-flex items-center rounded-lg border px-3 py-1.5 text-sm hover:bg-gray-50">+ {{ __('dashboard.new_customer') }}</a>
                        <a href="#" class="inline-flex items-center rounded-lg border px-3 py-1.5 text-sm hover:bg-gray-50">{{ __('dashboard.import') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
