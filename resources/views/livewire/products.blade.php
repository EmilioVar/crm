<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">code</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">detalle</th>
            <th scope="col">editar</th>
            <th scope="col">eliminar</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->code }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
             <td>
                <button class="btn btn-primary"><a class="text-decoration-none text-white"
                        href="{{ route('products.show', $product) }}">ver</a></button>
            </td>
            <td>
                <button class="btn btn-warning"><a class="text-decoration-none text-white"
                        href="{{ route('products.edit', $product) }}">editar</a></button>
            </td>
           <td>
                <form action="{{ route('products.destroy', $product) }}" method="post">
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