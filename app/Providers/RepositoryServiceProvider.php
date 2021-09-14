<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\ISeo;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IUser;
use App\Repositories\Interfaces\ISetting;

use App\Repositories\Eloquent\SeoRepository;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\SettingRepository;


use App\Repositories\Interfaces\IIntroSlider;
use App\Repositories\Eloquent\IntroSliderRepository;
use App\Repositories\Interfaces\IIntroService;
use App\Repositories\Eloquent\IntroServiceRepository;
use App\Repositories\Interfaces\IIntroFqsCategory;
use App\Repositories\Eloquent\IntroFqsCategoryRepository;
use App\Repositories\Interfaces\IIntroFqs;
use App\Repositories\Eloquent\IntroFqsRepository;
use App\Repositories\Interfaces\IIntroPartener;
use App\Repositories\Eloquent\IntroPartenerRepository;
use App\Repositories\Interfaces\IIntroMessages;
use App\Repositories\Eloquent\IntroMessagesRepository;
use App\Repositories\Interfaces\IIntroHowWork;
use App\Repositories\Eloquent\IntroHowWorkRepository;
use App\Repositories\Interfaces\IIntroSocial;
use App\Repositories\Eloquent\IntroSocialRepository;

use App\Repositories\Interfaces\ICity;
use App\Repositories\Eloquent\CityRepository;
use App\Repositories\Interfaces\INationality;
use App\Repositories\Eloquent\NationalityRepository;
use App\Repositories\Interfaces\IStation;
use App\Repositories\Eloquent\StationRepository;
use App\Repositories\Interfaces\IStationAdmin;
use App\Repositories\Eloquent\StationAdminRepository;
use App\Repositories\Interfaces\IStationRole;
use App\Repositories\Eloquent\StationRoleRepository;
use App\Repositories\Interfaces\ITank;
use App\Repositories\Eloquent\TankRepository;
use App\Repositories\Interfaces\IFuel;
use App\Repositories\Eloquent\FuelRepository;
use App\Repositories\Interfaces\IFuelPoint;
use App\Repositories\Eloquent\FuelPointRepository;
#clases_Definition_here

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->bind(IIntroSlider::class  , IntroSliderRepository::class   );
        $this->app->bind(IIntroService::class  , IntroServiceRepository::class   );
        $this->app->bind(IIntroFqsCategory::class  , IntroFqsCategoryRepository::class   );
        $this->app->bind(IIntroFqs::class  , IntroFqsRepository::class   );
        $this->app->bind(IIntroPartener::class  , IntroPartenerRepository::class   );
        $this->app->bind(IIntroMessages::class  , IntroMessagesRepository::class   );
        $this->app->bind(IIntroHowWork::class  , IntroHowWorkRepository::class   );
        $this->app->bind(IIntroSocial::class  , IntroSocialRepository::class   );
        $this->app->bind(ICity::class  , CityRepository::class   );
        $this->app->bind(INationality::class  , NationalityRepository::class   );
        $this->app->bind(IStation::class  , StationRepository::class   );
        $this->app->bind(IStationAdmin::class  , StationAdminRepository::class   );
        $this->app->bind(IStationRole::class  , StationRoleRepository::class   );
        $this->app->bind(ITank::class  , TankRepository::class   );
        $this->app->bind(IFuel::class  , FuelRepository::class   );
        $this->app->bind(IFuelPoint::class  , FuelPointRepository::class   );
        #connect_here 
        $this->app->bind(ISeo::class                   , SeoRepository::class                  );
        $this->app->bind(IUser::class                  , UserRepository::class                 );
        $this->app->bind(IRole::class                  , RoleRepository::class                 );
        $this->app->bind(ISetting::class               , SettingRepository::class              );

      }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
