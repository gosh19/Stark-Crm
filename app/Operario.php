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

        foreach ($datos as $key => $dato) {
            if ($dato->agenda != null) {
                unset($datos[$key]);
            }
        }

        return $datos;
    }

    public function agendados()
    {
        $datos = \App\Dato::where([['user_id',$this->id],['case',null]])->get();

        foreach ($datos as $key => $dato) {
            if ($dato->agenda == null) {
                unset($datos[$key]);
            }else{
                $dato->agenda->fecha = new \Carbon\Carbon($dato->agenda->fecha);
            }
        }

        return $datos;
    }

    public static function getAll()
    {
        return \App\User::where('rol','operario')->get();
    }
}
