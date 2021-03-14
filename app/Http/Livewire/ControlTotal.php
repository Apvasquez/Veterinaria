<?php

namespace App\Http\Livewire;


use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Livewire\Component;


class ControlTotal extends Component
{
    public $name, $guard_name, $role_id;
    protected $rules = [
        'name' => 'required',
        'guard_name' => 'required',

    ];
    public $accion = "store";
    public function render()
    {
        $roles=Role::all();
        return view('livewire.control-total',compact('roles'));
    }
    public function store()
    {
        $this->validate();
        Role::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name
        ]);

        $this->reset(['name', 'guard_name','accion']);
    }
    public function edit(Role $role)
    {


        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->role_id = $role->id;
        $this->accion = "update";
    }
    public function update()
    {
        $this->validate();
        $role = Role::find($this->role_id);
        $role->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name
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
