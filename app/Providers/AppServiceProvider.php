<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use App\Models\Settings,App\Models\Articles,App\Models\Categories,App\Models\User;

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

      app()->singleton('setting',function() {
        return Settings::first();
      });


      app()->singleton('sidbar',function()
      {
        $articlesSidbar   = Articles::orderBy('created_at','desc')->paginate(4);
        $categories       = Categories::get();
        return view('front.sidbar.index',compact('articlesSidbar','categories'));
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
