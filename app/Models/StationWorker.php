<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class StationWorker extends Model
{
    use UploadTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['avatar' , 'name','phone' ,'password' , 'identity' , 'work_time' , 'code' , 'code_expire' , 'active' , 'ban' , 'type' , 'station_id' , 'city_id' , 'nationality_id'];
    
    public function getAvatarAttribute($value)
    {
        return asset('/storage/images/stationworkers/'.$value);
    }

    public function setAvatarAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['image'] = $this->uploadAllTyps($value, 'stationworkers');
        }
    }

    /**
     * Get the city that owns the StationWorker
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * Get the user that owns the StationWorker
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id');
    }

}
