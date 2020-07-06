<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
    public $table = 'users';
    public $user;

    public function __construct()
    {

    }

    public function datosNuevos()
    {
        $datos = \App\Dato::where([['user_id',$this->id],['case',null]])->get();

        return $datos;
    }

    public static function getAll()
    {
        return \App\User::where('rol','operario')->get();
    }
}
