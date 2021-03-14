<?php

namespace App\Http\Livewire;
use App\Models\Bar;
use App\Models\Campus;
use Illuminate\Http\Request;
use App\Http\Requests\BarPostRequest;


use Livewire\Component;

class BarsComponent extends Component
{

    public $nombre, $abierto,$bar_id,$campus;

    public $accion = "store";
    protected $rules = [
        'nombre' => 'required',
        'abierto' => 'required',
        'campus' => 'required',
    ];
    protected $validationAttributes = [


    ];
    protected $messages = [
        'nombre.required' => "Ingrese nombre Obligatorio"
    ];


    public function render()
    {
        $bars = Bar::latest('id')->paginate(10);
        $campuses =Campus::all();
        return view('livewire.bars-component', compact('bars','campuses'));
    }
    public function store()
    {
        $this->validate();
        Bar::create([
            'nombre' => $this->nombre,
            'abierto' => $this->abierto
        ]);


        $this->reset(['nombre','abierto']);
        session()->flash('message', 'Bar successfully created by mr Ksr.');
    }
    public function edit(Bar $bar)
    {
        $this->nombre = $bar->nombre;
        $this->abierto = $bar->abierto;
        $this->bar_id = $bar->id;
        $this->accion = "update";
    }
    public function update(){
        $this->validate();
        $bar = Bar::find($this->bar_id);
        $bar->update([
            'nombre' => $this->nombre,
            'abierto' => $this->abierto
        ]);
        $this->reset(['nombre','abierto','accion']);
    }
    public function default(){
        $this->reset(['nombre','abierto','accion']);
    }
    public function destroy(Bar $campus){
        $campus->delete();
    }
}
