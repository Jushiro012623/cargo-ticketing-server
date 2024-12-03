<?php

namespace App\Services;

use App\Http\Resources\Api\DiscountResource;
use App\Models\Discount;
use App\Models\Fare;
use App\Models\Payment;
use Carbon\Carbon;
use stdClass;

class PaymentService
{
    public function storePayment($ticket, $fare)
    {
        $payment = Payment::create([
            'ticket_id' => $ticket->id,
            'amount' => $fare->total_amount,
            'transaction_code' => $ticket->ticket_number,
            'additional_fee' => $fare->fare->additional_fee,
            'total_amount' => $fare->grand_total,
            'payment_method_id' => 1
        ]);
        return $payment;
    }

    public function calculateFares($request){
        $response = new stdClass(); 

        $response->fare = $this->getFare($request);
        $response->discount_type = $request->type_id == 1 ?  $request->discount_id : 1;
        $response->discount = Discount::findOrFail($response->discount_type);
        $response->total_amount = $request?->additional == 2 ? $response->fare->fare + $response->fare->additional_fee : $response->fare->fare;
        $response->discounted_amount = $response->total_amount * $response->discount->percentage;
        $response->grand_total = ($response->total_amount - $response->discounted_amount);

        // $fare = $this->getFare($request);
        // $discount = Discount::findOrFail($request->type_id == 1 ?  $request->discount_id : 1);
        // $total_amount = $request?->additional == 2 ? $fare->fare + $fare->additional_fee : $fare->fare;
        // $discounted_amount =  $total_amount * $discount->percentage;
        // $data = [
        //     'fare' => $fare,
        //     'discount_type' => $request->type_id == 1 ?  $request->discount_id : 1,
        //     'discount' => $discount,
        //     'total_amount' => $total_amount,
        //     'discounted_amount' => $total_amount * $discount->percentage,
        //     'grand_total' => ($total_amount - $discounted_amount)
        // ];

        return $response;
    }

    private function getFare($request){
        return Fare::where('route_id', $request->route_id)
        ->where('type_id', $request->type_id)
        ->where(function($query) use ($request) {
            $request->type_id == 2 ? $query->where('weight_id', $request->weight_id) : $query->whereNull('weight_id');
        })
        ->first();
    }
}
