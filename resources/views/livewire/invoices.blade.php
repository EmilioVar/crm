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
            <td>{{  $invoclients[$loop->index] }}</td>
            <td>{{ $invoice->date }}</td>
            <td>{{ $invoice->amount }}</td>
             <td>
                <button class="btn btn-primary"><a class="text-decoration-none text-white"
                        href="{{ route('invoices.show', $invoice) }}">ver</a></button>
            </td>
           <td>
                <button class="btn btn-warning"><a class="text-decoration-none text-white"
                        href="{{ route('invoices.edit', $invoice) }}">editar</a></button>
            </td>
           <td>
                <form action="{{ route('invoices.destroy', $invoice) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">borrar</button>
                </form>
            </td>
        </tr>
        @empty
            <p class="alert alert-warning">¡No hay clientes! hay que ponerse las pilas ;D</p>
        @endforelse
    </tbody>
</table>