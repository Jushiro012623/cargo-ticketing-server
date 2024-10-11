<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable =[
        'origin', 'destination', 'transportation_type'
    ];
    public function fare(){
        return $this->hasOne(Fare::class);
    }
   
}
