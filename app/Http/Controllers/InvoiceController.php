<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
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
        $clients = Client::all();
        return view ('invoices.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rand_number = rand(000000,999999);
        // comprobamos si existe en la base de datos, para evitar duplicados
        while(Invoice::where('no_invoice','=',$rand_number)->exists()) {
            $rand_number = rand(000000,999999);
        }

        Invoice::create([
            'no_invoice' => $rand_number,
            'client_id' => $request->client_id,
            'date' => $request->date,
            'amount' => $request->amount
        ]);

        return redirect('/')->with('client','¡Factura creada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $client = Client::find($invoice->client_id);
        return view ('invoices.show', compact('invoice','client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
