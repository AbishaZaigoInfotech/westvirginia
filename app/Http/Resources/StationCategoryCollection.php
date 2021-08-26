<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class StationCategoryCollection extends JsonResource
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
        $id = $this->category ? $this->category->id : '';
        return [
            'id' => $id,
            'name' => $category,
        ];
    }
}
