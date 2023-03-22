<x-layout>
    @if (session('client'))
        <div class="alert alert-success">
            {{ session('client') }}
        </div>
    @endif
    <livewire:product-create />
    <h1 class="fs-4 my-5">Hello, world!</h1>
    <!-- bootstrap table -->
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">direction</th>
                <th scope="col">detalle</th>
                <th scope="col">editar</th>
                <th scope="col">eliminar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
            <tr>
                <th scope="row">{{ $client->id }}</th>
                <td>{{ $client->name }}</td>
                <td>{{ $client->direction }}</td>
                <td>
                    <button class="btn btn-primary"><a class="text-decoration-none text-white"
                            href="{{ route('clients.show', $client) }}">ver</a></button>
                </td>
                <td>
                    <button class="btn btn-warning"><a class="text-decoration-none text-white"
                            href="{{ route('clients.edit', $client) }}">editar</a></button>
                </td>
                <td>
                    <form action="{{ route('clients.destroy', $client) }}" method="post">
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
</x-layout>
