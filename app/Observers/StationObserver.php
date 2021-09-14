<?php

namespace App\Observers;

use File ;
use App\Models\Station;

class StationObserver
{
    /**
     * Handle the Station "created" event.
     *
     * @param \App\Station $Station
     * @return void
     */
    public function creating(Station $Station)
    {
       
    }

    public function created(Station $Station)
    {

    }

    /**
     * Handle the Station "updated" event.
     *
     * @param \App\Station $Station
     * @return void
     */

      public function updating (Station $Station)
    {
       if (request()->has('logo')) {
             if ($Station->getRawOriginal('logo') != 'default.png'){
                File::delete(public_path('/storage/images/stations/' . $Station->getRawOriginal('logo')));
             }
        }
    }
    public function updated(Station $Station)
    {

    }

    /**
     * Handle the Station "deleted" event.
     *
     * @param \App\Station $Station
     * @return void
     */
    public function deleted(Station $Station)
    {
        if ($Station->logo != 'default.png'){
            File::delete(public_path('/storage/images/stations/' . $Station->getRawOriginal('logo')));
        }
        
    }

    /**
     * Handle the Station "restored" event.
     *
     * @param \App\Station $Station
     * @return void
     */
    public function restored(Station $Station)
    {
        //
    }

    /**
     * Handle the Station "force deleted" event.
     *
     * @param \App\Station $Station
     * @return void
     */
    public function forceDeleted(Station $Station)
    {
        //
    }
}
