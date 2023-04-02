<table id="invoiceWelcome" class="table table-striped table-bordered nowrap" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>nº factura</th>
            <th>cliente</th>
            <th>fecha</th>
            <th>importe</th>
            <th>ver</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($invoices as $invoice)
            <tr>
                <th scope="row">{{ $invoice->id }}</th>
                <td>{{ $invoice->no_invoice }}</td>
                <td>{{ $invoclients[$loop->index] }}</td>
                <td>{{ $invoice->date }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>
                    <button class="btn btn-primary"><a class="text-decoration-none text-white"
                            href="{{ route('invoices.show', $invoice) }}">ver</a></button>
                </td>
            </tr>
        @empty
            <p class="alert alert-warning">¡No hay facturas! hay que ponerse las pilas ;D</p>
        @endforelse
    </tbody>
</table>

<x-slot:script>
    <script>
        $(document).ready(function() {
            $('#invoiceWelcome').DataTable();
        });
    </script>
    </x-slot>

    {{-- <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">nº factura</th>
            <th scope="col">cliente</th>
            <th scope="col">fecha</th>
            <th scope="col">importe</th>
            <th scope="col">ver</th>
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
        </tr>
        @empty
            <p class="alert alert-warning">¡No hay facturas! hay que ponerse las pilas ;D</p>
        @endforelse
    </tbody>
</table> --}}
