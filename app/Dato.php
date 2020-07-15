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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario')->orderBy('id','desc')->take(5);
    }

    public function agenda()
    {
        return $this->hasOne('App\Agenda');
    }
}
