@php $loc = app()->getLocale(); @endphp
<details class="relative">
  <summary class="list-none cursor-pointer flex items-center gap-2 border rounded-lg px-2 py-1">
    <span class="text-lg leading-none" aria-hidden="true">
      {{ $loc === 'ru' ? '🇷🇺' : ($loc === 'lv' ? '🇱🇻' : '🇬🇧') }}
    </span>
    <span class="uppercase">{{ $loc }}</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.29a.75.75 0 01-.02-1.08z" clip-rule="evenodd" />
    </svg>
    <span class="sr-only">Change language</span>
  </summary>

  <div class="absolute right-0 mt-2 w-44 bg-white border rounded-lg shadow-md overflow-hidden z-50">
    <form method="POST" action="{{ route('lang.switch') }}" class="divide-y">
      @csrf
      <button type="submit" name="locale" value="en" class="w-full flex items-center gap-2 px-3 py-2 hover:bg-gray-50">
        <span aria-hidden="true">🇬🇧</span> <span>English</span>
      </button>
      <button type="submit" name="locale" value="ru" class="w-full flex items-center gap-2 px-3 py-2 hover:bg-gray-50">
        <span aria-hidden="true">🇷🇺</span> <span>Русский</span>
      </button>
      <button type="submit" name="locale" value="lv" class="w-full flex items-center gap-2 px-3 py-2 hover:bg-gray-50">
        <span aria-hidden="true">🇱🇻</span> <span>Latviešu</span>
      </button>
    </form>
  </div>
</details>
