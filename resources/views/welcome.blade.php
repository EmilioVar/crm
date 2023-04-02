<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('client'))
                    <div class="alert alert-success">
                        {{ session('client') }}
                    </div>
                @endif
                @if (Auth::user())
                    <h1 class="fs-4 my-5">Hola {{ Auth::user()->name }}! 👋🏼</h1>
                @else
                    <h1 class="fs-4 my-5">Bienvenido! eres un usuario no logueado</h1>
                @endif
                <div>
                    <!-- tables -->

                    <div class="nav nav-tabs my-4" id="nav-tab" role="tablist">
                        <!-- Clients -->
                        <button class="nav-link active" id="nav-clients-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-clients" type="button" role="tab" aria-controls="nav-clients"
                            aria-selected="true">Clientes</button>
                        <!-- Products -->
                        <button class="nav-link" id="nav-products-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-products" type="button" role="tab" aria-controls="nav-products"
                            aria-selected="false">Productos</button>
                        <!-- Invoices -->
                        <button class="nav-link" id="nav-invoices-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-invoices" type="button" role="tab" aria-controls="nav-invoices"
                            aria-selected="false" {{ Auth::user() ? '' : 'disabled' }}>Facturas</button>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-clients" role="tabpanel"
                        aria-labelledby="nav-clients-tab" tabindex="0">
                        <!-- Clients table -->
                        <x-clients :clients="$clients" />
                    </div>
                    <div class="tab-pane fade" id="nav-products" role="tabpanel" aria-labelledby="nav-products-tab"
                        tabindex="0">
                        <!-- Products table -->
                        <livewire:products :products="$products" />
                    </div>
                    <div class="tab-pane fade" id="nav-invoices" role="tabpanel" aria-labelledby="nav-invoices-tab"
                        tabindex="0">
                        <!-- Invoices table -->
                        <livewire:invoices :invoices="$invoices" :invoclients="$invoclients" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot:script>
        <script>
            // datatable products
            console.log('aqui')
            $(document).ready(function() {
                $('#productWelcome').DataTable();
            });
            // datatable clients
            $(document).ready(function() {
                $('#clientWelcome').DataTable();
            });
            // datatable invoices
            $(document).ready(function() {
                $('#invoiceWelcome').DataTable();
            });
        </script>
        </x-slot>
</x-layout>
