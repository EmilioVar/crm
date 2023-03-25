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
                <form method="post" action="{{ route('invoices.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="client_id">Cliente:</label>
                        <div class="form-floating">
                            <select name="client_id" class="form-select" id="client_id">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }} | id: {{ $client->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="client_id">Producto:</label>
                        <div class="form-floating">
                            <select name="product" class="form-select" id="product">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Cantidad:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="amount">Importe:</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="importe">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <x-slot:script>
                    <script>
                        $(document).ready(function() {
                            $('.form-select').select2();
                        });
                    </script>
                    </x-slot>
            </div>
        </div>
    </div>
</x-layout>
