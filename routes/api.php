<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix'                  => 'v1'  , 'namespace' => 'Api\V1']  , function () {

    Route::group(['middleware'          => ['localization']]                 , function (){
        // public routes 
            // auth controller
            Route::post('sign-in'                ,'AuthController@signIn'                                   );
            // forget password send code
            Route::post('forget-password'        ,'AuthController@forgetPassword'                           );
        // public routes 

        // optional auth routes 
            Route::group(['middleware'           => ['jwtOptional']], function (){
            
            });
        // optional auth routes 

        // auth routes 
            Route::group(['middleware'               => ['jwt']]             , function (){
                // logout
                Route::post('logout'             , 'AuthController@Logout'                                  );
                //  reset password
                Route::post('reset-password/{id}','AuthController@resetPassword'                            );
                //  resend code
                Route::get('resend-code'         ,'AuthController@resendcode'                               );
                //  reset password
                Route::post('check-change-password-code' ,'AuthController@checkChangePasswordCode'          );
                //  resend activation code
                Route::post('resendCode'         ,'AuthController@resendCode'                               );
                //  activate user account
                Route::post('activate'           ,'AuthController@activate'                                 );
                //  profile
                Route::post('profile'            ,'AuthController@profile'                                  );
                // tanks 
                Route::get('tanks'               ,'TankController@tanks'                                    );
                // fuel Points 
                Route::get('fuel-points/{id}'    ,'FuelPointController@fuelPoints'                          );

                // only worker can do this actions **worker midelware**
                Route::group(['middleware'          => ['worker']]                 , function (){
                    // open new shift 
                    Route::post('open-shift'     ,'ShiftController@openShift'                               );
                    
                });
                // only worker can do this actions **worker midelware**
            });


        // auth routes 
    });

 });
