<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\category;
use App\Models\brand;
use App\Models\product;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        $category = category::where('is_view', 1)->get();
        $brand = brand::where('is_view', 1)->get();
        $product_all = product::where('is_view', 1)->get();

        view()->share('category', $category);
        view()->share('brand', $brand);
        view()->share('product', $product_all);

    }
}
