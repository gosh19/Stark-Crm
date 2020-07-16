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
        if ($row['campaign_id'] != null) {

       
            $dato = Dato::where('email',$row['correo_electronico'] ?? $row['email'] )
                            ->orWhere('telefono', $row['numero_de_telefono'] ?? $row['phone_number'] ?? 1)
                            ->first();

            if (!isset($row['nombre_completo'])) {
                if (isset($row['full_name'])) {
                    # code...
                    $row['nombre_completo'] = $row['full_name'];
                }else{
                    $row['nombre_completo'] = 'sin informacion';
                }
            }
            if (!isset($row['correo_electronico'])) {
                if (isset($row['email'])) {
                    $row['correo_electronico'] = $row['email'];
                }else{
                    $row['nombre_completo'] = 'sin informacion';
                }
            }
            if (!isset($row['numero_de_telefono'])) {
                if (isset($row['phone_number'])) {
                    $row['numero_de_telefono'] = $row['phone_number'];
                }else{
                    $row['numero_de_telefono'] = 'sin informacion';
                }
            }

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

    }

    public function getRepetidos()
    {
        return $this->repetidos;
    }
}
