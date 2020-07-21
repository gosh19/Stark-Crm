<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;

class Agenda extends Component
{
    public $operario;

    public $agendados;

    public $debug = [];

    public $fecha = [];
    public $anotacion;

    public function mount(\App\Operario $operario)
    {
        $this->operario = $operario;
        $this->agendados = $this->operario->agendados(true);
        $this->anotacion = [];

        foreach ($this->agendados as $key => $ag) {
            $this->fecha[] = date_format($ag->agenda->fecha, 'Y/m/d H:i:s');
            $this->anotacion[] = $ag->agenda->anotacion.'-- N°'.$key;
        }
    }

    public function refresh()
    {
        $this->agendados = [];
        $this->agendados = $this->operario->agendados(true);
        foreach ($this->agendados as $key => $ag) {
            $this->fecha[] = date_format($ag->agenda->fecha, 'Y/m/d H:i:s');
            $this->anotacion[] = $ag->agenda->anotacion;
        }

        
    }
    public function render()
    {
        return view('livewire.datos.operario.agenda');
    }
}
