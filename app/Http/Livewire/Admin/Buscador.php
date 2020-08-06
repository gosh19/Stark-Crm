<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class Buscador extends Component
{
    public $result;
    public $data = '';
    public $operarios;

    public $telefono;

    public $comentario = '';

    public function mount()
    {
        $this->result = [];
        $this->operarios = \App\Operario::all();
    }

    public function updated()
    {
        $datos = \App\Dato::where('telefono','LIKE','%'.$this->data.'%')
                            ->orWhere('email','LIKE', '%'.$this->data.'%')
                            ->orWhere('name','LIKE', '%'.$this->data.'%')
                            ->take(5)->get();

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
