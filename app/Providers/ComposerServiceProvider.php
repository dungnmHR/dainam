<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('admin.doitac.*', function ($view) {
            $view->with(['flag'=>'doitac', 'url_add_new' => route('doitac.create'), 'url_list' => route('doitac.index')]);
        });
        View::composer('admin.tinh.*', function ($view) {
            $view->with(['flag'=>'tinh', 'url_add_new' => route('tinh.create'), 'url_list' => route('tinh.index')]);
        });
        View::composer('admin.huyen.*', function ($view) {
            $view->with(['flag'=>'huyen', 'url_add_new' => route('huyen.create'), 'url_list' => route('huyen.index')]);
        });
        View::composer('admin.truong.*', function ($view) {
            $view->with(['flag'=>'truong', 'url_add_new' => route('truong.create'), 'url_list' => route('truong.index')]);
        });
        View::composer('admin.tohopxt.*', function ($view) {
            $view->with(['flag'=>'tohopxt', 'url_add_new' => route('tohopxt.create'), 'url_list' => route('tohopxt.index')]);
        });
        View::composer('admin.nganhxt.*', function ($view) {
            $view->with(['flag'=>'nganhxt', 'url_add_new' => route('nganhxt.create'), 'url_list' => route('nganhxt.index')]);
        });
        View::composer('admin.bang-tin', function ($view) {
            $view->with('flag', 'bangtin');
        });
    }
}
