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
}
