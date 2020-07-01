<?php

namespace App\Http\Controllers;

use App\Dato;
use Illuminate\Http\Request;
use App\Imports\ImportDatos;
use Maatwebsite\Excel\Facades\Excel;

class DatoController extends Controller
{
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        session('datosNuevos', 0);
        session('datosRepetidos', 0);
        Excel::import(new ImportDatos, request()->file('file'));

        return redirect()->back();
    }
}
