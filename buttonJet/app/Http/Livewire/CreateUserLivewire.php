<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CreateUserLivewire extends Component
{
    public $name,$consulta,$mensaje=[];
    // definir variable
    public function mount()
    {
        $this->consulta = 0;
    }
    // render
    public function render()
    {
        return view('livewire.create-user-livewire');
    }
    // buscar
    public function buscar()
    {
        $rules=['name' => 'required'];
        if (!$this->validate($rules)) {
            $this->mensaje=['red',"complete"];
        }
        $users = User::where('name',$this->name)->first();
        if ($users) {
            $this->consulta = 0;
            $this->mensaje =['red',"El usuario ya existe"];
        }
        else {
            $this->consulta = 1;
        }
        
    }
    public function crear()
    {
        User::create([
            'name' => $this->name,
            'email' => 'correofalso20q11@gamil.com',
            'password' => bcrypt('maycol0039')
        ]);
        $this->mensaje =['indigo',"El usuario se creo"];
        $this->reset('name');
        $this->consulta = 0;
    }
}
