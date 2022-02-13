<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'image' => asset("/uploads") . "/" . $this->img,
            'price' => number_format($this->price, 2),
            'category' => new CatResource($this->cat),
            'add_time' => $this->created_at

            
        ];
    }
}

