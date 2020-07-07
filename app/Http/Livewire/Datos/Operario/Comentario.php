<?php

namespace App\Http\Livewire\Datos\Operario;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comentario extends Component
{
    public $dato;
    public $comentario = '';
    public $comments;

    public function mount($dato)
    {
        $this->dato = $dato;
        $this->comments = $dato->comentarios;
    }

    public function cargarComentario()
    {
        $comentario = new \App\Comentario;

        $comentario->comentario = $this->comentario;
        $comentario->user_id = Auth::user()->id;
        $comentario->dato_id = $this->dato->id;

        $comentario->save();

        $this->comments[] = $comentario;

        $this->comentario = "";

        $this->emitUp('refreshRow');
    }

    public function wea()
    {
        # code...
    }

    public function render()
    {
        return view('livewire.datos.operario.comentario');
    }
}
