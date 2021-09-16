<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ITank;
use App\Repositories\Interfaces\IShift;
use App\Repositories\Interfaces\IFuelPoint;
use App\Http\Requests\Api\Shifts\openShiftRequest;

class ShiftController extends Controller
{
    use Responses ; 
    
    protected $shift;
    protected $point;
    protected $tank;

    public function __construct(IShift $shift , IFuelPoint $point, ITank $tank)
    {
        $this->shift = $shift;
        $this->point = $point;
        $this->tank  = $tank;
    }


    public function openShift(openShiftRequest $request)
    {
        $tank      = $this->tank->findOrFail($request->tank_id) ; 
        $fuelPoint = $this->point->findOrFail($request->fuel_proint_id) ; 
        // check that fuel point avilable for use 
        if ($fuelPoint->status != 'available') 
            $this->response('fail' , __('apis.not_avilable_point')) ;  

        // check that fuel point that worker enter is correct  
        if ($fuelPoint->fuel_reading != $request->start_count) 
            $this->response('fail' , __('apis.wrong_read')) ;   

        // open shift for worker
        $shift = $this->model->store([
            'start_count'   => $request->start_count , 
            'status'        => 'progress' , 
            'station_id'    => $fuelPoint->station_id , 
            'worker_id'     => auth('worker')->id() , 
            'tank_id'       => $request->tank_id , 
            'fuel_point_id' => $request->fuel_point_id , 
            'fuel_id'       => $fuelPoint->fuel_id , 
        ]);
            
        
            
    }
}
