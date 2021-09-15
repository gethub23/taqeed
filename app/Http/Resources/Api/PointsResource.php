<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PointsResource extends JsonResource
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
            'id'            => $this->id ,
            'name'          => $this->name ,
            'identity'      => $this->identity ,
            'fuel_reading'  => $this->fuel_reading ,
            'status'        => $this->status ,
            'fuel_id'       => $this->fuel_id ,
            'fuel'          => $this->fuel->name ,
        ];
    }
}
