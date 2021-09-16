<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['start_count','end_count' ,'liters' , 'liter_price' , 'total_price' , 'cash_price','network_price' , 'type' , 'status' , 'station_id' , 'worker_id','supervisor_id' , 'tank_id' , 'fuel_point_id' , 'fuel_id'];

    /**
     * Get the station that owns the Shift
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuel()
    {
        return $this->belongsTo(Fuel::class, 'fuel_id', 'id');
    }
    /**
     * Get the station that owns the Shift
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }
    /**
     * Get the tank that owns the Shift
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuelPoint()
    {
        return $this->belongsTo(FuelPoint::class, 'fuel_point_id', 'id');
    }
    /**
     * Get the tank that owns the Shift
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tank()
    {
        return $this->belongsTo(Tank::class, 'tank_id', 'id');
    }
    /**
     * Get the supervisor that owns the Shift
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supervisor()
    {
        return $this->belongsTo(StationWorker::class, 'supervisor_id', 'id');
    }

    /**
     * Get the worker that owns the Shift
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker(): BelongsTo
    {
        return $this->belongsTo(StationWorker::class, 'worker_id', 'id');
    }
    

}
