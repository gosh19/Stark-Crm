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
    /**
     * Entrega los datos agendados por el operario
     * en caso de pasa el case como true entrega solo los q aun se pueden llamar
     */
    public function agendados($case = false)
    {
        if ($case) {

            $hoy = \Carbon\Carbon::now();

            $datos = \App\Dato::where([['user_id',$this->id],['case',null]])->get();
            $agendasProximas = \App\Agenda::where('fecha', '>=',$hoy)->get();

            $data = [];
            foreach ($datos as $key => $dato) {
                foreach ($agendasProximas as $key => $ax) {
                    if ($dato->id == $ax->dato_id) {
                        $dato->agenda->fecha = new \Carbon\Carbon($dato->agenda->fecha);
                        $data[] = $dato;
                        break;
                    }
                }
            }
            return $data;

        }else{

            $datos = \App\Dato::where([['user_id',$this->id],['case',null]])->get();

            foreach ($datos as $key => $dato) {
                if ($dato->agenda == null) {
                    unset($datos[$key]);
                }else{
                    $dato->agenda->fecha = new \Carbon\Carbon($dato->agenda->fecha);
                }
            }
        }

        


        return $datos;
    }

    public static function getAll()
    {
        return \App\User::where('rol','operario')->get();
    }
}
