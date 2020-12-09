<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DatosList extends Component
{
    public $datos;
    public $destacados;
    public $anotacion;
    public $operario;
    public $debug = '1';
    public $fecha;
    public $stateCollapse;
    public $case;
    public $theme = 'dark';

    protected $listeners = ['refreshRow'];

    public function refreshRow()
    {
        //
    }

    public function mount(\App\Operario $operario)
    {
        $this->operario = $operario;

        $this->datos = $operario->datosNuevos();
        $this->destacados = $operario->destacados();
        
        $this->fecha = '';
        $this->anotacion = '';
        $this->stateCollapse = [];
    }

    public function selectCase($case)
    {
        $this->case = $case;
    }

    public function changeTheme($theme)
    {
        $this->theme = $theme;
    }

    public function putCase($key)
    {
        \App\HistoriaDato::create([
            'dato_id'=>$this->datos[$key]->id,
            'user_id'=>Auth::id(),
            'case'=>$this->case,
        ]);
        
        if ($this->case == 'cambio_turno') {
            $this->datos[$key]->hora_contacto = $this->case;
            $this->datos[$key]->case = null;
            $this->datos[$key]->user_id = null;
        }else{

            $this->datos[$key]->case = $this->case;
        }
        $this->datos[$key]->save();
        unset($this->datos[$key]);
        $this->emitSelf('postAdded',['postId'=> 1]);
    }

    public function putCaseDestacado($key)
    {
        if ($this->case == 'cambio_turno') {
            $this->destacados[$key]->hora_contacto = $this->case;
            $this->destacados[$key]->case = null;
            $this->destacados[$key]->user_id = null;
        }else{
            $this->destacados[$key]->case = $this->case;
        }
        $this->destacados[$key]->save();
        unset($this->destacados[$key]);
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

    public function agendarDatoDestacado($key)
    {
        \App\Agenda::updateOrCreate(['dato_id'=> $this->destacados[$key]->id], ['fecha' => $this->fecha, 'anotacion' => $this->anotacion]);
        unset($this->stateCollapse[$key]);
        $dato = \App\Dato::find($this->destacados[$key]->id);
        $dato->case = null;
        $dato->save();
        
        unset($this->destacados[$key]);
        $this->anotacion = '';
        $this->fecha = '';
        $this->destacados = $this->operario->destacados();
    }

    public function updated()
    {
        //
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
        $this->destacados = $this->operario->destacados();

    }

    public function render()
    {
        return view('livewire.datos.operario.datos-list');
    }
}
