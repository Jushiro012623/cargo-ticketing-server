<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mockery\Undefined;

class PaymentResource extends JsonResource
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
            'type' => 'Payment',
            'attributes' => [
                'payment_method_id' => $this->paymentMethod->name,
                'amount' => $this->amount,
                'total_amount' =>  $this->total_amount,
                'additional_fee' => $this->additional_fee,
                'transaction_code' => $this->transaction_code,
                'status' => $this->payment_status,
                'payment_date' => $this->payment_date ?? null,
                $this->whenLoaded('paymentStamp', function () {
                    return [
                        'timestamp' => [
                            'created_at' => $this->created_at,
                            'updated_at' => $this->updated_at,
                        ],
                    ];
                }),
                
            ]
        ];
    }
}
