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

    public $case = null;
    public $fechaDesde = null;
    public $fechaHasta = null;

    public $selected = null;
    public $openSelected = false;
    public $openMail = false;

    public $selectedName ='';


    public function mount($datos)
    {
        $this->datos = $datos;
        $this->selec = array();
        $this->operarios = \App\Operario::getAll();
        $this->fechaDesde=date_format(\Carbon\Carbon::yesterday(),'Y-m-d');
        $this->fechaHasta=date_format(\Carbon\Carbon::now(),'Y-m-d');
    }

    public function sortBy($col)
    {
        $datos = \App\Dato::where('user_id',null)->orderBy($col,$this->order)->get();

        $this->datos = $datos;
        $this->debug = $this->order;
        $this->order = $this->order == 'desc' ? 'asc':'desc';
    }

    public function searchData()
    {
        $datos = \App\Dato::where('case',$this->case)
                            ->whereBetween('updated_at',[$this->fechaDesde,$this->fechaHasta])
                            ->get();

        foreach ($datos as $key => $value) {
            if (count($this->campaigns) == 0) {
                $this->campaigns[] = $value->pedido;
            } else {
                $exist = false;
                foreach ($this->campaigns as $key => $name) {
                    if ($name == $value->pedido) {
                        $exist = true;
                        break;
                    }
                }
                if (!$exist) {
                    $this->campaigns[]= $value->pedido;
                }

            }
            
        }

        $this->datos = $datos;
    }

    public function setSelected($id)
    {
        $this->openSelected=true;
        $this->selected = \App\Dato::find($id);
        //$this->selectedName = ['name'=>$this->selected->name];
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
        $this->searchData();

        $this->selec = [];
    }


    public function pasarDatos($id)
    {
        foreach ($this->selec as $key => $s) {
            $auxDato = \App\Dato::find($s['id']);
            $auxDato->user_id = $id;
            $auxDato->case = null;
            $auxDato->save();

            if ($auxDato->agenda != null) {
                $auxDato->agenda->delete();
            }
            foreach ($auxDato->comentarios as $i => $comment) {
                $comment->open = false;
                $comment->save();
            }
            
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

    public function toggleMail($value)
    {
        $this->openMail = $value;
    }

    /**
     * recibe el nombre de pedido y añade los filtrados al array $datosMail
     * en caso de ya haberlos agregado los elimina
     */
    public function addData($name)
    {
        $exist = false;
        foreach ($this->datosMail as $i => $dataMail) {
            if ($dataMail['pedido'] == $name) {
                $exist = true;
                break;
            }
        }

        if ($exist) {
            foreach ($this->datosMail as $i => $dataMail) {
                if ($dataMail['pedido'] == $name) {
                    unset($this->datosMail[$i]);
                }
            }
        }else{

            foreach ($this->datos as $dato) {
                if ($dato->pedido == $name) {
                    $this->datosMail [] = ['pedido'=>$name,'email'=>$dato->email];
                }
            }

        }
    }


    public function render()
    {
        return view('livewire.datos.admin.datos-list');
    }
}
