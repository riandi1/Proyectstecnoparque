<?php

namespace App\Http\Livewire;

use App\Events\Enviarmensaje;
use Livewire\Component;

class ChatForm extends Component
{
    public $nombre,$mensaje;

    public function mount()
    {
        $this->nombre = "";
        $this->mensaje = "";
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function updated($field)
    {
        $this->validateOnly($field,[
            "nombre" => "required|min:3",
            "mensaje" => "required"
        ]);
    }

    public function enviarMensaje()
    {
        $this->validate([
            "nombre" => "required|min:3",
            "mensaje" => "required"
        ]);

        $this->emit("Mensajoenviado");

        $datos =[
            "mensaje" =>$this->mensaje,
            "nombre" =>$this->nombre
        ];

        //$this->emit("MensajoRecibido",$datos);

        event(new \App\Events\Enviarmensaje($this->nombre,$this->mensaje));
    }
}
