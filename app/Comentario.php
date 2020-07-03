<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function dato()
    {
        return $this->belongsTo('App\Dato');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
