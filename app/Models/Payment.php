<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['payment_method_id', 'ticket_id', 'amount', 'payment_status', 'total_amount', 'additional_fee', 'transaction_code','payment_date'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    public function paymentMethod(){
        return $this->belongsTo(PaymentMethods::class);
    }
}
