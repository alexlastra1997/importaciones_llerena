<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'categoria',
        'imagen',
        'stock',
        'precio1',
        'precio2',
        'precio3',
        'precio4',
        'descripcion',
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
