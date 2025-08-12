<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath'],
], function () {
    Route::get('/', fn () => view('welcome'))->name('home');

    Route::middleware(['auth','verified'])->group(function () {
        Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    });
});

Route::get('/lang/{locale}', function (string $locale) {
    if (! array_key_exists($locale, LaravelLocalization::getSupportedLocales())) {
        abort(404);
    }

    // Запомним язык в сессии и вернёмся на предыдущую страницу
    session(['locale' => $locale]);

    // Если хочешь, можно ещё cookie поставить:
    // cookie()->queue(cookie('locale', $locale, 60*24*365));

        return redirect(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($locale, null, [], true));
    })->name('lang.switch');