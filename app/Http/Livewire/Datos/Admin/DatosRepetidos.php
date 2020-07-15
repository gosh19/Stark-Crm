<?php

namespace App\Http\Livewire\Datos\Admin;

use Livewire\Component;

class DatosRepetidos extends Component
{
    public $repetidos = [];

    public function mount($repetidos)
    {
        $this->repetidos = $repetidos;
    }

    public function actualizar($key)
    {
        /*
        $dato = \App\Dato::find($this->repetidos[$key]['dato']['id']);
        $dato->delete();

        $dato = new \App\Dato;

        $dato->name = $this->repetidos[$key]['dataNew']['nombre_completo'];
        $dato->email = $this->repetidos[$key]['dataNew']['correo_electronico'];
        $dato->telefono = $this->repetidos[$key]['dataNew']['numero_de_telefono'];
        $dato->pedido = $this->repetidos[$key]['dataNew']['campaign_name'];
        $dato->hora_contacto = $this->repetidos[$key]['dataNew']['horario_de_contacto'];

        $dato->save();
        */
        unset($this->repetidos[$key]);
        echo var_dump($key);
    }

    public function render()
    {
        return view('livewire.datos.admin.datos-repetidos');
    }
}
