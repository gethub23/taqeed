<?php

namespace App\Repositories\Eloquent;

use App\Models\StationRole;
use App\Repositories\Interfaces\IStationRole;

class StationRoleRepository extends AbstractModelRepository implements IStationRole
{
    public function __construct(StationRole $model)
    {
        parent::__construct($model);
    }
}
