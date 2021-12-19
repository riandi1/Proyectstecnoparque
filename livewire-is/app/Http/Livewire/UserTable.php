<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    // total de la base de datos
    public $totalRecords;
    // numero de carga de dato y datos
    public $loadAmount = 10;

    public function loadMore()
    {
        $this->loadAmount += 10; 
    }

    public function mount()
    {
        $this->totalRecords = User::count();
    }

    public function render()
    {
        return view('livewire.user-table')
                ->with('users',
                        User::limit($this->loadAmount)->get());
    }
}
