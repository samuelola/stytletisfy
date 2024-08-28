<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserKycResource extends JsonResource
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
            "team_size" => $this->team_size,
            "business_name" =>  $this->business_name,
            "business_description" => $this->business_description,
            "corporation_type" => $this->corporation_type,
            "contact_email" => $this->contact_email,
            "contact_address" => $this->contact_address,
            "phone_number" => $this->phone_number,
            "created_at" => $this->created_at,
        ];
    }
}
