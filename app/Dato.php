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
        'platform',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario')->orderBy('id','desc')->where('open',true)->take(5);
    }

    public function allComments()
    {
        return $this->hasMany('App\Comentario');
    }

    public function agenda()
    {
        return $this->hasOne('App\Agenda');
    }

    public function historial()
    {
        return $this->hasMany('App\HistoriaDato');
    }
}
