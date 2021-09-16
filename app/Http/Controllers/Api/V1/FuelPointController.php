<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PointsResource;
use App\Repositories\Interfaces\IFuelPoint;

class FuelPointController extends Controller
{
    use Responses ; 
    
    protected $point;

    public function __construct(IFuelPoint $point)
    {
        $this->point = $point;
    }
    

    public function fuelPoints($fuel_id)
    {
       $points =  $this->point->where(['fuel_id' => $fuel_id ]) ; 
       $this->response('success' , '' , PointsResource::collection($points));
    }
}
