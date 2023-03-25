<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['no_invoice','client_id','date','amount'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
