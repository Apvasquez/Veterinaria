<?php

namespace App\Http\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class Permissions extends Component
{
    public $name, $guard_name, $role_id;
    protected $rules = [
        'name' => 'required',        

    ];
    protected $validationAttributes = [


    ];
    protected $messages = [
        'name.required' => "Ingrese nombre Obligatorio"
    ];
    public $accion = "store";
    public function render()
    {
        $roles=Role::all();
        $permissions=Permission::all();
        return view('livewire.permissions',compact('roles','permissions'));
    }
    public function store()
    {    
        $this->validate();   
        Role::create([
            'name' => $this->name,
            'description' => $this->guard_name
        ]);

        $this->reset(['name', 'guard_name']);
    }
    public function edit(Role $role)
    {   
        $this->name = $role->name;
        $this->guard_name = $role->description;
        $this->role_id = $role->id;
        $this->accion = "update";
    }
    public function update()
    {
        $this->validate();
        $role = Role::find($this->role_id);
        $role->update([
            'name' => $this->name,
            'description' => $this->guard_name
        ]);
        $this->reset(['name', 'guard_name','accion']);

    }
    public function
    default()
    {
        $this->reset(['name', 'guard_name','accion']);

    }
    public function destroy(Role $role)
    {
        $role->delete();
    }
}
