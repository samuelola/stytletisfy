<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name" => $this->name,
            "team_size" => $this->team_size,
            "business_name" => $this->business_name,
            "business_email" => $this->business_email,
            "coporation_type" => $this->corperate_type
        ];
    }
}
