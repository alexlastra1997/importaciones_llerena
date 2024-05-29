<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'documento_identificacion',
        'numero_telefono',
        'correo',
        'direccion_vivienda',
    ];
}
