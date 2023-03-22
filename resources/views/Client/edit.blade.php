<x-layout>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('clients.update', $client) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input value="{{ $client->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="direction">Direccion:</label>
                        <input value ="{{ $client->direction }}" type="text" class="form-control" id="direction" name="direction" placeholder="Dirección">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
