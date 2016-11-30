<?php
/**
* author: smuwanga of METS/MUSPH
* 
*/
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UtilitiesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path().'/Utils/*.php') as $filename){
            require_once($filename);
        }
    }
}
