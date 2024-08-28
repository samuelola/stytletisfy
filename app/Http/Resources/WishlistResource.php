<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->id,
            'price' => $this->price,
            'qty'   => $this->qty,
            'product' => new ProductResource($this->product),
            'user'    => new ProductUserResource($this->user),
             
        ];
    }
}
