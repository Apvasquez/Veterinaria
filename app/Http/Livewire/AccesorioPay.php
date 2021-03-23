<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Accesorios;


class AccesorioPay extends Component
{
    public function mount(Accesorios $accesorios)
    {
        $this->accesorios = $accesorios;
    }
    public function render()
    {
        return view('livewire.accesorio-pay');
    }
}
