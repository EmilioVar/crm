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
                                <th>Total</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <!-- nombre -->
                                    <td><input type="checkbox" name="products[]" id=""
                                            value="{{ $product->id }}">{{ $product->name }} </input>
                                    </td>
                                    <!-- precio -->
                                    <td>
                                        <p id="priceProduct">{{ $product->price }}</p>
                                    </td>
                                    <!-- total -->
                                    <td>
                                        <p id="priceTotal">0</p>
                                    </td>
                                    <!-- cantidad -->
                                    <td>
                                        <input class="form-select" id="counts" type="number" name="counts[]"
                                            id="">
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
                        <input value="0" type="number" readonly class="form-control" id="amount" name="amount"
                            placeholder="importe">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <x-slot:script>
                    <script>
                        $(document).ready(function() {
                            $('#client_id').select2();
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            $('#productsTable').DataTable();
                        });
                        /* importamos los elementos necesarios para el total
                        y los convertimos en array con spring operator */
                        let options = [...document.querySelectorAll('input[type="checkbox"]')];
                        let price = [...document.querySelectorAll('#priceProduct')];
                        let total = [...document.querySelectorAll('#priceTotal')]
                        let amount = document.querySelector('#amount');
                        let quantity = [...document.querySelectorAll('#counts')];


                        // obtenemos los precios totales de todos los productos
                        let prices = total.map(el => Number(el.innerHTML));

                        // iteramos las opciones
                        options.forEach((option, index) => {
                            // escuchamos el evento de cambio de cantidad de producto
                            quantity[index].addEventListener('change', () => {
                                // incrementamos en la columna total el precio original por la cantidad
                                total[index].innerHTML = price[index].innerHTML * quantity[index].value;
                                // actualizamos el array de precios con los nuevos precios totales
                                prices = total.map(el => Number(el.innerHTML));
                                // mediante el método reduce sumamos todos los valores, los que no están seleccionados son 0
                                amount.value = prices.reduce((acc, curr) => acc += curr);
                            });

                            // escuchamos el evento de selecionar un producto
                            option.addEventListener('change', el => {
                                // si el elemento es marcado
                                if (el.target.checked) {
                                    quantity[index].value = 1;
                                    total[index].innerHTML = price[index].innerHTML;
                                } else if (!el.target.checked) {
                                    total[index].innerHTML = 0;
                                    quantity[index].value = null;
                                }
                                // actualizamos el array de precios con los nuevos precios totales
                                prices = total.map(el => Number(el.innerHTML));
                                // mediante el método reduce sumamos todos los valores, los que no están seleccionados son 0
                                amount.value = prices.reduce((acc, curr) => acc += curr);
                            });
                        });
                    </script>
                    </x-slot>
            </div>
        </div>
    </div>
</x-layout>
