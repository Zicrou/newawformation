<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
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
        View::composer('shared.nav', function ($view) {

            $cartCount = 0;

            if (auth()->check()) {

                $cart = auth()->user()->cart()->withCount('items')->first();

                $cartCount = $cart?->items_count ?? 0;
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
