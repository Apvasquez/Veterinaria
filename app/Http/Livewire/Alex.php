<?php

namespace App\Http\Livewire;
use App\Models\Bar;
use App\Models\Campus;

use Livewire\Component;

class Alex extends Component
{
    public function render()
    {
        $bars = Bar::latest('id')->paginate(10);
        $campuses =Campus::all();
        return view('livewire.alex', compact('bars','campuses'));
    }
}
