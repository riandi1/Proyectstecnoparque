<?php

namespace App\Http\Livewire;

use App\Models\municipality;
use Livewire\Component;

class Municipalities extends Component
{


    public function render()
    {
        $municipios = municipality::all();
        return view('livewire.municipalities', compact('municipios'))->extends('layouts.guest');
    }
}
