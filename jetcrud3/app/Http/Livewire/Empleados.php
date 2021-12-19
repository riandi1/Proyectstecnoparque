<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;
use Livewire\WithFileUploads;


class Empleados extends Component
{
    use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $description,$photo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empleados.view', [
            'empleados' => Empleado::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->description = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'description' => 'required',
        'photo' => 'image'
        ]);
       $url= $this->photo->store('photos');
        Empleado::create([ 
			'name' => $this-> name,
			'description' => $this-> description,
            'photo' => $url
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empleado Successfully created.');
    }

    public function edit($id)
    {
        $record = Empleado::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->description = $record-> description;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'description' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empleado::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'description' => $this-> description
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empleado Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empleado::where('id', $id);
            $record->delete();
        }
    }
}
