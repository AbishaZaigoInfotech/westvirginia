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
        $status = $this->status == 1 ? 'Active' : 'Inactive';
        return [
            'id' =>(string) $this->id,
            'title' => $this->title,
            'image' => asset($path.$this->image)
        ];
    }
}
