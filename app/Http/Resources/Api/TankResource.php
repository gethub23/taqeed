<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TankResource extends JsonResource
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
            'id'                => $this->id , 
            'name'              => $this->name , 
            'capacity'          => (int) $this->capacity , 
            'current_capacity'  => (int) $this->current_capacity , 
            'capacity_ratio'    =>  (100 * $this->current_capacity / $this->capacity) , 
            'status'            => $this->status , 
            'fuel_id'           => $this->fuel_id , 
            'fuel'              => $this->fuel->name , 
        ];;
    }
}
