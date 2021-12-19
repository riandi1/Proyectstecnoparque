<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Computadora;
use Livewire\WithFileUploads;

class Computadoras extends Component
{
    use WithFileUploads;
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $description, $sunrise, $is_online;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.computadoras.view', [
            'computadoras' => Computadora::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord)
						->orWhere('sunrise', 'LIKE', $keyWord)
						->orWhere('is_online', 'LIKE', $keyWord)
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
		$this->sunrise = null;
		$this->is_online = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'description' => 'required',
		'sunrise' => 'required',
		'is_online' => 'required',
        ]);

        Computadora::create([ 
			'name' => $this-> name,
			'description' => $this-> description,
			'sunrise' => $this-> sunrise,
			'is_online' => $this-> is_online
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Computadora Successfully created.');
    }

    public function edit($id)
    {
        $record = Computadora::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->description = $record-> description;
		$this->sunrise = $record-> sunrise;
		$this->is_online = $record-> is_online;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'description' => 'required',
		'sunrise' => 'required',
		'is_online' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Computadora::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'description' => $this-> description,
			'sunrise' => $this-> sunrise,
			'is_online' => $this-> is_online
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Computadora Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Computadora::where('id', $id);
            $record->delete();
        }
    }
}
