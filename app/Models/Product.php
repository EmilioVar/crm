<?php

namespace App\Models;

use App\Models\ProductLaptop;
use App\Models\ProductDisplay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'price'];

    public function productLaptops() {
        return $this->hasMany(ProductLaptop::class);
    }

    public function fullLaptop() {
        return collect([
            'code' => $this->code,
            'name' => $this->name,
            'price' => $this->price,
            'core' => $this->productLaptops()->get('core')[0]->core,
            'ram' => $this->productLaptops()->get('ram')[0]->ram,
            'velocity' => $this->productLaptops()->get('velocity')[0]->velocity,
        ]);
    }

    public function mostrar() {
        return "está heredado!";
    }

    public function getName() {
        return $this->name;
    }

    public function invoices() {
        return $this->belongsToMany(Invoice::class);
    }
}

