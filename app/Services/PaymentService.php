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
        $discount = $ticket->fare->regular; // Default value
        if ($request->type_id === 1) {
            switch ($ticket->passenger->discount) {
                case 'regular':
                    $discount = $ticket->fare->regular;
                    break;
                case 'student':
                    $discount = $ticket->fare->student;
                    break;
                case 'pwd_senior':
                    $discount = $ticket->fare->pwd_senior;
                    break;
                case 'minor':
                    $discount = $ticket->fare->minor;
                    break;
                case 'half_fare':
                    $discount = $ticket->fare->half_fare;
                    break;
                default:
                    // Handle the invalid discount case
                    $discount = 0; // Set to 0 or an appropriate value instead of a string
                    break;
            }
        }
        $additional_fee = $request->additional ? $ticket->fare->additional_fee : 0;
        // Ensure all values are numeric
        $total_amount = (float)$discount + (float)$additional_fee;

        $payment_info = Payment::create([
            'ticket_id' => $ticket->id,
            'amount' => $ticket->fare->fare,
            'transaction_code' => "VSL" . mt_rand(100000, 9999999999),
            'additional_fee' => $additional_fee,
            'total_amount' => $total_amount,
            'payment_method_id' => 1
        ]);

        return $payment_info;
    }
    public function getDiscount($request, $fare){
        $data = new stdClass();
        $data->id = $request->type_id == 1 ?  $request->discount_id : 1;
        $data->discount = Discount::findOrFail($data->id);
        $data->resource = new DiscountResource($data->discount);
        return [
            'fare' => $fare,
            'discount' => $data->resource
        ];
    }
}
