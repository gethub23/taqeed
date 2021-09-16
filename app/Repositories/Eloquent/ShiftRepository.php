<?php

namespace App\Repositories\Eloquent;

use App\Models\Shift;
use App\Repositories\Interfaces\IShift;

class ShiftRepository extends AbstractModelRepository implements IShift
{
    public function __construct(Shift $model)
    {
        parent::__construct($model);
    }
}
