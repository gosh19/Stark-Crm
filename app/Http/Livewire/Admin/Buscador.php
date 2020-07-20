<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Buscador extends Component
{
    public $result;
    public $data = '';
    public $operarios;

    public $telefono;

    public function mount($operarios)
    {
        $this->result = [];
        $this->operarios = $operarios;
    }

    public function buscar($data)
    {
        $this->data = $data;
        
    }


    public function updated()
    {
        $datos = \App\Dato::where('telefono','LIKE','%'.$this->data.'%')->get();
        if ($this->data == '') {
            $datos= [];
        }
        $this->telefono = $this->data;

        $this->result = $datos;
    }
    public function render()
    {
        return view('livewire.admin.buscador');
    }
}
