<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['type_id', 'user_id',  'fare_id', 'ticket_number', 'status', 'vessel_id' ,'voyage_number', 'discount_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
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
        return $this->hasOne(Tracking::class);
    }
    public function vessel(){
        return $this->belongsTo(Vessel::class);
    }
    public function discount(){
        return $this->belongsTo(Discount::class);
    }
    public function fare()
    {
        return $this->belongsTo(Fare::class);
    }
}
