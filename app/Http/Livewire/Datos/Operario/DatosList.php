<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DatosList extends Component
{
    public $datos;
    public $operario;
    public $debug = '1';

    public function mount(\App\Operario $operario)
    {
        $this->operario = $operario;

        $this->datos = $operario->datosNuevos();
    }

    public function putCase($key, $case)
    {
        $this->datos[$key]->case = $case;
        $this->datos[$key]->save();
        unset($this->datos[$key]);
    }

    public function render()
    {
        return view('livewire.datos.operario.datos-list');
    }
}
