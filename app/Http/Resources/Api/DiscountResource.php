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
            'id' => $this->initData->id,
            'discount' => [
                'description' => $this->initData->description,
                'name' => $this->initData->name,
                'percentage' => $this->initData->percentage,
            ],
            'calculated_amount' => [
                'discounted_amount' => $this->discounted_amount,
                'grand_total' => $this->grand_total,
                'total_amount' => $this->total_amount,
            ],
            'fare' => new TransactionFareResource($this->fare),
        ];
    }
}
