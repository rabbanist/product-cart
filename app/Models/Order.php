<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'shipping_address', 'total_amount', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
