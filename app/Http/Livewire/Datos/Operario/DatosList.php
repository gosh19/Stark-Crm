<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DatosList extends Component
{
    public $datos;

    public function mount()
    {
        $this->datos = \App\Dato::where('user_id', Auth::user()->id)->get();
    }

    

    public function render()
    {
        return view('livewire.datos.operario.datos-list');
    }
}
