<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'user_id', 'ticket_number', 'status'];
    public function rollingCargo()
    {
        return $this->hasOne(RollingCargo::class);
    }
    public function dropCargo()
    {
        return $this->hasOne(DropCargo::class);
    }
    public function passenger()
    {
        return $this->hasOne(Passenger::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function tracking()
    {
        return $this->belongsTo(Tracking::class);
    }
}
