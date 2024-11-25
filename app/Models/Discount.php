<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'percentage', 'description', 'name'
    ];
    public function ticket(){
        return $this->hasOne(Ticket::class);
    }
}
