<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $baseNamespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/manage/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapAuthRoutes();

        $this->mapPageRoutes();

        $this->mapManageRoutes();
    }

    /**
     * Define the "auth" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        Route::middleware('web')
            ->namespace($this->baseNamespace . '\Auth')
            ->prefix('/auth')
            ->name('auth.')
            ->group(base_path('routes/auth.php'));
    }

    /**
     * Define the "page" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPageRoutes()
    {
        Route::middleware('web')
            ->namespace($this->baseNamespace . '\Pages')
            ->name('pages.')
            ->group(base_path('routes/pages.php'));
    }

    /**
     * Define the "management" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapManageRoutes()
    {
        Route::middleware('web', 'auth')
            ->namespace($this->baseNamespace . '\Manage')
            ->prefix('/manage')
            ->name('manage.')
            ->group(base_path('routes/manage.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->baseNamespace)
            ->group(base_path('routes/api.php'));
    }
}
