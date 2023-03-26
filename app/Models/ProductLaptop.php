<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductLaptop extends Product
{
    use HasFactory;
    // seleccionamos la tabla de la base de datos
    
    protected $table = 'product_laptop';
    protected $fillable = ['product_id','core', 'ram', 'velocity'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
