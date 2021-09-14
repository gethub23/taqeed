<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','capacity','current_capacity','status','station_id','fuel_id'];
    
    /**
     * Get the station that owns the Tank
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }
    /**
     * Get the fuel that owns the Tank
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuel()
    {
        return $this->belongsTo(Fuel::class, 'fuel_id', 'id');
    }

}
