<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionFareResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
                // 'route' =>  [
                //     'origin' => $this->route->origin,
                //     'destination' => $this->route->destination,
                //     'transportation_type' => $this->route->transportation_type,
                // ],
                'weight' => $this->length,
                'additional_fee' => $this->additional_fee,
                'fare' => $this->fare
        ];
    }
    public function discount(){

    }
}
