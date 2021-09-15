<?php

use Illuminate\Support\Facades\Route;

//Auth::loginUsingId(1) ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Cache-Control, 'max-age=100', Content-Type, Accept");
header("Access-Control-Allow-Headers: Cache-Control, max-age=31536000");

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/lang/{lang}'                 , 'AuthController@SetLanguage');

    Route::get('login', 'AuthController@showLoginForm')->name('show.login');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout')->name('logout');



    Route::group(['middleware' => ['admin', 'check-role','admin-lang']], function () {

        /*------------ start Of Dashboard----------*/
            Route::get('dashboard', [
                'uses'      => 'HomeController@dashboard',
                'as'        => 'dashboard',
                'icon'      => '<i class="la la-home"></i>',
                'title'     => 'الرئيسيه',
                'type'      => 'parent'
            ]);
        /*------------ end Of dashboard ----------*/
        
        /*------------ start Of intro site  ----------*/
            Route::get('intro-site', [
                'as'        => 'intro_site',
                'icon'      => '<i class="la la-image"></i>',
                'title'     => 'الموقع التعريفي',
                'type'      => 'parent',
                'sub_route' => true,
                'child'     => [
                    'intro_settings.index','introsliders.index','introsliders.store', 'introsliders.update', 'introsliders.delete' ,'introsliders.deleteAll',
                    'introservices.index','introservices.store', 'introservices.update', 'introservices.delete' ,'introservices.deleteAll',
                    'introfqscategories.index','introfqscategories.store', 'introfqscategories.update', 'introfqscategories.delete' ,'introfqscategories.deleteAll' ,
                    'introfqs.index','introfqs.store', 'introfqs.update', 'introfqs.delete' ,'introfqs.deleteAll',
                    'introparteners.index','introparteners.store', 'introparteners.update', 'introparteners.delete' ,'introparteners.deleteAll' ,
                    'intromessages.index', 'intromessages.delete' ,'intromessages.deleteAll',
                    'introsocials.index','introsocials.store', 'introsocials.update', 'introsocials.delete' ,'introsocials.deleteAll',
                    'introhowworks.index','introhowworks.store', 'introhowworks.update', 'introhowworks.delete' ,'introhowworks.deleteAll',
                ]
            ]);

            Route::get('intro-settings', [
                'uses'      => 'IntroSetting@index',
                'as'        => 'intro_settings.index',
                'title'     => 'اعدادات الموقع التعريفي',
                'icon'      => '<i class="ft-settings icon-left"></i>',
            ]);

            /*------------ start Of introsliders ----------*/
                Route::get('introsliders', [
                    'uses'      => 'IntroSliderController@index',
                    'as'        => 'introsliders.index',
                    'title'     => 'بنرات الاسلايدر',
                    'icon'      => '<i class="la la-image"></i>',
                ]);

                # introsliders store
                Route::post('introsliders/store', [
                    'uses'  => 'IntroSliderController@store',
                    'as'    => 'introsliders.store',
                    'title' => ' اضافة بنر'
                ]);

                # introsliders update
                Route::put('introsliders/{id}', [
                    'uses'  => 'IntroSliderController@update',
                    'as'    => 'introsliders.update',
                    'title' => 'تحديث بنر'
                ]);

                # introsliders delete
                Route::delete('introsliders/{id}', [
                    'uses'  => 'IntroSliderController@destroy',
                    'as'    => 'introsliders.delete',
                    'title' => 'حذف بنر'
                ]);

                #delete all introsliders
                Route::post('delete-all-introsliders', [
                    'uses'  => 'IntroSliderController@destroyAll',
                    'as'    => 'introsliders.deleteAll',
                    'title' => 'حذف مجموعه من بنرات'
                ]);
            /*------------ end Of introsliders ----------*/

            /*------------ start Of introservices ----------*/
                Route::get('introservices', [
                    'uses'      => 'IntroServiceController@index',
                    'as'        => 'introservices.index',
                    'title'     => 'خدماتنا',
                    'icon'      => '<i class="la la-map"></i>',
                ]);

                # introservices store
                Route::post('introservices/store', [
                    'uses'  => 'IntroServiceController@store',
                    'as'    => 'introservices.store',
                    'title' => ' اضافة خدمه'
                ]);

                # introservices update
                Route::put('introservices/{id}', [
                    'uses'  => 'IntroServiceController@update',
                    'as'    => 'introservices.update',
                    'title' => 'تحديث خدمه'
                ]);

                # introservices delete
                Route::delete('introservices/{id}', [
                    'uses'  => 'IntroServiceController@destroy',
                    'as'    => 'introservices.delete',
                    'title' => 'حذف خدمه'
                ]);

                #delete all introservices
                Route::post('delete-all-introservices', [
                    'uses'  => 'IntroServiceController@destroyAll',
                    'as'    => 'introservices.deleteAll',
                    'title' => 'حذف مجموعه من خدماتنا'
                ]);
            /*------------ end Of introservices ----------*/

            /*------------ start Of introfqscategories ----------*/
                Route::get('introfqscategories', [
                    'uses'      => 'IntroFqsCategoryController@index',
                    'as'        => 'introfqscategories.index',
                    'title'     => 'اقسام الاسئله الشائعة',
                    'icon'      => '<i class="la la-list"></i>',
                ]);

                # introfqscategories store
                Route::post('introfqscategories/store', [
                    'uses'  => 'IntroFqsCategoryController@store',
                    'as'    => 'introfqscategories.store',
                    'title' => ' اضافة سؤال'
                ]);

                # introfqscategories update
                Route::put('introfqscategories/{id}', [
                    'uses'  => 'IntroFqsCategoryController@update',
                    'as'    => 'introfqscategories.update',
                    'title' => 'تحديث سؤال'
                ]);

                # introfqscategories delete
                Route::delete('introfqscategories/{id}', [
                    'uses'  => 'IntroFqsCategoryController@destroy',
                    'as'    => 'introfqscategories.delete',
                    'title' => 'حذف سؤال'
                ]);

                #delete all introfqscategories
                Route::post('delete-all-introfqscategories', [
                    'uses'  => 'IntroFqsCategoryController@destroyAll',
                    'as'    => 'introfqscategories.deleteAll',
                    'title' => 'حذف مجموعه من اسئله شائعة'
                ]);
            /*------------ end Of introfqscategories ----------*/

            /*------------ start Of introfqs ----------*/
                Route::get('introfqs', [
                    'uses'      => 'IntroFqsController@index',
                    'as'        => 'introfqs.index',
                    'title'     => 'الاسئله الشائعه',
                    'icon'      => '<i class="la la-bullhorn"></i>',
                ]);

                # introfqs store
                Route::post('introfqs/store', [
                    'uses'  => 'IntroFqsController@store',
                    'as'    => 'introfqs.store',
                    'title' => ' اضافة سؤال'
                ]);

                # introfqs update
                Route::put('introfqs/{id}', [
                    'uses'  => 'IntroFqsController@update',
                    'as'    => 'introfqs.update',
                    'title' => 'تحديث سؤال'
                ]);

                # introfqs delete
                Route::delete('introfqs/{id}', [
                    'uses'  => 'IntroFqsController@destroy',
                    'as'    => 'introfqs.delete',
                    'title' => 'حذف سؤال'
                ]);

                #delete all introfqs
                Route::post('delete-all-introfqs', [
                    'uses'  => 'IntroFqsController@destroyAll',
                    'as'    => 'introfqs.deleteAll',
                    'title' => 'حذف مجموعه من الاسئله الشائعه'
                ]);
            /*------------ end Of introfqs ----------*/
            
            /*------------ start Of introparteners ----------*/
                Route::get('introparteners', [
                    'uses'      => 'IntroPartenerController@index',
                    'as'        => 'introparteners.index',
                    'title'     => 'شركاء النجاح',
                    'icon'      => '<i class="la la-list"></i>',
                ]);

                # introparteners store
                Route::post('introparteners/store', [
                    'uses'  => 'IntroPartenerController@store',
                    'as'    => 'introparteners.store',
                    'title' => ' اضافة شريك'
                ]);

                # introparteners update
                Route::put('introparteners/{id}', [
                    'uses'  => 'IntroPartenerController@update',
                    'as'    => 'introparteners.update',
                    'title' => 'تحديث شريك'
                ]);

                # introparteners delete
                Route::delete('introparteners/{id}', [
                    'uses'  => 'IntroPartenerController@destroy',
                    'as'    => 'introparteners.delete',
                    'title' => 'حذف شريك'
                ]);

                #delete all introparteners
                Route::post('delete-all-introparteners', [
                    'uses'  => 'IntroPartenerController@destroyAll',
                    'as'    => 'introparteners.deleteAll',
                    'title' => 'حذف مجموعه من شركاء النجاح'
                ]);
            /*------------ end Of introparteners ----------*/

            /*------------ start Of intromessages ----------*/
                Route::get('intromessages', [
                    'uses'      => 'IntroMessagesController@index',
                    'as'        => 'intromessages.index',
                    'title'     => 'رسائل العملاء',
                    'icon'      => '<i class="la la-envelope-square"></i>',
                ]);

                # intromessages delete
                Route::delete('intromessages/{id}', [
                    'uses'  => 'IntroMessagesController@destroy',
                    'as'    => 'intromessages.delete',
                    'title' => 'حذف رسالة'
                ]);

                #delete all intromessages
                Route::post('delete-all-intromessages', [
                    'uses'  => 'IntroMessagesController@destroyAll',
                    'as'    => 'intromessages.deleteAll',
                    'title' => 'حذف مجموعه من رسائل العملاء'
                ]);
            /*------------ end Of intromessages ----------*/

            /*------------ start Of introsocials ----------*/
                Route::get('introsocials', [
                    'uses'      => 'IntroSocialController@index',
                    'as'        => 'introsocials.index',
                    'title'     => 'وسائل التواصل',
                    'icon'      => '<i class="la la-facebook"></i>',
                ]);

                # introsocials store
                Route::post('introsocials/store', [
                    'uses'  => 'IntroSocialController@store',
                    'as'    => 'introsocials.store',
                    'title' => ' اضافة وسيلة'
                ]);

                # introsocials update
                Route::put('introsocials/{id}', [
                    'uses'  => 'IntroSocialController@update',
                    'as'    => 'introsocials.update',
                    'title' => 'تحديث وسيلة'
                ]);

                # introsocials delete
                Route::delete('introsocials/{id}', [
                    'uses'  => 'IntroSocialController@destroy',
                    'as'    => 'introsocials.delete',
                    'title' => 'حذف وسيلة'
                ]);

                #delete all introsocials
                Route::post('delete-all-introsocials', [
                    'uses'  => 'IntroSocialController@destroyAll',
                    'as'    => 'introsocials.deleteAll',
                    'title' => 'حذف مجموعه من وسائل التواصل'
                ]);
            /*------------ end Of introsocials ----------*/

            /*------------ start Of introhowworks ----------*/
                Route::get('introhowworks', [
                    'uses'      => 'IntroHowWorkController@index',
                    'as'        => 'introhowworks.index',
                    'title'     => 'كيف نعمل',
                    'icon'      => '<i class="la la-calendar-check-o"></i>',
                ]);

                # introhowworks store
                Route::post('introhowworks/store', [
                    'uses'  => 'IntroHowWorkController@store',
                    'as'    => 'introhowworks.store',
                    'title' => ' اضافة خطوه'
                ]);

                # introhowworks update
                Route::put('introhowworks/{id}', [
                    'uses'  => 'IntroHowWorkController@update',
                    'as'    => 'introhowworks.update',
                    'title' => 'تحديث خطوه'
                ]);

                # introhowworks delete
                Route::delete('introhowworks/{id}', [
                    'uses'  => 'IntroHowWorkController@destroy',
                    'as'    => 'introhowworks.delete',
                    'title' => 'حذف خطوه'
                ]);

                #delete all introhowworks
                Route::post('delete-all-introhowworks', [
                    'uses'  => 'IntroHowWorkController@destroy',
                    'as'    => 'introhowworks.deleteAll',
                    'title' => 'حذف مجموعه من كيف نعمل'
                ]);
            /*------------ end Of introhowworks ----------*/
            
        /*------------ end Of intro site ----------*/

        /*------------ start Of cities ----------*/
            Route::get('cities', [
                'uses'      => 'CityController@index',
                'as'        => 'cities.index',
                'title'     => 'المدن',
                'icon'      => '<i class="la la-flag"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'cities.store', 'cities.update', 'cities.delete'  ,'cities.deleteAll' ,]
            ]);

            # cities store
            Route::post('cities/store', [
                'uses'  => 'CityController@store',
                'as'    => 'cities.store',
                'title' => ' اضافة مدينة'
            ]);

            # cities update
            Route::put('cities/{id}', [
                'uses'  => 'CityController@update',
                'as'    => 'cities.update',
                'title' => 'تحديث مدينة'
            ]);

            # cities delete
            Route::delete('cities/{id}', [
                'uses'  => 'CityController@destroy',
                'as'    => 'cities.delete',
                'title' => 'حذف مدينة'
            ]);
            #delete all cities
            Route::post('delete-all-cities', [
                'uses'  => 'CityController@destroy',
                'as'    => 'cities.deleteAll',
                'title' => 'حذف مجموعه من المدن'
            ]);
        /*------------ end Of cities ----------*/

        /*------------ start Of nationalities ----------*/
            Route::get('nationalities', [
                'uses'      => 'NationalityController@index',
                'as'        => 'nationalities.index',
                'title'     => 'الجنسيات',
                'icon'      => '<i class="la la-files-o"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'nationalities.store', 'nationalities.update', 'nationalities.delete'  ,'nationalities.deleteAll' ,]
            ]);

            # nationalities store
            Route::post('nationalities/store', [
                'uses'  => 'NationalityController@store',
                'as'    => 'nationalities.store',
                'title' => ' اضافة جنسية'
            ]);

            # nationalities update
            Route::put('nationalities/{id}', [
                'uses'  => 'NationalityController@update',
                'as'    => 'nationalities.update',
                'title' => 'تحديث جنسية'
            ]);

            # nationalities delete
            Route::delete('nationalities/{id}', [
                'uses'  => 'NationalityController@destroy',
                'as'    => 'nationalities.delete',
                'title' => 'حذف جنسية'
            ]);
            #delete all nationalities
            Route::post('delete-all-nationalities', [
                'uses'  => 'NationalityController@destroy',
                'as'    => 'nationalities.deleteAll',
                'title' => 'حذف مجموعه من الجنسيات'
            ]);
        /*------------ end Of nationalities ----------*/
        
        /*------------ start Of stations ----------*/
            Route::get('stations', [
                'uses'      => 'StationController@index',
                'as'        => 'stations.index',
                'title'     => 'محطات البنزين',
                'icon'      => '<i class="la la-image"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'stations.store', 'stations.update', 'stations.delete'  ,'stations.deleteAll' ,
                                 'stationroles.index',
                                 'stationadmins.index',
                                 'tanks.index',
                                 'fuels.index',
                                 'fuelpoints.index',
                                 'stationworkers.index',
                                ]
            ]);

            # stations store
            Route::post('stations/store', [
                'uses'  => 'StationController@store',
                'as'    => 'stations.store',
                'title' => ' اضافة محطة'
            ]);

            # stations update
            Route::put('stations/{id}', [
                'uses'  => 'StationController@update',
                'as'    => 'stations.update',
                'title' => 'تحديث محطة'
            ]);

            # stations delete
            Route::delete('stations/{id}', [
                'uses'  => 'StationController@destroy',
                'as'    => 'stations.delete',
                'title' => 'حذف محطة'
            ]);
            #delete all stations
            Route::post('delete-all-stations', [
                'uses'  => 'StationController@destroy',
                'as'    => 'stations.deleteAll',
                'title' => 'حذف مجموعه من محطات البنزين'
            ]);

            /*------------ start Of fuelpoints ----------*/
                Route::get('fuelpoints/{id}', [
                    'uses'      => 'FuelPointController@index',
                    'as'        => 'fuelpoints.index',
                    'title'     => 'نقاط الوقود',
                ]);
            /*------------ end Of fuelpoints ----------*/

             /*------------ start Of stationroles ----------*/
                Route::get('stationroles/{id}', [
                    'uses'      => 'StationRoleController@index',
                    'as'        => 'stationroles.index',
                    'title'     => 'صلاحيات البنزينات',
                ]);
            /*------------ end Of stationroles ----------*/
            /*------------ start Of stationadmins ----------*/
                Route::get('stationadmins/{id}', [
                    'uses'      => 'StationAdminController@index',
                    'as'        => 'stationadmins.index',
                    'title'     => 'مديرين المحطات',
                ]);
            /*------------ end Of stationadmins ----------*/
            /*------------ start Of tanks ----------*/
                Route::get('tanks/{id}', [
                    'uses'      => 'TankController@index',
                    'as'        => 'tanks.index',
                    'title'     => 'الخزانات',
                ]);
            /*------------ end Of tanks ----------*/
            /*------------ start Of fuels ----------*/
                Route::get('fuels/{id}', [
                    'uses'      => 'FuelController@index',
                    'as'        => 'fuels.index',
                    'title'     => 'الوقود',
                ]);
            /*------------ end Of fuels ----------*/
            
            /*------------ start Of stationworkers ----------*/
                Route::get('stationworkers/{id}', [
                    'uses'      => 'StationWorkerController@index',
                    'as'        => 'stationworkers.index',
                    'title'     => 'عمال البنزينه',
                ]);
            /*------------ end Of stationworkers ----------*/
        /*------------ end Of stations ----------*/

        /*------------ start Of users Controller ----------*/

            Route::get('users', [
                'as'        => 'users',
                'icon'      => '<i class="la la-users"></i>',
                'title'     => 'المستخدمين',
                'type'      => 'parent',
                'sub_route' => true,
                'child'     => ['admins.update_profile','admins.index', 'admins.store', 'admins.update','admins.edit', 'admins.delete','admins.deleteAll',
                                'clients.index', 'clients.store', 'clients.update', 'clients.delete' ,'clients.notify' , 'clients.deleteAll']
            ]);

            /************ Admins ************/
                #show
                Route::get('admins/{id}/edit', [
                    'uses'  => 'AdminController@edit',
                    'as'    => 'admins.edit',
                    'title' => 'عرض الملف الشخصي'
                ]);

                #update profile
                Route::put('admins/update-profile/{id}', [
                    'uses'  => 'AdminController@updateProfile',
                    'as'    => 'admins.update_profile',
                    'title' =>  'تعديل الملف الشخصي'
                ]);

                #index
                Route::get('admins', [
                    'uses'  => 'AdminController@index',
                    'as'    => 'admins.index',
                    'title' => 'المشرفين',
                    'icon'  => '<i class="la la-user-secret"></i>',

                ]);

                #store
                Route::post('admins/store', [
                    'uses'  => 'AdminController@store',
                    'as'    => 'admins.store',
                    'title' => 'اضافة مشرف'
                ]);

                #update
                Route::put('admins/{id}', [
                    'uses'  => 'AdminController@update',
                    'as'    => 'admins.update',
                    'title' => 'تعديل مشرف'
                ]);

                #delete
                Route::delete('admins/{id}', [
                    'uses'  => 'AdminController@destroy',
                    'as'    => 'admins.delete',
                    'title' => 'حذف مشرف'
                ]);

                #delete
                Route::post('delete-all-admins', [
                    'uses'  => 'AdminController@destroyAll',
                    'as'    => 'admins.deleteAll',
                    'title' => 'حذف مجموعه من المشرفين'
                ]);

            /************ #Admins ************/

            /************ Clients ************/
                #index
                Route::get('clients', [
                    'uses'  => 'ClientController@index',
                    'as'    => 'clients.index',
                    'title' => 'العملاء',
                    'icon'  => '<i class="la la-user"></i>',

                ]);
                #store
                Route::post('clients/store', [
                    'uses'  => 'ClientController@store',
                    'as'    => 'clients.store',
                    'title' => 'اضافة عميل'
                ]);

                #update
                Route::put('clients/{id}', [
                    'uses'  => 'ClientController@update',
                    'as'    => 'clients.update',
                    'title' => 'تعديل عميل'
                ]);

                #delete
                Route::delete('clients/{id}', [
                    'uses'  => 'ClientController@destroy',
                    'as'    => 'clients.delete',
                    'title' => 'حذف عميل'
                ]);

                #delete
                Route::post('delete-all-clients', [
                    'uses'  => 'ClientController@destroyAll',
                    'as'    => 'clients.deleteAll',
                    'title' => 'حذف مجموعه من العملاء'
                ]);

                #notify
                Route::post('admins/clients/notify', [
                    'uses'  => 'ClientController@notify',
                    'as'    => 'clients.notify',
                    'title' => 'ارسال اشعار للعملاء'
                ]);
            /************ #Clients ************/
        /*------------ end Of users Controller ----------*/

        /*------------ start Of seos ----------*/
             Route::get('seos', [
                 'uses'      => 'SeoController@index',
                 'as'        => 'seos.index',
                 'title'     => 'سيو',
                 'icon'      => '<i class="la la-google"></i>',
                 'type'      => 'parent',
                 'sub_route' => false,
                 'child'     => [ 'seos.store', 'seos.update', 'seos.delete' , 'seos.deleteAll']
             ]);

             #store
             Route::post('seos/store', [
                 'uses'  => 'SeoController@store',
                 'as'    => 'seos.store',
                 'title' => ' اضافة سيو'
             ]);

             #update
             Route::put('seos/{id}', [
                 'uses'  => 'SeoController@update',
                 'as'    => 'seos.update',
                 'title' => 'تحديث سيو'
             ]);

             #deletّe
             Route::delete('seos/{id}', [
                 'uses'  => 'SeoController@destroy',
                 'as'    => 'seos.delete',
                 'title' => 'حذف سيو'
             ]);
            #delete
            Route::post('delete-all-seos', [
                'uses'  => 'SeoController@destroyAll',
                'as'    => 'seos.deleteAll',
                'title' => 'حذف مجموعه من السيو'
            ]);
        /*------------ end Of seos ----------*/

        /*------------ start Of statistics ----------*/
            Route::get('statistics', [
                'uses'      => 'StatisticsController@index',
                'as'        => 'statistics.index',
                'title'     => 'الاحصائيات',
                'icon'      => '<i class="la la-bar-chart-o"></i>',
                'type'      => 'parent',
                'sub_route' => []
            ]);
        /*------------ end Of statistics ----------*/

        /*------------ start Of Roles----------*/
            Route::get('roles', [
                'uses'      => 'RoleController@index',
                'as'        => 'roles.index',
                'title'     => 'قائمة الصلاحيات',
                'icon'      => '<i class="la la-eye"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => ['roles.create', 'roles.store', 'roles.edit', 'roles.update', 'roles.delete']
            ]);

            #add role page
            Route::get('roles/create', [
                'uses'  => 'RoleController@create',
                'as'    => 'roles.create',
                'title' => 'اضافة صلاحيه',

            ]);

            #store role
            Route::post('roles/store', [
                'uses' => 'RoleController@store',
                'as' => 'roles.store',
                'title' => 'تمكين اضافة صلاحيه'
            ]);

            #edit role page
            Route::get('roles/{id}/edit', [
                'uses' => 'RoleController@edit',
                'as' => 'roles.edit',
                'title' => 'تعديل صلاحيه'
            ]);

            #update role
            Route::put('roles/{id}', [
                'uses' => 'RoleController@update',
                'as' => 'roles.update',
                'title' => 'تمكين تعديل صلاحيه'
            ]);

            #delete role
            Route::delete('roles/{id}', [
                'uses' => 'RoleController@destroy',
                'as' => 'roles.delete',
                'title' => 'حذف صلاحيه'
            ]);
        /*------------ end Of Roles----------*/

        /*------------ start Of Settings ----------*/
            Route::get('settings', [
                'uses'      => 'SettingController@index',
                'as'        => 'settings.index',
                'title'     => 'الاعدادات',
                'icon'      => '<i class="ft-settings icon-left"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => ['settings.update','settings.message.all','settings.message.one','settings.send_email']
            ]);

            #update
            Route::put('settings', [
                'uses' => 'SettingController@update',
                'as' => 'settings.update',
                'title' => 'تحديث الاعدادات'
            ]);

            #message all
            Route::post('settings/{type}/message-all', [
                'uses'  => 'SettingController@messageAll',
                'as'    => 'settings.message.all',
                'title' => 'مراسلة الجميع'
            ])->where('type','email|sms|notification');

            #message one
            Route::post('settings/{type}/message-one', [
                'uses'  => 'SettingController@messageOne',
                'as'    => 'settings.message.one',
                'title' => 'مراسلة مستخدم'
            ])->where('type','email|sms|notification');

            #send email
            Route::post('settings/send-email', [
                'uses'  => 'SettingController@sendEmail',
                'as'    => 'settings.send_email',
                'title' => 'ارسال ايميل'
            ]);
        /*------------ end Of Settings ----------*/
        #new_routes_here
                     
                     
                     
                     
    });

});

// lang route