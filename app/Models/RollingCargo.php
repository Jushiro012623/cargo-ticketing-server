<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RollingCargo extends Model
{
    use HasFactory;
    protected $fillable = ['weight', 'ticket_id', 'fare_id', 'vehicle_type', 'vehicle_model'];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function fare()
    {
        return $this->hasOne(Fare::class);
    }
}
