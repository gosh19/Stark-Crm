<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $primaryKey = 'dato_id';
    protected $fillable = [
        'dato_id','fecha', 'anotacion',
    ];

    public function dato()
    {
        return $this->belongsTo('App\Dato');
    }
}
