<?php

namespace App\Services;

use App\Http\Resources\Api\DiscountResource;
use App\Models\Discount;
use App\Models\Payment;
use Carbon\Carbon;
use stdClass;

class PaymentService
{
    public function storePayment($ticket, $request)
    {
        // $discount = $ticket->fare->regular; // Default value
        // if ($request->type_id === 1) {
        //     switch ($ticket->passenger->discount) {
        //         case 'REGULAR':
        //             $discount = $ticket->fare->regular;
        //             break;
        //         case 'STUDENT':
        //             $discount = $ticket->fare->student;
        //             break;
        //         case 'PWD/SENIOR':
        //             $discount = $ticket->fare->pwd_senior;
        //             break;
        //         case 'MINOR':
        //             $discount = $ticket->fare->minor;
        //             break;
        //         case 'HALF FARE':
        //             $discount = $ticket->fare->half_fare;
        //             break;
        //         default:
        //             // Handle the invalid discount case
        //             $discount = 0; // Set to 0 or an appropriate value instead of a string
        //             break;
        //     }
        // }
        // $additional_fee = $request->additional ? $ticket->fare->additional_fee : 0;
        // Ensure all values are numeric
        // $total_amount = (float)$discount + (float)$additional_fee;

        $payment_info = Payment::create([
            'ticket_id' => $ticket->id,
            'amount' => $request->payment->fare->fare,
            'transaction_code' => $ticket->ticket_number,
            'additional_fee' => $request->payment->fare->additional_fee,
            'total_amount' => $request->total_amount,
            'payment_method_id' => 1
        ]);

        return $payment_info;
    }
    public function getDiscount($request, $fare){
        $response = new stdClass(); 

        $data_id = $request->type_id == 1 ?  $request->discount_id : 1;

        $response->initData = Discount::findOrFail($data_id);
        $response->total_amount = $request?->additional == 2 ? $fare->fare + $fare->additional_fee : $fare->fare;
        $response->discounted_amount = $response->total_amount * $response->initData->percentage;
        $response->grand_total = ($response->total_amount - $response->discounted_amount);
        $response->fare = $fare;
        $resource = new DiscountResource($response);

        return $resource;
    }
}
