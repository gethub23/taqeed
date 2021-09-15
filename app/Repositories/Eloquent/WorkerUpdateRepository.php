<?php

namespace App\Repositories\Eloquent;

use App\Models\WorkerUpdate;
use App\Repositories\Interfaces\IWorkerUpdate;

class WorkerUpdateRepository extends AbstractModelRepository implements IWorkerUpdate
{
    public function __construct(WorkerUpdate $model)
    {
        parent::__construct($model);
    }
}
