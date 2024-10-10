<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fare extends Model
{
    use HasFactory;

    protected $fillable = ['fare', 'type_id', 'route_id', 'discount', 'additional_fee'];
    public function route()
    {
    return $this->belongsTo(Route::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
