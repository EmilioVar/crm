<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Invoices extends Component
{
    public $invoices;
    public $invoclients;

    public function mount($invoices,$invoclients)
    {
        $this->invoices = $invoices;
        $this->invoclients = $invoclients;
    }

    public function render()
    {
        return view('livewire.invoices');
    }
}
