<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'discount',
            'id' => $this->id,
            'attributes' => [
                // 'name' => $this->ticket->discount->name,
                // 'description' => $this->description,
                // 'percentage' => $this->percentage,

            ]
            ];
    }
}
