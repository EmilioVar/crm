* 25/03/2023
- Solucionando Facturas para recibir productos e introducirlo en la tabla pivot productos_factura

* 23/03/2023
- finalizado CRUD Facturas
- Añadido sistema de pestañas en welcome
- Creada tabla pivot invoice_product y registro de datos al crear una factura
- Añadido el middleware de spatie permissions en el kernel
- Finalizada toda la documentación, faltaría por crear unos formularios para crear los productos hijos

* 22/03/2023
- Creado generador de numeros aleatorios para el codigo de producto
- Creado sistema de registro de usuario asignando el rol desde un condicional en RegisterController
- Finalizado CRUD Product

- En el tema de la factura, hay que referenciar el id de cliente, pero no se especifica el tipo de relación. Vamos a basarnos en que es una relacion factura-cliente 1:n
- Hasta la tabla de Facturas

* 20/03/2023
- Creado modelo Product y sus hijos ProductDisplay y ProductLaptop
- Creando CRUD de Product

* 17/03/2023
- Iniciar proyecto y crear primer commit
- Crear DB y vincularla
- instalar bootstrap y sistema de autenticación
- Crear sistema de roles, en este caso mediante spatie permissions
- Creado modelo clientes y su controlador utilizando resource
- CRUD completo de Clientes