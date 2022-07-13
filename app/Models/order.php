<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    public function order_p(){
        return $this->hasMany(orderproduct::class, 'order_id');
    }
}
