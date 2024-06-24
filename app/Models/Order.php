<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['total', 'cliente_id', 'shipping_cost'];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
