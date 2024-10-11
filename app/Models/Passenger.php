<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'ticket_id', 'discount', 'additional'];
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
