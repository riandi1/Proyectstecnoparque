<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatList extends Component
{

    protected $listeners = ["MensajoRecibido"];

    public $mensajes;

    public function mount()
    {
        $this->mensajes = [];
    }

    public function MensajoRecibido($mensaje)
    {
        $this->mensajes[] = $mensaje; 
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
