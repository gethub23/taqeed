<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ITank;
use App\Http\Resources\Api\TankResource;

class TankController extends Controller
{
    use Responses ; 
    protected $tank;

    public function __construct(ITank $tank)
    {
        $this->tank = $tank;
    }

    public function tanks()
    {
        $this->response('success' ,'' , TankResource::collection($this->tank->activeTanks(auth('worker')->user()->station_id)) );
    }
}
