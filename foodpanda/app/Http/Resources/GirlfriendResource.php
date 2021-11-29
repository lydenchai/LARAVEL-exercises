<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GirlfriendResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "name" => $this -> name,
            "age" => $this -> age,
            "created_at" => $this -> created_at->format(' F,m,Y | h:i:s A '),
            "updated_at" => $this -> updated_at->format(' F,m,Y | h:i:s A ')
        ];
    }
}
