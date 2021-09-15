<?php

namespace App\Repositories\Eloquent;

use App\Models\StationWorker;
use App\Repositories\Interfaces\IStationWorker;

class StationWorkerRepository extends AbstractModelRepository implements IStationWorker
{
    public function __construct(StationWorker $model)
    {
        parent::__construct($model);
    }
}
