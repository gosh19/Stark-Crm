<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DatosList extends Component
{
    public $datos;
    public $anotacion;
    public $operario;
    public $debug = '1';
    public $fecha;
    public $stateCollapse;

    protected $listeners = ['refreshRow'];

    public function refreshRow()
    {
        //
    }

    public function mount(\App\Operario $operario)
    {
        $this->operario = $operario;

        $this->datos = $operario->datosNuevos();
        
        $this->fecha = '';
        $this->anotacion = '';
        $this->stateCollapse = [];
    }

    public function putCase($key, $case)
    {
        $this->datos[$key]->case = $case;
        $this->datos[$key]->save();
        unset($this->datos[$key]);
        $this->emitSelf('postAdded',['postId'=> 1]);
    }

    public function agendarDato($key)
    {
        \App\Agenda::updateOrCreate(['dato_id'=> $this->datos[$key]->id], ['fecha' => $this->fecha, 'anotacion' => $this->anotacion]);
        unset($this->stateCollapse[$key]);
        unset($this->datos[$key]);
    }

    public function updated()
    {
        $this->debug = 'weno';
    }

    public function showHideCollapse($key)
    {
        if (!isset($this->stateCollapse[$key])) {
            $this->stateCollapse[$key] = 'show';
        }else{
            unset($this->stateCollapse[$key]);
        }
    }

    public function render()
    {
        return view('livewire.datos.operario.datos-list');
    }
}
