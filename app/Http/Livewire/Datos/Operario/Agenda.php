<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;

class Agenda extends Component
{
    public $operario;

    public $agendados;

    public $debug = [];

    public function mount(\App\Operario $operario)
    {
        $this->operario = $operario;
        $this->agendados = $this->sortData($this->operario->agendados(true));
    }

    private function sortData($array)
    {
        $hoy = \Carbon\Carbon::now();

        /*
        $ordenado = array_values(\Illuminate\Support\Arr::sort($array, function ($value) {
            //$fec = new \Carbon\Carbon($value['agenda']['fecha']);
            if (!\Carbon\Carbon::now()->isAfter($value['agenda']['fecha'])) {
                # code...
                return $value['agenda']['fecha'];
            }else{
                return null;
                return $value['agenda']['fecha'];
            }));
        }*/

        return $array;
    }

    public function refresh()
    {
        $this->agendados = $this->sortData($this->operario->agendados(true));

    }
    public function render()
    {
        return view('livewire.datos.operario.agenda');
    }
}
