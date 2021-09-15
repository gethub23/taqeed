<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'avatar'            => $this->avatar   , 
            'name'              => $this->name , 
            'phone'             => $this->phone , 
            'identity'          => $this->identity , 
            'work_time'         => $this->work_time , 
            'active'            => $this->active ? true : false , 
            'ban'               => $this->ban ? true : false , 
            'station_id'        => $this->station_id , 
            'station'           => $this->station->name , 
            'city_id'           => $this->city_id , 
            'city'              => $this->city->name , 
            'nationality_id'    => $this->nationality_id , 
            'nationality'       => $this->nationality->name , 
            'type'              => $this->type , 
            'token'             => $this->token
        ];
    }
}
