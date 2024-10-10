<?php

namespace App\Services;

use App\Models\Payment;
use Carbon\Carbon;

class PaymentService {
    
    public function storePayment($ticket, $request) {
        $discount = $ticket->fare->regular;
            if($request->type_id === 1){
                switch ($ticket->passenger->discount) {
                    case 'regular':
                        $discount = $ticket->fare->regular;
                    case 'student':
                        $discount = $ticket->fare->student;
                    case 'pwd_senior':
                        $discount = $ticket->fare->pwd_senior;
                    case 'minor':
                        $discount = $ticket->fare->minor;
                    case 'half_fare':
                        $discount = $ticket->fare->half_fare;
                    default:
                        $discount = 'Invalid Discount';
                }
            }
        $payment_info = Payment::create([
            'ticket_id' => $ticket->id,
            'amount' => $ticket->fare->regular,
            'transaction_code' => "VSL" . mt_rand(1000000000, 9999999999),
            'additional_fee' => $request->additional ? $ticket->fare->additional_fee : 0 ,
            'total_amount' =>  $discount + ( $request->additional ? $ticket->fare->additional_fee : 0),
            'payment_method_id' => $request->payment_method_id,
        ]);

        return $payment_info;
    }
}