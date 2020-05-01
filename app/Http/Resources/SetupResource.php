<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SetupResource extends JsonResource
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
            'contact_date' => $this->provider_contact_date,
            'wifi_name' => $this->wifi_name,
            'wifi_password' => $this->wifi_password,
            'user' => $this->user,
            'provider' => $this->provider,
            'meter' => $this->meter,
        ];
    }
}
