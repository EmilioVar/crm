<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductDisplay extends Product
{
    use HasFactory;

    protected $table = 'product_display';
    protected $fillable = ['code','name','price','inch','smartv','max_resolution'];
}
