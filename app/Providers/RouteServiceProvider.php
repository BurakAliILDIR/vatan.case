<?php

namespace App\Providers;

use App\Helper\Common\AuthHelper;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->modelBinding();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function ( Request $request ) {

            if ( AuthHelper::permission($request) )
                return Limit::perMinute(60)->by($request->ip());


            // TODO : Eğer auth key doğru olmadan dakikada 30 isteği aşarsa 1 saat engellenecek.
            $limit               = Limit::perMinute(30)->by($request->ip());
            $limit->decayMinutes = 60;
            return $limit;
        });
    }

    protected function modelBinding()
    {
        Route::bind('all_user_find', function ($id) {
            return User::withTrashed()->findOrFail($id);
        });
    }
}
