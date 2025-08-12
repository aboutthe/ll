{{-- Business Central–style Tile Dashboard (Jetstream) --}}
{{-- IMPORTANT: Use Jetstream's component layout. Do NOT @extends('layouts.app') because that view is a component view expecting $slot. --}}

@php
    $tiles = $tiles ?? [
        ['title' => __('dashboard.sales'),     'value' => '1 254',   'icon' => 'fa-cart-shopping', 'color' => 'bg-blue-600',    'href' => url('/')],
        ['title' => __('dashboard.customers'), 'value' => '342',     'icon' => 'fa-users',         'color' => 'bg-emerald-600', 'href' => url('/')],
        ['title' => __('dashboard.orders'),    'value' => '58',      'icon' => 'fa-clipboard-list','color' => 'bg-amber-600',   'href' => url('/')],
        ['title' => __('dashboard.inventory'), 'value' => '12 543',  'icon' => 'fa-boxes-stacked',         'color' => 'bg-violet-600',  'href' => url('/')],
        ['title' => __('dashboard.invoices'),  'value' => '37',      'icon' => 'fa-file-invoice',     'color' => 'bg-cyan-600',    'href' => url('/')],
        ['title' => __('dashboard.payments'),  'value' => '€87 230', 'icon' => 'fa-credit-card',   'color' => 'bg-rose-600',    'href' => url('/')],
    ];
@endphp

{{-- УДАЛЕНО: любые определения bc_icon() --}}

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
                            {{-- Иконка подставится на клиенте через JS --}}
                            <div class="opacity-100 text-white text-2xl">
                                <i class="fa-solid {{ $t['icon'] }}"></i>
                            </div>
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
