<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'price'];

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

