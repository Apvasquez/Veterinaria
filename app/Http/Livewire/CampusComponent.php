<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campus;
use App\Models\User;

use Livewire\WithPagination;

class CampusComponent extends Component

{

    use WithPagination;
    public $nombre, $direccion, $campus_id;
    protected $rules = [
        'nombre' => 'required',
        'direccion' => 'required',

    ];
    public $accion = "store";

    public function render()
    {

        $campuses = Campus::latest('id')->paginate(10);

        return view('livewire.campus-component', compact('campuses'));
    }
    public function store()
    {
        $this->validate();
        Campus::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion
        ]);

        $this->reset(['nombre', 'direccion']);
    }
    public function edit(Campus $campus)
    {


        $this->nombre = $campus->nombre;
        $this->direccion = $campus->direccion;
        $this->campus_id = $campus->id;
        $this->accion = "update";
    }
    public function update()
    {
        $this->validate();
        $campus = Campus::find($this->campus_id);
        $campus->update([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion
        ]);
        $this->reset(['nombre', 'direccion', 'accion']);
    }
    public function
    default()
    {
        $this->reset(['nombre', 'direccion', 'accion']);
    }
    public function destroy(Campus $campus)
    {
        $campus->delete();
    }
}
