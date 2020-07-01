<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormCreateUser extends Component
{
    public $name;
    public $email;

    public function mount()
    {
        $this->name = "";
        $this->email = $this->name."@worknowcursos.com";
    }
    public function updated($field)
    {
        $mailData = str_replace( ' ', '',$this->name);
        $this->email = $mailData."@worknowcursos.com";
    }
    public function render()
    {
        return view('livewire.form-create-user');
    }
}
