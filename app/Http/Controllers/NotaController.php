<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notasOp = Nota::where('receiver',Auth::user()->id)->latest()->get();
        $notasGen = Nota::where('receiver', null)->latest()->get();

        return view('notas.index',['notasOp'=> $notasOp, 'notasGen'=> $notasGen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nota = new Nota;

        $nota->sender = Auth::user()->id;
        $nota->receiver = $request->id;
        $nota->asunto = $request->asunto;
        $nota->mensaje = $request->mensaje;
        $nota->save();

        return redirect()->back()->with('msg', 'Nota cargada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function delete(Nota $Nota)
    {
        $Nota->delete();

        return redirect()->back()->with('msg','Nota eliminada correctamente');
    }

    public function modificarVisto(Nota $Nota)
    {
        $Nota->visto = 1;
        $Nota->save();

        return redirect()->back();
    }
}
