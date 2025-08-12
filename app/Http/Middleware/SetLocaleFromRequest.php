<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class SetLocaleFromRequest {
    public function handle(Request $request, Closure $next){
        $locale = $request->route('locale') ?? $request->getPreferredLanguage(config('app.supported_locales', ['en']));
        $locale = in_array($locale, config('app.supported_locales', ['en','ru','lv']), true) ? $locale : config('app.fallback_locale', 'en');
        app()->setLocale($locale);
        if (session()->get('locale') !== $locale) session(['locale'=>$locale]);
        return $next($request);
    }
}