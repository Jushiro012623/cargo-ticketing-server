<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TicketRequest;
use App\Http\Resources\Api\TransactionResource;
use App\Models\Ticket;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\TicketService;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{
    use ApiResponse;
    private $ticketService;
    private $paymentService;

    public function __construct()
    {
        $this->ticketService = new TicketService();
        $this->paymentService = new PaymentService();
    }
    public function index(TicketRequest $request)
    {
        Gate::authorize('viewAny', Ticket::class);
        $tickets = Ticket::with(['payment', 'fare.route', 'fare', 'user'])->paginate(10);
        $tickets_resource = TransactionResource::collection($tickets);
        return response()->json($tickets_resource->response()->getData());
    }
    public function store(TicketRequest $request)
    {
        try {
            // dd($request->all());
            Gate::authorize('create', Ticket::class);
            DB::beginTransaction();
            $ticket_fare = $this->ticketService->getTicketFare($request);
            $ticket = Ticket::create(array_merge(
                [
                    'user_id' =>  $request->user()->id,
                    'fare_id' =>  $ticket_fare->id,
                    'ticket_number' => mt_rand(10000000, 9999999999),
                    'status' => 'pending', # 'in_transit', 'completed', 'cancelled'
                    'voyage_number' => mt_rand(1000, 999999),
                ],
                $request->validated(),
            ));
            $this->ticketService->createTransactionType($request, $ticket->id);
            $this->paymentService->storePayment($ticket, $request);
            DB::commit();
            $ticket_resource = new TransactionResource($ticket->load(['payment']));
            return $this->success('Ticket created successfully', $ticket_resource, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), 500);
        }
    }
    public function show(Ticket $ticket)
    {
        Gate::authorize('view', $ticket);
        $ticket_resource = new TransactionResource($ticket->load(['payment','user']));
        return $this->ok('Ticket retrieved successfully', $ticket_resource,);
    }
    public function update(TicketRequest $request, Ticket $ticket)
    {
        Gate::authorize('update', $ticket);
        return $this->ticketService->updateTicket($request,$ticket);
    }
    public function replace(TicketRequest $request, Ticket $ticket)
    {
        Gate::authorize('replace', $ticket);
        return $this->ticketService->updateTicket($request,$ticket);
    }

    public function destroy(Request $request, Ticket $ticket)
    {
        Gate::authorize('delete', $ticket);
        $ticket->delete();
        return response()->json([
            'message' => 'Ticket deleted successfully',
        ], 204);
    }
    public function trashed()
    {
        Gate::authorize('viewTrashed', Ticket::class);
        $trashed_tickets = Ticket::onlyTrashed()->paginate(15);
        if ($trashed_tickets->isEmpty()) {
            return response()->json(['message' => 'No trashed tickets found.'], 404);
        }
        $trashed_ticket_collection = TransactionResource::collection($trashed_tickets);
        return $this->ok('Trashed Tickets retrieved successfully', $trashed_ticket_collection->response()->getData());
    }

    public function restore(string $ticket)
    {
        Gate::authorize('restore', Ticket::class);
        $deleted_ticket = Ticket::withTrashed()->find($ticket);
        if ($deleted_ticket) {
            $deleted_ticket->restore();
            return $this->ok('Trashed Ticket restored successfully', new TransactionResource($deleted_ticket));
        }
        return $this->error('Ticket not found', 404);
    }
}
