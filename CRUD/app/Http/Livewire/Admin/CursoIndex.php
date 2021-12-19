<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\curso;
use Livewire\WithPagination;

class CursoIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $cursos = curso::where('user_id',auth()->user()->id)
        ->where('name','LIKE', '%'.$this->search.'%')
        ->latest('id')
        ->paginate();
        return view('livewire.admin.curso-index', compact('cursos'));
    }
}
