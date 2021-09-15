<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkerToken extends Model
{
    protected $fillable = ['token','device_id' ,'device_type' , 'station_worker_id'];
}
