<?php

namespace App\Http\Controllers;

use App\Dato;
use Illuminate\Http\Request;
use App\Imports\ImportDatos;
use Maatwebsite\Excel\Facades\Excel;

class DatoController extends Controller
{
    public function index()
    {
        $datos = \App\Dato::where('user_id', null)->orderBy('id','desc')->get();

        return view('datos.admin.index',[
                                        'datos' => $datos,
                                        ]);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }
    

    public function import() 
    {
        session('datosNuevos', 0);
        session('datosRepetidos', 0);
        $imp = new ImportDatos;
        Excel::import($imp, request()->file('arch'));
        
        $repetidos = $imp->getRepetidos();
        if (count($repetidos) != 0) {
            # code...
            return view('datos.admin.datos-repetidos',['repetidos' => $repetidos]);
        }
        return redirect()->back();
    }

    public function changeOp(Dato $Dato, Request $request)
    {
        $Dato->user_id = $request->user_id;
        $Dato->save();

        return redirect()->back()->with('msg', 'Dato agregado con exito');
    }

    public function store(Request $request)
    {
        $dato = new Dato;

        $dato->name = $request->name;
        $dato->telefono = $request->telefono;
        $dato->email = $request->email;
        $dato->pedido = $request->pedido;
        $dato->hora_contacto = $request->hora_contacto;
        $dato->user_id = $request->user_id;

        $dato->save();

        return \redirect()->back()->with('msg', 'Dato cargado correctamente');
    }

    public function verUsados($col = null,$order = 'desc')
    {
        if ($col != null) {
            $datos = Dato::where('case','!=',null)->orderBy($col,$order)->take(1000)->get();
        }else{
            $datos = Dato::where('case','!=',null)->orderBy('updated_at',$order)->take(1000)->get();
        }
        $operarios = \App\Operario::where('rol','operario')->get();

        $order = $order == 'desc' ? 'asc':'desc';
        return view('datos.admin.datos-usados',['datos'=> $datos,'order' => $order,'operarios' => $operarios]);
        
    }

    public function pasarUsado(Request $request)
    {
        $validator = $request->validate([
            'id' => ['required'],
        ]);
        $cant = 0;
        foreach ($request->dato as $key => $dato) {
            $d = Dato::find($dato);
            $d->user_id = $request->id;
            $d->case = NULL;
            $d->save();
            $cant++;
        }

        return redirect()->back()->with('msg','Se cargaron con exito '.($cant+1).' dato(s) con exito');
    }
}
