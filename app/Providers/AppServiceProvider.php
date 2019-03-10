<?php

namespace App\Providers;

use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // FIXME Is it a good place for sharing variables?
        try {
            $cats = Category::all();
        } catch (QueryException $e) {
            // If our database is not accessible because of some reasons.
            $cats = [];
        }
        \View::share('cats', $cats);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
