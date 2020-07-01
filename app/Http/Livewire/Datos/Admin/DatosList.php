<?php

namespace App\Http\Livewire\Datos\Admin;

use Livewire\Component;

class DatosList extends Component
{
    public $datos;

    public $selec;
    public $debug = '';

    public function mount($datos)
    {
        $this->datos = $datos;
        $this->selec = [];
    }

    public function addOrDel($dato)
    {
        # code...
    }

    public function submit($dato)
    {
        $this->debug = in_array($dato,$this->selec);
        if (!in_array($dato,$this->selec)) {
            $this->selec[] = $dato;
        }else{
            $this->selec = array_diff($this->selec, $dato);
        }

    }


    public function render()
    {
        return view('livewire.datos.admin.datos-list');
    }
}
