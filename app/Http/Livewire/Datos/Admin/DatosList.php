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
    public $horario = '10:00hs_a_12:00hs';
    public $disabled = 'disabled';

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

        $this->disabled = count($this->selec) != 0 ? '':'disabled';

    }

    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    public function modificarHorario()
    {
        foreach ($this->selec as $key => $s) {
            $auxDato = \App\Dato::find($s['id']);
            $auxDato->hora_contacto = $this->horario;
            $auxDato->save();
            
            foreach ($this->datos as $key => $d) {
                if ($d['id'] == $s['id']) {
                    unset($this->datos[$key]);
                }
            }
        }
        $datos = \App\Dato::where('user_id',null)->orderBy('id','desc')->get();

        $this->datos = $datos;

        $this->selec = [];
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
            # code...
        
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
