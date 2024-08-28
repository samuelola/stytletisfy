<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MultipleProductImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            "id" => $this->id,
            "uuid" => $this->uuid,
            "title" => $this->description,
            "image" => $this->image,
            "price" => $this->price,
            "size"  => $this->size,
            "reviews" => $this->reviews,
            "sku"    => $this->sku,
            "stock_qty" => $this->stock_qty,
            "stock_status" => $this->stock_status,
            "product_rating" => $this->product_rating,
            "created_at"     => $this->created_at

        ];
    }
}
