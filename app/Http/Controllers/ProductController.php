<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() {
        return view ('product.create');
    }

    public function show(Product $product) {
        return view ('product.show', compact('product'));
    }

    public function edit(Product $product) {
        return view ('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product) {
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return redirect('/')->with('client','¡Producto modificado correctamente!');
    }

    public function destroy(Product $product) {
        $product->delete();

        return redirect('/')->with('client','¡Producto eliminado correctamente!');
    }
}
