<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Invoices extends Component
{
    public $invoices;

    public function mount($invoices)
    {
        $this->invoices = $invoices;
    }

    public function render()
    {
        return view('livewire.invoices');
    }
}
