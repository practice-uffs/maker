<?php

namespace App\Providers;


use App\Services\GoogleDoc;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GoogleDoc::class, function($app) {
            return new GoogleDoc(config('google.docs'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('admin', function($expression = null) {
            return '<?php if (auth()->check() && auth()->user()->isAdmin()): ?>';
        });

        Blade::directive('endadmin', function() {
            return '<?php endif; ?>';
        });
    }
}
