<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperarioController extends Controller
{
    public function index()
    {
        $operario = \App\Operario::find(Auth::user()->id);

        return view('operario.index',['operario' => $operario]);
    }

    public function putCase(\App\Dato $Dato,$case)
    {
        $Dato->case = $case;
        $Dato->save();

        return redirect()->back();
    }
}
