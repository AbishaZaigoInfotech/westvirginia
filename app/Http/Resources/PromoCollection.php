<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class PromoCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $path = 'storage/images/';
        $image = ($this->image == NULL) ? asset($path.'image_1630480430_612f282e51057.png') : asset($path.$this->image);
        return [
            'id' =>(string) $this->id,
            'title' => $this->title,
            'image' => $image
        ];
    }
}
