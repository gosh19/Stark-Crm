<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    protected $fillable = [
        'name',
        'email',
        'telefono',
        'pedido',
        'hora_contacto',
    ];
}
