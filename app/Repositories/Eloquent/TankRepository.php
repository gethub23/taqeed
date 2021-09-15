<?php

namespace App\Repositories\Eloquent;

use App\Models\Tank;
use App\Repositories\Interfaces\ITank;

class TankRepository extends AbstractModelRepository implements ITank
{
    public function __construct(Tank $model)
    {
        parent::__construct($model);
    }

    public function activeTanks($station_id)
    {
        return $this->model->where(['status' => 'active' , 'station_id' => $station_id])->orderBy('current_capacity' , 'ASC')->get()->unique('fuel_id'); 
        
    }
}
