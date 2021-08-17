<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StationCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'call_letters' => $this->call_letters,
            'frequency' => $this->frequency,
            'format' => $this->format,
            'streaming_player' => $this->streaming_player,
            'website' => $this->website,
            'phone' => $this->phone,
            'email' => $this->email,
            'logo' => $this->logo
        ];
    }
}
