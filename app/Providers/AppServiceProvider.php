<?php

namespace App\Providers;


use App\Services\GoogleDoc;
use App\Services\Reshot;
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

        $this->app->singleton(Reshot::class, function($app) {
            return new Reshot(config('reshot'));
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
