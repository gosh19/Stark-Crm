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
        $datos = \App\Dato::where([['user_id',$this->id],['case',null]])->orderBy('updated_at')->get();

        foreach ($datos as $key => $dato) {
            if ($dato->agenda != null) {
                unset($datos[$key]);
            }
        }

        return $datos;
    }

    public function destacados()
    {
        $datos = \App\Dato::where([['user_id',$this->id],['case','destacado']])->orderBy('updated_at')->get();

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

            $agendasProximas = \App\Agenda::whereDate('fecha', '>=',$hoy)->orderBy('fecha')->get();

            $data = [];

            /**recorre el array de agenda y va comparando con el de datos, si uno contiene al otro lo agrega
             * como el de agendas esta ordenado ya por fecha no hace falta hacer mas na
             */
            foreach ($agendasProximas as $key => $ax) {
                foreach ($datos as $key => $dato) {
                    if ($dato->id == $ax->dato_id) {
                        $dato->agenda->fecha = new \Carbon\Carbon($dato->agenda->fecha);
                        if ($dato->agenda->fecha->isSameAs('d-m-Y',$hoy)) {
                            $dato->hoy = true;
                        }
                        $data[] = $dato;
                        if (count($data) >= 8) {
                            break 2;
                        }
                        break;
                    }
                }
            }
            return $data;

        }else{

            $hoy = \Carbon\Carbon::now();

            $datos = \App\Dato::where([['user_id',$this->id],['case',null]])->get();

            $agendasProximas = \App\Agenda::orderBy('fecha')->get();

            $data = [];

            /**recorre el array de agenda y va comparando con el de datos, si uno contiene al otro lo agrega
             * como el de agendas esta ordenado ya por fecha no hace falta hacer mas na
             */
            foreach ($agendasProximas as $key => $ax) {
                foreach ($datos as $key => $dato) {
                    if ($dato->id == $ax->dato_id) {
                        $dato->agenda->fecha = new \Carbon\Carbon($dato->agenda->fecha);
                        if ($dato->agenda->fecha->isSameAs('d-m-Y',$hoy)) {
                            $dato->hoy = true;
                        }
                        $data[] = $dato;
                        break;
                    }
                }
            }
            return $data;
        }

        $aux = array_values(Arr::sort($datos, function ($value) {
            return $value->agenda->fecha;
        }));


        return $datos;
    }

    public static function getAll()
    {
        return \App\Operario::where('rol','operario')->get();
    }
    
}
