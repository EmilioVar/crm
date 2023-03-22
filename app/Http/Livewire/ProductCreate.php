<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Brick\Math\Exception\DivisionByZeroException;
use Livewire\Component;

class ProductCreate extends Component
{
    public $code;
    public $name;
    public $price;

    protected $rules = [
        'name' => 'required|min:3',
        'price' => 'required',
    ];
    // validación en tiempo reeal con el magic method updated
    public function updated($modal)
    {
        $this->validateOnly($modal);
    }

    public function cleanform() {
        $this->name = '';
        $this->price = '';
    }

    public function submit()
    {
        // creamos un número aleatorio para la factura
        $rand_number = rand(000000,999999);
        // comprobamos si existe en la base de datos, para evitar duplicados
        while(Product::where('code','=',$rand_number)->exists()) {
            $rand_number = rand(000000,999999);
        }
        // validamos
        $this->validate();
        // creamos el elemento
        Product::create([
            'code' => $rand_number,
            'name' => $this->name,
            'price' => $this->price,
        ]);
        // limpiamos el formulario
        $this->cleanform();
    }
    public function render()
    {
        return view('livewire.product-create');
    }
}
