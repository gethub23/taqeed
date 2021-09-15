<?php

namespace App\Repositories\Eloquent;

use Carbon\Carbon;
use App\Traits\Responses;
use App\Models\StationWorker;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Repositories\Interfaces\IStationWorker;

class StationWorkerRepository extends AbstractModelRepository implements IStationWorker
{
    use Responses ; 
    
    public function __construct(StationWorker $model)
    {
        parent::__construct($model);
    }

    public function updateDeviceId($worker , $token ,  $request = [])
    {
        return $worker->tokens()->updateOrCreate([
            'token'         => $token ,  
            'device_id'     => $request['device_id'] ,  
            'device_type'   => $request['device_type'] ,  
        ]); 
    }

    public function forgetPassword($phone){
        $worker    = $this->model->where('phone',$phone)->first();
        if (!$worker) {
          $this->response('fail', trans('auth.incorrect_key_or_phone'));
        }
        $this->updateCode($worker);
        $this->response('success' ,__('auth.code_re_send') , ['token' => JWTAuth ::fromUser( $worker)] );
      }

    public function updateCode($worker){
        return $worker->updates()->updateOrCreate([
            'type'          => 'password' 
        ],[
            'code'          => 1234 ,
            'confirmed'     => false ,
            'code_expire'   => Carbon::now()->addMinute() , 
        ]);
    }

    public function checkChangePasswordCode($code)
    {
        $check =  auth('worker')->user()->updates()->where([
            'code' => $code , 
            'type' => 'password' , 
        ])->first();

        if (!$check) 
            $this->response('fail', trans('auth.code_invalid'));

        if ($check && $check->code_expire->isPast()) 
            $this->response('fail', trans('auth.code_expired'));

        $check->update(['confirmed' => true ]) ; 
        $this->response('success' ,__('auth.code_activated') , ['update_id' => $check->id] );
    }
}
