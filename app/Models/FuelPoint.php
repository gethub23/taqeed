<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FuelPoint extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = ['title','identity' ,'fuel_reading' , 'status' , 'station_id' , 'fuel_id'];
    
    /**
     * Get the station that owns the FuelPoint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    /**
     * Get the fuel that owns the FuelPoint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuel()
    {
        return $this->belongsTo(Fuel::class, 'fuel_id', 'id');
    }
}
