<?php

namespace App\Http\Livewire\Admin\GestionUsers;

use Livewire\Component;

use App\Operario;

class User extends Component
{
    public $operario;
    public $name;

    public function mount(Operario $operario)
    {
        $this->operario = $operario;
        $this->name = $operario->name;
    }

    public function edit()
    {
        $this->operario->name = $this->name;
        $this->operario->save();
    }

    public function render()
    {
        return view('livewire.admin.gestion-users.user');
    }
}
