<?php

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $clients = Client::latest()->get();
    $products = Product::latest()->get();
    $invoices = Invoice::latest()->get();
    $invoclients = [];
    foreach($invoices as $invoice) {
         $invoclients[] = $clients->find($invoice->client_id)->name;
    };
    return view('welcome', compact('clients','products','invoices','invoclients'));
});

Auth::routes();

/* Admin & Comercial Routes */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* CRUD Clientes con Resource */
Route::resource('clients', ClientController::class)->middleware(['role:admin']);

/* CRUD Facturas con Resource */
Route::resource('invoices', InvoiceController::class);

/* CRUD Producto */
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}',[ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');
    Route::put('/product/{product}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/products/{product}',[ProductController::class, 'destroy'])->name('products.destroy');
});

