<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use UploadTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','phone' ,'logo' , 'latitude' , 'longitude' , 'active' , 'block'];
    
    public function getLogoAttribute($value)
    {
        return asset('/storage/images/stations/'.$value);
    }

    public function setLogoAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['logo'] = $this->uploadAllTyps($value, 'stations');
        }
    }
    /**
     * Get all of the roles for the Station
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles()
    {
        return $this->hasMany(StationRole::class, 'station_id', 'id');
    }

    /**
     * Get all of the admins for the Station
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admins()
    {
        return $this->hasMany(StationAdmin::class, 'station_id', 'id');
    }
}
