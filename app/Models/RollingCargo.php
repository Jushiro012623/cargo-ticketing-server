<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RollingCargo extends Model
{
    use HasFactory;
    protected $fillable = ['weight', 'ticket_id', 'vehicle_type', 'plate_number'];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
