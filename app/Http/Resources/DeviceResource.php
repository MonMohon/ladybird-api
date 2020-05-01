<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
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
            'id' => $this->id,
            'device_name' => $this->device_name,
            'devices_image' => $this->devices_image,
            'devices_watt' => $this->devices_watt,
            'user' => $this->user,
            'location' => $this->location,
        ];
    }
}
