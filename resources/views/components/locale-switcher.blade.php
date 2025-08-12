@props(['locales' => ['en' => 'EN', 'lv' => 'LV', 'ru' => 'RU']])

@php $current = app()->getLocale(); @endphp
<ul {{ $attributes->merge(['class' => 'flex gap-2']) }}>
@foreach ($locales as $code => $label)
    <li>
        <a href="{{ route('lang.switch', $code) }}"
           @class(['font-bold underline' => $current === $code])>
            {{ $label }}
        </a>
    </li>
@endforeach
</ul>
