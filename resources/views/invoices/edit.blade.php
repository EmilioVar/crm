<x-layout>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('invoices.update', $invoice) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input id="no_invoice" name="no_invoice" value="{{ $invoice->no_invoice }}" type="hidden"
                            class="form-control">
                        @error('no_invoice')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Cliente:</label>
                        <label for="client_id">Cliente:</label>
                        <div class="form-floating">
                            <select name="client_id" class="form-select" id="client_id">
                                @foreach ($clients as $client)
                                /* añadimos un ternario para que,
                                en caso de que el cliente del option
                                coincida con el de la facutra, se seleccione */
                                    <option {{ $invoice->client_id == $client->id ? "selected" : "" }}  value="{{ $client->id }}">{{ $client->name }} | id: {{ $client->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input value="{{ $invoice->date }}" name="date" type="date" class="form-control"
                            id="date">
                        @error('date')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="amount">Importe</label>
                        <input value="{{ $invoice->amount }}" name="amount" type="number" class="form-control"
                            id="amount">
                        @error('amount')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot:script>
                    <script>
                        $(document).ready(function() {
                            $('.form-select').select2();
                        });
                    </script>
                    </x-slot>
</x-layout>
