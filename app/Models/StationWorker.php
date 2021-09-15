<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class StationWorker extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use UploadTrait;

    protected $guarded      = ['id'];

    protected $hidden       = [
        'password',
    ];

    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['avatar' , 'name','phone' ,'password' , 'identity' , 'work_time' , 'code' , 'code_expire' , 'active' , 'ban' , 'type' , 'station_id' , 'city_id' , 'nationality_id' , 'token'];
    
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

    /**
     * Get the station that owns the StationWorker
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    /**
     * Get all of the WorkerToken for the StationWorker
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(WorkerToken::class, 'station_worker_id', 'id');
    }

    /**
     * Get all of the updates for the StationWorker
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function updates()
    {
        return $this->hasMany(WorkerUpdate::class, 'station_worker_id', 'id');
    }
}
