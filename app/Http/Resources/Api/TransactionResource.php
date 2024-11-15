<?php

namespace App\Http\Resources\Api;

use App\Models\Fare;
use App\Models\Passenger;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array{
        $ticketDetails = $this->getTicketType();
        return [
            'type' => 'Ticket',
            'id' => $this->id,
            'user_id' =>$this->user_id,
            'owner' => $this->whenLoaded('user', function () {
                    return $this->user;
                }),
            'vessel_type' => $this->vessel->name ?? null,
            'transaction '=> $ticketDetails ?? null,
            'attributes' => [
                'discount' => $this->discount_id,
                'ticket_number' => $this->ticket_number,
                'voyage_number' => $this->voyage_number,
                'routes' => new RouteResource($this->fare->route),
                // 'payment' => $this->whenLoaded('payment', function () {
                //     return new PaymentResource($this->payment);
                // }),
                // 'fare' => $this->fare,
            ],
            'transaction_status' => $this->status,
            'timestamp' => [
                'created' => $this->created_at->format('Y-m-d : h:i:A'),
                'updated' => $this->updated_at->format('Y-m-d : h:i:A'),
                'deleted' => $this->deleted_at ? $this->deleted_at->format('Y-m-d : h:i:A') : null
            ],

        ];
    }
    public function getTicketType(){
        $ticketDetails = null;
        switch ($this->type_id) {
            case 1:
                $ticketDetails = $this->passenger->discount;
                break;
            case 2:
                $ticketDetails = [ 
                    'vehicle_type' => $this->rollingCargo->vehicle_type,
                    'weight' => $this->rollingCargo->weight->name,
                    'plate_number' => $this->rollingCargo->plate_number
                ];
                break;
            case 3:
                $ticketDetails = [
                    'weight' => $this->dropCargo->weight->name,
                    'item_name' => $this->dropCargo->item_name,
                    'cargo_description' => $this->dropCargo->cargo_description,
                    'quantity' => $this->dropCargo->quantity
                ];
                break;
            default:
                $ticketDetails = 'Unknown Type';
                break;
        }
        return $ticketDetails;
    }

}
