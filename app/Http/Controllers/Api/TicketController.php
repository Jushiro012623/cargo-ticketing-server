<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TicketRequest;
use App\Http\Resources\Api\TransactionResource;
use App\Models\Fare;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\Vessel;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\TicketService;
use Illuminate\Contracts\Cache\Store;

class TicketController extends Controller
{
    private $ticketService;
    private $paymentService;

    public function __construct()
    {
        $this->ticketService = new TicketService();
        $this->paymentService = new PaymentService();
    }
    public function index(TicketRequest $request)
    {
        $tickets = Ticket::paginate(10);
        $tickets_resource = TransactionResource::collection($tickets)->response();
        return response()->json($tickets_resource->getData(true));
    }
    public function store(TicketRequest $request)
    {
        try {
            DB::beginTransaction();
            $ticket_fare = $this->ticketService->getTicketFare($request);
            $ticket = Ticket::create(array_merge(
                [
                    'user_id' =>  $request->user()->id,
                    'fare_id' =>  $ticket_fare->id,
                    'ticket_number' => mt_rand(1000000000, 9999999999),
                    'status' => 'pending', # 'in_transit', 'completed', 'cancelled'
                    'voyage_number' => mt_rand(1000000000, 9999999999),
                ],
                $request->validated(),
            ));
            $this->ticketService->createTransactionType($request, $ticket->id);
            $this->paymentService->storePayment($ticket, $request);

            DB::commit();
            return response()->json([
                'data' => new TransactionResource($ticket->load(['fare.route', 'payment'])),
                'message' => 'Ticket created successfully',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json($th->getMessage());
        }
    }

    public function show(Ticket $ticket)
    {
        $ticket_resource = new TransactionResource($ticket->load(['payment']));
        return response()->json([
            'data' =>  $ticket_resource->response()->getData(true),
            'message' => 'Ticket retrieved successfully',
        ]);
    }

    public function update(TicketRequest $request, Ticket $ticket)
    {
        try {
            DB::beginTransaction();
            $ticket->update($request->validated());
            $ticket->payment->update($request->validated());
            DB::commit();
            return response()->json([
                'data' => new TransactionResource($ticket->load(['payment'])),
                'message' => 'Ticket updated successfully',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json($th->getMessage());
        }
    }
    public function replace(TicketRequest $request, Ticket $ticket)
    {
        try {
            DB::beginTransaction();
            $ticket->update($request->validated());
            $ticket->payment->update($request->validated());
            DB::commit();
            return response()->json([
                'data' => new TransactionResource($ticket->load(['payment'])),
                'message' => 'Ticket updated successfully',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json($th->getMessage());
        }
    }

    public function destroy(Request $request, Ticket $ticket)
    {
        try {
            $ticket->delete();
            return response()->json([
                'message' => 'Ticket deleted successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
    public function trashed()
    {
        $trashed_tickets = Ticket::onlyTrashed()->get();

        if ($trashed_tickets->isEmpty()) {
            return response()->json(['message' => 'No trashed tickets found.'], 404);
        }
        return response()->json(TransactionResource::collection($trashed_tickets));
    }

    public function restore(string $ticket)
    {
        try {
            $deletedTicket = Ticket::withTrashed()->find($ticket);
            $deletedTicket->restore();
            return response()->json([
                'message' => 'Ticket restored successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}
