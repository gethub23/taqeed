<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StationRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','station_id'];
    
    /**
     * Get the station that owns the StationRole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }
}