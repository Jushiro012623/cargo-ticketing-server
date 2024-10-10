<?php

namespace App\Services;

use App\Models\DropCargo;
use App\Models\Fare;
use App\Models\Passenger;
use App\Models\RollingCargo;
use App\Traits\ApiResponse;

class TicketService
{
    use ApiResponse;
    public function createTransactionType($request, $ticket){
        switch ($request->type_id) {
            case 1:
                $fare = Passenger::create(array_merge(
                    ['ticket_id' => $ticket],
                    $request->validated()
                ))->ticket->passenger;
                break;
            case 2:
                $fare = RollingCargo::create(array_merge(
                    ['ticket_id' => $ticket],
                    $request->validated()
                ))->ticket->rollingCargo;
                break;
            case 3:
                $fare = DropCargo::create(array_merge(
                    ['ticket_id' => $ticket],
                    $request->validated()
                ))->ticket->dropCargo;

                break;
            default:
                return $this->error('Invalid Type', 401);
        }
        return $fare;
    }
    public function getTicketFare($request){
        
        if($request->type_id !== '2'){
            return Fare::where('type_id', $request->type_id )
                ->where('route_id', $request->route_id)
                ->first();

        }
        return Fare::where('type_id', $request->type_id )
                ->where('route_id', $request->route_id)
                ->where('length', $request->weight)
                ->first();
    }
}
