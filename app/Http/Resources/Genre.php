<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Genre extends JsonResource
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
            'name' => $this->name,
            'image_name' => $this->image_name
        ];
    }
}
