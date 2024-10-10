<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropCargo extends Model
{
    use HasFactory;
    protected $fillable = ['weight', 'ticket_id', 'item_name', 'quantity','cargo_description'];
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    public function fare(){
        return $this->hasOne(Fare::class);
    }
    public function route(){
        return $this->hasOne(Route::class);
    }
}
