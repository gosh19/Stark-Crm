<?php

namespace App\Imports;

use App\Dato;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportDatos implements ToModel,WithHeadingRow
{
    private $repetidos = [];
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $dato = Dato::where('email',$row['correo_electronico'])
                        ->orWhere('telefono', $row['numero_de_telefono'])
                        ->first();

        if ($dato == null) {
            if ($row['nombre_completo'] != null) {
                session()->flash('datosNuevos' , session('datosNuevos')+1);
                return new Dato([
                    'name'     => $row['nombre_completo'],
                    'pedido'        => $row['campaign_name'], 
                    'hora_contacto'  => $row['horario_de_contacto'],
                    'email'    => $row['correo_electronico'], 
                    'telefono'     => $row['numero_de_telefono'],
                ]);
            }
        }else{
            $this->repetidos[] = ['dato' => $dato, 'dataNew'=> $row];
            session()->flash('datosRepetidos' , session('datosRepetidos')+1);
        }

    }

    public function getRepetidos()
    {
        return $this->repetidos;
    }
}
