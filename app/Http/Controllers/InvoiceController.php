<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $clients = Client::all();
        return view('invoices.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_invoice' => 'nullable',
            'client_id' => 'required',
            'date' => 'required',
        ]);

        $rand_number = rand(000000, 999999);
        // comprobamos si existe en la base de datos, para evitar duplicados
        while (Invoice::where('no_invoice', '=', $rand_number)->exists()) {
            $rand_number = rand(000000, 999999);
        }

        $invoice = Invoice::create([
            'no_invoice' => $rand_number,
            'client_id' => $request->client_id,
            'date' => $request->date,
            'amount' => $request->amount,
        ]);

        for ($i = 0; $i <= count($request->products) - 1; $i += 1) {
            $prodCount = array_values(
                array_filter($request->counts, function ($num) {
                    return $num;
                }),
            );
            Product::find($request->products[$i])
                ->invoices()
                ->attach($invoice, ['price' => Product::find($request->products[$i])->price, 'quantity' => $prodCount[$i]]);
        }

        return redirect('/')->with('client', '¡Factura creada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $client = Client::find($invoice->client_id);
        return view('invoices.show', compact('invoice', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::all();
        return view('invoices.edit', compact('invoice', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->no_invoice = $request->no_invoice;
        $invoice->client_id = $request->client_id;
        $invoice->date = $request->date;
        $invoice->amount = $request->amount;

        $invoice->save();

        return redirect('/')->with('client', '¡Factura editada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect('/')->with('client', '¡Factura eliminada correctamente!');
    }
}
