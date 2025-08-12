<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Livewire assets/update routes for subdirectory deployment
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/ll/public/livewire/livewire.js', $handle)->name('livewire.asset');
        });
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/ll/public/livewire/update', $handle)->name('app.livewire.update');
        });

        //
    }
}
