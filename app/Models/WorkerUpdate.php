<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkerUpdate extends Model
{
    protected $fillable = ['type','code','new_phone','code_expire','confirmed','station_worker_id'];
    protected $dates = ['code_expire'];

}
