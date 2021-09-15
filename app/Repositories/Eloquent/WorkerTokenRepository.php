<?php

namespace App\Repositories\Eloquent;

use App\Models\WorkerToken;
use App\Repositories\Interfaces\IWorkerToken;

class WorkerTokenRepository extends AbstractModelRepository implements IWorkerToken
{
    public function __construct(WorkerToken $model)
    {
        parent::__construct($model);
    }
}
