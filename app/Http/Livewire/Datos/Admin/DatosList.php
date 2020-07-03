<?php

namespace App\Http\Livewire\Datos\Admin;
use Illuminate\Support\Arr;

use Livewire\Component;

class DatosList extends Component
{
    public $datos;

    public $selec;
    public $debug = '';
    public $operarios;

    public function mount($datos)
    {
        $this->datos = $datos;
        $this->selec = array();
        $this->operarios = \App\Operario::getAll();
    }

    public function submit($dato)
    {
        $aux = $this->selec;
        $control = false;

        foreach ($aux as $key => $value) {
            if ($value['id'] == $dato['id']) {
                $control = true;
            }
        }

        if ($control) {
            $this->debug = 'encontra3';
            unset($aux[$dato['id']]);
        }else{
            $this->debug = 'agrega3';
            $aux[$dato['id']] = $dato;
        }
        $this->selec = $aux;

    }

    public function updated($field)
    {

    }

    public function pasarDatos($id)
    {
        foreach ($this->selec as $key => $s) {
            $auxDato = \App\Dato::find($s['id']);
            $auxDato->user_id = $id;
            $auxDato->save();
            
            foreach ($this->datos as $key => $d) {
                if ($d['id'] == $s['id']) {
                    unset($this->datos[$key]);
                }
            }
        }
        $this->selec = [];
    }

    public function render()
    {
        return view('livewire.datos.admin.datos-list');
    }
}