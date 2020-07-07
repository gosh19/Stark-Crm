<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;

class Agenda extends Component
{
    public $operario;

    public $agendados;

    public function mount(\App\Operario $operario)
    {
        $this->operario = $operario;
        $this->agendados = $operario->agendados();
    }

    public function refresh()
    {
        # code...
    }
    public function render()
    {
        return view('livewire.datos.operario.agenda');
    }
}
