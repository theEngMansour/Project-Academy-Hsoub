<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\{ProjectComposer, CategoryComposer};
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['livewire.projects', 'company.admin.projects.edit', 'company.home.home'], CategoryComposer::class);
        \Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
    }
}
