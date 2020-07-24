<?php

namespace App\Http\Livewire\Datos\Admin;
use Illuminate\Support\Arr;

use Livewire\Component;

class DatosList extends Component
{
    public $datos;

    public $selec;
    public $debug = 'asd';
    public $operarios;
    public $order = 'desc';

    public function mount($datos)
    {
        $this->datos = $datos;
        $this->selec = array();
        $this->operarios = \App\Operario::getAll();
    }

    public function sortBy($col)
    {
        $datos = \App\Dato::where('user_id',null)->orderBy($col,$this->order)->get();

        $this->datos = $datos;
        $this->debug = $this->order;
        $this->order = $this->order == 'desc' ? 'asc':'desc';
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
            unset($aux[$dato['id']]);
        }else{
            $aux[$dato['id']] = $dato;
        }
        $this->selec = $aux;

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

    public function delete()
    {
        foreach ($this->selec as $i => $s) {
            $auxDato = \App\Dato::find($s['id']);
            $auxDato->delete();

            foreach ($this->datos as $key => $d) {
                if ($d['id'] == $s['id']) {
                    unset($this->datos[$key]);
                }
            }
            unset($this->selec[$i]);
        }
    }

    public function render()
    {
        return view('livewire.datos.admin.datos-list');
    }
}
