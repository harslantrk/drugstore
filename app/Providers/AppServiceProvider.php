<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Auth;

use App\Modules;

use App\UserDelegation;
use App\Page;
use App\Setting;
use App\Contacts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Master blade İşlemi
        $modules=Modules::where('status','1')->where('parent_id','0')->orderBy('priority','asc')->get();
        $par_modules=Modules::where('status','1')->where('parent_id','>','0')->orderBy('priority','asc')->get();
        $mainMenu=Page::where('status','1')->where('cat_id','1')->orderBy('priority','asc')->get();
        $allSetting= Setting::find(1)->first();
        $allContact= Contacts::where('read','0')->where('status','1')->get();
        
        //son Master Blade İşlemi

        view()->share('modules', $modules);
        view()->share('par_modules', $par_modules);
        view()->share('mainMenu', $mainMenu);
        view()->share('allSetting',$allSetting);
        view()->share('allContact',$allContact);
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
