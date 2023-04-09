<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- alerts -->
                @if (session('client'))
                    <div class="alert alert-success my-3">
                        {{ session('client') }}
                    </div>
                @endif

                @if (session('roleAutorized'))
                    <div class="alert alert-danger my-3">
                        {{ session('roleAutorized') }}
                    </div>
                @endif
                <!-- info -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Información de uso
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="alert alert-info my-3">
                                <p>Bienvenido a la página principal, a continuación encontrarás:</p>
                                <ul>
                                    <li>tablas de clientes, productos y facturas</li>
                                    <li>capacidad de registrarte o autenticarte</li>
                                    <li>CRUD de clientes</li>
                                    <li>CRUD de productos</li>
                                    <li>creación y visión de facturas</li>
                                </ul>
                                <p>hay algunas limitaciones, por lo que te recomiendo que te registres con el rol administrador para poder utilizar todas las herramientas</p>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
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
