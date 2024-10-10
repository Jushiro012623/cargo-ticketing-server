<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'route',
            'id' => $this->id,
            'transportationType' => $this->transportation_type,
            'routes' => [
                'origin' => $this->origin,
                'destination' => $this->destination
            ]
        ];
    }
}
