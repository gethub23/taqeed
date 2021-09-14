<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class StationAdmin extends Model
{
    use UploadTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['avatar' , 'name','phone','email','password','identity','block','active','type','nationality_id','city_id','station_role_id','station_id'];
    
    /**
     * Get the nationality that owns the StationAdmin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id');
    }
    /**
     * Get the city that owns the StationAdmin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    /**
     * Get the stationRole that owns the StationAdmin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stationRole()
    {
        return $this->belongsTo(StationRole::class, 'station_role_id', 'id');
    }

    /**
     * Get the station that owns the StationAdmin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    public function getAvatarAttribute($value)
    {
        return asset('/storage/images/stationadmins/'.$value);
    }

    public function setAvatarAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['avatar'] = $this->uploadAllTyps($value, 'stationadmins');
        }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
