<?php

namespace App\Http\Livewire\Datos\Admin;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use \App\Mail\MailMarketing;

class MailView extends Component
{
    public $text;
    public $textMod ="";
    public $title;
    public $courses = [];
    public $selectedCourses = [];
    public $selected = [];
    public $datosMail = [];
    public $datos = [];

    public $case = null;
    public $fechaDesde = null;
    public $fechaHasta = null;

    public $campaigns = [];

    public function mount()
    {
        $this->courses = (array) DB::connection('worknow')->select('select * from courses');
        foreach ($this->courses as $key => $value) {
            $this->selected [$key]=false;
        }
    }

    public function updated()
    {
        $this->textMod = str_replace("-*","<b>",$this->text);
        $this->textMod = str_replace("*-","</b>",$this->textMod);
    }

    public function addDelete($id)
    {
        $exist = false;
        foreach ($this->selectedCourses as $key => $value) {
            if ($value[0]["id"] == $id) {
                $exist = true;
                
                break;
            }
        }
        
        if ($exist) {
            unset($this->selectedCourses[$key]);
        } else {
            $this->selectedCourses[] = DB::connection('worknow')->select('select * from courses where id ='.$id);
            
        }
        
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

    public function sendMail()
    {
        foreach ($this->datosMail as $key => $value) {
            try {
                Mail::to($value['email'])->send(new MailMarketing($this->textMod,$this->title,$this->selectedCourses));
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function render()
    {
        return view('livewire.datos.admin.mail-view');
    }
}
