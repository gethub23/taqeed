<?php

namespace App\Repositories\Eloquent;

use App\Models\FuelPoint;
use App\Repositories\Interfaces\IFuelPoint;

class FuelPointRepository extends AbstractModelRepository implements IFuelPoint
{
    public function __construct(FuelPoint $model)
    {
        parent::__construct($model);
    }
}
