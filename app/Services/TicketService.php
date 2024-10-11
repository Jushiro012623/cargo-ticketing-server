<?php

namespace App\Services;

use App\Http\Resources\Api\TransactionResource;
use App\Models\DropCargo;
use App\Models\Fare;
use App\Models\Passenger;
use App\Models\RollingCargo;
use App\Models\Ticket;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

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
    public function updateTicket(Request $request,Ticket $ticket)
    {
        try {

            // if (auth()->user()->id !== $ticket->user_id) {
            //     return $this->error('Unauthorize action',401);
            // }
            // dd($ticket);
            Gate::authorize('update', $ticket);
            DB::beginTransaction();
                $ticket->update($request->validated());
                $ticket->payment->update($request->validated());
            DB::commit();
            return $this->ok('Ticket updated successfully', new TransactionResource($ticket));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error(    $e->getMessage(), 500);
        }
    }
}
