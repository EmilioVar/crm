<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('client'))
                    <div class="alert alert-success">
                        {{ session('client') }}
                    </div>
                @endif
                <h1 class="fs-4 my-5">Clientes</h1>
                <!-- Clients table -->
                <x-clients :clients="$clients"/>
                <!-- Products table -->
                <livewire:products :products="$products"/>
            </div>
        </div>
    </div>
</x-layout>
