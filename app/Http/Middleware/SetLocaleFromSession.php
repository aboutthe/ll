<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SetLocaleFromSession
{
    public function handle(Request $request, Closure $next)
    {
        // Если первый сегмент URL — поддерживаемая локаль, НИЧЕГО не меняем.
        $first = $request->segment(1);
        $supported = array_keys(LaravelLocalization::getSupportedLocales());

        if (! in_array($first, $supported, true)) {
            app()->setLocale(session('locale', config('app.locale')));
        }

        return $next($request);
    }
}
