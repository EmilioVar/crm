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
                <!-- init form -->
                <form method="post" action="{{ route('invoices.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="client_id">Cliente:</label>
                        <!-- CLIENT -->
                        <div class="form-floating">
                            <select name="client_id" class="form-select" id="client_id">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }} | id: {{ $client->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- PRODUCTS -->
                    <h3>Productos:</h3>
                    <table id="productsTable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><input type="checkbox" name="products[]" id=""
                                            value="{{ $product->id }}">{{ $product->name }} </input>
                                    </td>
                                    <td>
                                        <p id="priceProduct">{{ $product->price }}</p>
                                    </td>
                                    <td>
                                        <input class="form-select" id="counts"  type="number" name="counts[]" id="">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- DATE -->
                    <div class="form-group">
                        <label for="date">Fecha:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <!-- AMOUNT -->
                    <div class="form-group">
                        <label for="amount">Importe:</label>
                        <input value="0" type="number" readonly class="form-control" id="amount" name="amount" placeholder="importe">
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
    <x-slot:script>
        <script>
            $(document).ready(function() {
                $('#productsTable').DataTable();
            });
            /* importamos los elementos necesarios para el total
            y los convertimos en array con spring operator */
            let options = [...document.querySelectorAll('input[type="checkbox"]')];
            let price = [...document.querySelectorAll('#priceProduct')];
            let amount = document.querySelector('#amount');
            let quantity = [...document.querySelectorAll('#counts')];

            quantity.forEach(el => {
                el.addEventListener('input', q => {
                    console.log(q.data)
                });
            })
            // iteramos los options para escuchar el evento change
            options.forEach(element => {
                element.addEventListener('change', el => {
                    // si el elemento es marcado
                    if(el.target.checked) {
                        /* incrementamos el valor del total
                        añadiendole el precio que se encuentra en
                        el mismo lugar de indice en la tabla que el
                        producto seleccionado */
                        amount.value = Number(amount.value) + Number(price[options.indexOf(element)].textContent);

                        //partimos de que mínimo tendremos un producto, por lo que le imprimimos valor 1
                        quantity[options.indexOf(element)].value = 1;
                        // en caso contrario, se resta
                    } else if(!el.target.checked) {
                        amount.value = Number(amount.value) - Number(price[options.indexOf(element)].textContent);

                        // e igualmente, se restablece su input a null
                        quantity[options.indexOf(element)].value = null;
                    }
                })
            });
        </script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        </x-slot>
</x-layout>
