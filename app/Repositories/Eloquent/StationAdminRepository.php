<?php

namespace App\Repositories\Eloquent;

use App\Models\StationAdmin;
use App\Repositories\Interfaces\IStationAdmin;

class StationAdminRepository extends AbstractModelRepository implements IStationAdmin
{
    public function __construct(StationAdmin $model)
    {
        parent::__construct($model);
    }
}
