<x-layout>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <!-- encabezado -->
                <h1>Esta es la API REST en pruebas, bienvenid@!</h1>
                <!-- info -->
                <hr>
                <div>
                    <h4>Todos los usuarios <strong>GET</strong>:</h4>
                    <p>para obtener todos los usuarios registrados</p>
                    <code>https://crm.emiliovargas.es/api/users/all</code>
                </div>
                <hr>
                <div>
                    <h4>Detalle de usuario <strong>GET</strong>:</h4>
                    <p>para obtener el detalle de un usuario, pasando el el id</p>
                    <code>https://crm.emiliovargas.es/api/user/{id}</code>
                </div>
                <hr>
                <div>
                    <h4>Creación de usuario <strong>POST</strong>:</h4>
                    <p>Para la creación de un usuario, se deben introducir los campos</p>
                    <ul>
                        <li>name</li>
                        <li>email</li>
                        <li>password</li>
                    </ul>
                    <p>para llevarlo a cabo se ha exceptuado esta ruta del token de verificación en el VerifyCsrfToken, además de no añadir ningún token de seguridad, está en fase de prueba 😅</p>
                    <code>https://crm.emiliovargas.es/api/user/create</code>
                </div>
            </div>
        </div>
    </div>
</x-layout>
