<x-layout>
    <div class="row">
        <div class="col-12 d-flex justify-content-center my-5">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">id: {{ $invoice->id }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">nº factura: {{ $invoice->no_invoice }}</h6>
                  <p class="card-text">cliente: {{ $client->name }}</p>
                  <p class="card-text">Productos:</p>
                  
                  <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">code</th>
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                            <th scope="col">detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                             <td>
                                <button class="btn btn-primary"><a class="text-decoration-none text-white"
                                        href="{{ route('products.show', $product) }}">ver</a></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                  <p class="card-text"><span class="fw-bold">fecha:</span> {{ $invoice->date }}</p>
                  <p class="card-text"><span class="fw-bold">importe:</span> {{ $invoice->amount }}</p>
                  <a href="{{ url()->previous() }}"><button class="btn btn-primary">Atrás</button></a>
                </div>
              </div>
        </div>
    </div>
</x-layout>