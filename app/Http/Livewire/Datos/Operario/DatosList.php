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
    public $case;

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

    public function selectCase($case)
    {
        $this->case = $case;
    }

    public function putCase($key)
    {
        $this->datos[$key]->case = $this->case;
        $this->datos[$key]->save();
        unset($this->datos[$key]);
        $this->emitSelf('postAdded',['postId'=> 1]);
    }

    public function agendarDato($key)
    {
        \App\Agenda::updateOrCreate(['dato_id'=> $this->datos[$key]->id], ['fecha' => $this->fecha, 'anotacion' => $this->anotacion]);
        unset($this->stateCollapse[$key]);
        unset($this->datos[$key]);
        $this->anotacion = '';
        $this->fecha = '';
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

    public function refresh()
    {
        $this->datos = $this->operario->datosNuevos();

    }

    public function render()
    {
        return view('livewire.datos.operario.datos-list');
    }
}
