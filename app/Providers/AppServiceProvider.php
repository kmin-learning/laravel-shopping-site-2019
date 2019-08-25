<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Blade::directive('hellokmin', function(){
            return "<?php echo 'ĐÂY LÀ CHỈ THỊ LỆNH ĐÃ ĐƯỢC CUSTOMIZE' ?>";
        });

        view()->composer('layouts.user_info', function($view) {
            $username = "Kmin";

            $view->with('username', $username);
        });
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
