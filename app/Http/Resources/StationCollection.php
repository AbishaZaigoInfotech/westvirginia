<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;
use App\Http\Resources\StationCategoryCollection;

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
        $status = $this->status == 1 ? 'Active' : 'Inactive';
        $path = 'storage/images/';
        $id = $this->id;
        $category = StationCategoryCollection::collection($this->stationCategory);
        $image = ($this->logo == NULL) ? asset($path.'image_1630480430_612f282e51057.png') : asset($path.$this->logo);
        return [
            'id' =>(string) $this->id,
            'name' => $this->name,
            'call_letters' => $this->call_letters,
            'frequency' => $this->frequency,
            'format' => $category,
            'streaming_player' => $this->streaming_player,
            'website' => $this->website,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' =>  $status,
            'logo' => $image
        ];
    }
}
