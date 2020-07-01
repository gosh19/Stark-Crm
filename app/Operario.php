<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
    public static function getAll()
    {
        return \App\User::where('rol','operario')->get();
    }
}
