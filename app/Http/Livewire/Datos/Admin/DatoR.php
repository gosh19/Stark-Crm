<?php

namespace App\Http\Livewire\Datos\Admin;

use Livewire\Component;

class DatoR extends Component
{
    public $key;
    public $repetido;
    public $theme = '';

    public function mount($key, $repetido)
    {
        $this->key = $key;
        $this->repetido = $repetido;
    }

    public function actualizar()
    {
        $dato = \App\Dato::find($this->repetido['dato']['id']);
        $dato->delete();

        $datoNew = new \App\Dato;

        $datoNew->name = $repetido['dataNew']['nombre_completo'];
        $datoNew->email = $repetido['dataNew']['correo_electronico'];
        $datoNew->telefono = $repetido['dataNew']['numero_de_telefono'];
        $datoNew->pedido = $repetido['dataNew']['campaign_name'];
        $datoNew->hora_contacto = $repetido['dataNew']['horario_de_contacto'];

        $datoNew->save();
        $this->theme = 'bg-primary';
    }

    public function noCargar()
    {
        $this->theme = 'bg-danger';
    }

    public function aviso()
    {
        $dato = \App\Dato::find($this->repetido['dato']['id']);
        $dato->notification = 1;
        $dato->save();
        $this->theme = 'bg-success';
    }

    public function render()
    {
        return view('livewire.datos.admin.dato-r');
    }
}
