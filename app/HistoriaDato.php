<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaDato extends Model
{
    protected $fillable = [
        'dato_id','user_id' ,'case'
    ];
}
