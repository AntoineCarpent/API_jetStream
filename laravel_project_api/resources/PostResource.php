<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->desription,
            'price' => $this->price,
            'stock' => $this->stock,
            'created_at' => $this->created_at,
        ];
    }
}
