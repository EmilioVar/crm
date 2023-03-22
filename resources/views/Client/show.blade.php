<x-layout>
    <div class="row">
        <div class="col-12 d-flex justify-content-center my-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">id: {{ $client->id }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Nombre: {{ $client->name }}</h6>
                  <p class="card-text">Dirección: {{ $client->direction }}</p>
                  <a href="{{ url()->previous() }}"><button class="btn btn-primary">Atrás</button></a>
                </div>
              </div>
        </div>
    </div>
</x-layout>