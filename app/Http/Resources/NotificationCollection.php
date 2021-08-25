<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class NotificationCollection extends JsonResource
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
            'id' =>(string) $this->id,
            'title' => $this->title,
            'message' => $this->message,
        ];
    }
}
