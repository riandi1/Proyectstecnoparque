<?php

namespace App\Http\Livewire;

use App\Models\departament;
use App\Models\municipality;
use Livewire\Component;

class Select extends Component
{
    public $municipios = "";

    public function mount(){
        $this->municipios = municipality::where("departmentid",1)->get(); 
    }

    public function render()
    {
        // $municipios = municipality::all();
        // return view('livewire.select', compact('municipios'));
        return view('livewire.select',[
            "departamentos" => departament::all(),
            "municipios" => $this->municipios
        ]);
    }
    public function listar($departamento_id){
        $this->municipios = municipality::where('departmentid',$departamento_id)->get();
    }
}
