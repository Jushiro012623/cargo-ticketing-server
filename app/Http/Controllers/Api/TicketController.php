<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TicketRequest;
use App\Models\Fare;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\TicketService;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $ticket_fare;
    public function __construct()
    {
        $this->ticket_fare = new TicketService();
    }
    public function index()
    {
        return Ticket::paginate(10);
    }
    public function store(TicketRequest $request)
    {
        $user_ticket = DB::transaction(function () use ($request) {
            $initial_ticket = Ticket::create(array_merge(
                [
                    'user_id' =>  $request->user()->id,
                    'ticket_number' => mt_rand(1000000000, 9999999999),
                    'status' => 'pending' # 'in_transit', 'completed', 'cancelled'
                ],
                $request->validated(),
            ));  
            return $this->ticket_fare->getTicketFare($request, $initial_ticket->id);
             $initial_ticket;
        });
        return $user_ticket;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
