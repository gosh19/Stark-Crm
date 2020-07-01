<?php

namespace App\Imports;

use App\Dato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportDatos implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $datos = Dato::where('email',$row['correo_electronico'])
                        ->orWhere('telefono', $row['numero_de_telefono'])
                        ->first();

        if ($datos == null) {
            session()->flash('datosNuevos' , session('datosNuevos')+1);
            return new Dato([
                'name'     => $row['nombre_completo'],
                'pedido'        => $row['curso_de_interes'], 
                'hora_contacto'  => $row['horario_de_contacto'],
                'email'    => $row['correo_electronico'], 
                'telefono'     => $row['numero_de_telefono'],
            ]);
        }else{
            session()->flash('datosRepetidos' , session('datosRepetidos')+1);
        }

    }
}
