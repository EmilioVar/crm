<x-layout>
    <div class="row">
        <div class="col-12 d-flex justify-content-center my-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-subtitle mb-2 text-muted">Nombre: {{ $product->name }}</h5>
                    <h6 class="card-title">código: {{ $product->code }}</h6>
                  <p class="card-text">Precio: {{ $product->price }}</p>
                  <a href="{{ url()->previous() }}"><button class="btn btn-primary">Atrás</button></a>
                </div>
              </div>
        </div>
    </div>
</x-layout>