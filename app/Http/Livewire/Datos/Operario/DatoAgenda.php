<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;

class DatoAgenda extends Component
{
    public $data;

    public $anotacion;
    public $fecha;
    public $showModal = 'hide';

    public function mount(\App\Dato $data)
    {
        $this->data = $data;
        $this->anotacion = $data->agenda->anotacion;
        $this->fecha = '';
    }

    public function showHideModal()
    {
        //$this->showModal = 'show';
    }

    public function render()
    {
        return view('livewire.datos.operario.dato-agenda');
    }
}
