<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">nº factura</th>
            <th scope="col">cliente</th>
            <th scope="col">fecha</th>
            <th scope="col">importe</th>
            <th scope="col">ver</th>
            <th scope="col">editar</th>
            <th scope="col">eliminar</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($invoices as $invoice)
        <tr>
            <th scope="row">{{ $invoice->id }}</th>
            <td>{{ $invoice->no_invoice }}</td>
            <td>{{  App\Models\Client::find($invoice->client_id)->name }}</td>
            <td>{{ $invoice->date }}</td>
            <td>{{ $invoice->amount }}</td>
             {{-- <td>
                <button class="btn btn-primary"><a class="text-decoration-none text-white"
                        href="{{ route('products.show', $product) }}">ver</a></button>
            </td>
            <td>
                <button class="btn btn-warning"><a class="text-decoration-none text-white"
                        href="{{ route('products.edit', $product) }}">editar</a></button>
            </td>
           <td>
                <form action="{{ route('products.destroy', $product) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">borrar</button>
                </form>
            </td> --}}
        </tr>
        @empty
            <p class="alert alert-warning">¡No hay clientes! hay que ponerse las pilas ;D</p>
        @endforelse
    </tbody>
</table>