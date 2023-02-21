<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Route::macro('shopRoutes', function ($prefix) {
        //     Route::group(
        //         [
        //             'prefix' => $prefix,
        //             'middleware' => ['shopping'],
        //         ], 
        //         function () {
        //             Route::get('products/{product}', 'ProductsController@show');
        //             // ...
        //         }
        //     );
        // });
    }
}
