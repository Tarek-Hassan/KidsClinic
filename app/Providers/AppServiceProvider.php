<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\About;
use App\Setting;
use App\User;
use App\Article;

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
        //
        view()->composer('home.home', function ($view) {
            $about=About::first();
            $setting=Setting::first();
            $doctors=User::where('role','1')->get();
            $articles=Article::orderByDesc('created_at')->limit(3)->get();
           
            $view->with(['about'=>$about,'setting'=>$setting,'doctors'=>$doctors,'articles'=>$articles]);
          
        });
    }
}
