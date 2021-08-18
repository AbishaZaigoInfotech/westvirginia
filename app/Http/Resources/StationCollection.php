<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

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
        $category = $this->category ? $this->category->label : '';
        $status = $this->status == 1 ? 'Active' : 'Inactive';
        $path = 'storage/images/';
        return [
            'id' =>(string) $this->id,
            'call_letters' => $this->call_letters,
            'frequency' => $this->frequency,
            'format' => $category,
            'streaming_player' => $this->streaming_player,
            'website' => $this->website,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' =>  $status,
            'logo' => asset($path.$this->logo)
        ];
    }
}
