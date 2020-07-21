<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Arr;


class OperarioController extends Controller
{
    public function index()
    {
        $operario = \App\Operario::find(Auth::user()->id);

        return view('operario.index',['operario' => $operario]);
    }

    public function putCase(\App\Dato $Dato, Request $request)
    {
        $Dato->case = $request->case;
        $Dato->save();

        if (($request->case == 'ni')&& ($Dato->agenda != null)) {
            $Dato->agenda->delete();
        }

        return redirect()->back()->with('msg', 'Guardado con exito');
    }

    public function reAgendar(Request $request)
    {
        $agenda = \App\Agenda::firstOrNew(['dato_id' => $request->id]);

        $agenda->fecha = $request->fecha;
        $agenda->anotacion = $request->anotacion;

        $agenda->save();

        $agenda->dato->case = null;
        $agenda->dato->save();

        return redirect()->back()->with('msg','Agendado con exito');
    }

    public function agenda()
    {
        $agendados = \App\Dato::where('user_id',Auth::user()->id)->get();

        for ($i=0; $i < count($agendados) ; $i++) { 
            if (isset($agendados[$i]->agenda)) {
                $auxAgenda[] = $agendados[$i];
            }
        }

        $aux = array_values(Arr::sort($auxAgenda, function ($value) {
            return $value->agenda->fecha;
        }));

        $operario = \App\Operario::find(Auth::user()->id);

        $aux = $operario->agendados();

        //return $aux;
        return view('datos.operario.agenda',['datos'=> $aux]);
    }

    public function verPosibles()
    {
        $datos = \App\Dato::where('case','posible')->orderBy('id','desc')->get();

        return view('operario.posibles',['datos' => $datos]);
    }
}
