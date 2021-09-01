<?php

namespace App\Providers;

use App\Models\User;

use App\Models\IntroSlider;
use App\Models\IntroHowWork;
use App\Observers\UserObserver;
use App\Observers\IntroObserver;
use App\Observers\IntroSliderObserver;
use App\Observers\IntroHowWorkObserver;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User           ::observe(UserObserver::class);
        // Intro          ::observe(IntroObserver::class);
        IntroHowWork   ::observe(IntroHowWorkObserver::class);
        IntroSlider    ::observe(IntroSliderObserver::class);
         view()->composer('*', function ($view) 
            {
                
            });            
        // -------------- lang ---------------- \\
            app()->singleton('lang', function (){
                if ( session() -> has( 'lang' ) )
                    return session( 'lang' );
                else
                    return 'ar';

            });
        // -------------- lang ---------------- \\
    }
}
