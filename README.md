<h1>DOCUMENTACIÓN API DE PRODUCTOS</h1>

Esta API proporciona un conjunto de endpoints HTTP para crear, leer, actualizar y eliminar productos. Los productos se representan como objetos JSON con los siguientes campos:

id: El identificador del producto

name: El nombre del producto

description: La descripción del producto

image: La imagen del producto

brand: La marca del producto

price: El precio del producto

price_sale: El precio de descuento del producto

category: La categoría del producto

stock: El stock del producto


<h2>Los endpoints utilizados se crearon mediante el Resource que ofrece laravel para no tener que escribir las rutas por cada método HTTP.</h2>

    Route::middleware('api.key')->group(function () {
   
    Route::resource('/products', ProductController::class);
   
    });

Se utilizó el endpoint /products en plural por convención del API REST en todo el mundo. Debido a que hace referencia a un conjunto de datos y no a uno solo.

Las rutas que crea el resource son las siguientes:






<h2>Requisitos</h2>

Para usar esta API, necesitarás una API Key. Puedes obtener una API Key mediante el endpoint:

GET http://127.0.0.1:8000/api/api-key (utilizando servidor XAMPP)

La API Key se regenera automáticamente cada 1 minuto mediante un comando automatizado en el Schedule. Este comando genera un nuevo número aleatorio entre 0 y 9 en el último dígito de la API Key y lo reemplaza en la base de datos.


<h2>Instalación</h2>

Para instalar la API, sigue estos pasos:

<h2>Clona el repositorio de GitHub:</h2>
git clone https://github.com/severloth/mailup-api-rest

<h2>Instala las dependencias:</h2>
	composer install

<h2>Migra la base de datos para obtener las tablas necesarias:</h2>
	php artisan migrate (o php artisan migrate:refresh)

 <h2>Ejecuta el SEED para crear los datos por defecto como los productos y la API Key</h2>
     php artisan db:seed 
	
<h2>Inicializa el servidor</h2>
	php artisan serve

<h2>Ejecuta el schedule para que realice la regeneración de la API KEY cada un minuto (no es una práctica cómoda la regeneración de la API KEY cada minuto, se hizo solamente para que el evaluador no tenga que esperar)</h2>
	php artisan schedule:work



Siguiendo estos pasos, ya tienes funcionando la API de producto.


<h1>Uso</h1>

Para usar esta API, puedes utilizar un cliente HTTP como POSTMAN.
El Modelo Producto realiza validaciones mediante la librería VALIDATOR.

Para crear correctamente un producto se deben respetar las reglas del modelo Producto.


<h2>Reglas Producto:</h2>

'name' => 'required|string|max:100',
        'description' => 'required|string|max:1000',
        'image' => 'required|string|max:100',
        'brand' => 'required|string|max:100',
        'price' => 'required|numeric',
        'price_sale' => 'required|numeric',
        'category' => 'required|string|max:100',
        'stock' => 'required|integer',



<h1>Ejemplos:</h1>

<h2>Crear un producto</h2>

POST http://172.0.0.1:8000/api/products
Content-Type: application/json
Authorization:
Type: API Key
Key: api_key
Value: [api-key-actual] (obtenida por el endpoint mencionado anteriormente)
Add to: Header
{
	“name”: “Producto”,
	“description”: “Un producto nuevo”,
	“image”: “https://imagen-de-prueba.com/image”
	“brand”: “Marca nueva”,
“price”: 100,
	“price_sale”: 99,
“category”: “Producto de indumentaria”,
	“stock”: 10
	
}

<h2>Obtener todos los productos</h2>

GET http://172.0.0.1:8000/api/products
Authorization:
Type: API Key
Key: api_key
Value: [api-key-actual] (obtenida por el endpoint mencionado anteriormente)
Add to: Header


<h2>Obtener un producto por id</h2>
GET http://172.0.0.1:8000/api/products/{id}
Authorization:
Type: API Key
Key: api_key
Value: [api-key-actual] (obtenida por el endpoint mencionado anteriormente)
Add to: Header


<h2>Obtener un producto por nombre</h2>
GET http://172.0.0.1:8000/api/products?name=Producto
Authorization:
Type: API Key
Key: api_key
Value: [api-key-actual] (obtenida por el endpoint mencionado anteriormente)
Add to: Header


<h2>Obtener una página en especifico (los productos de paginan de a 10)</h2>
GET http://172.0.0.1:8000/api/products?page=2
Authorization: Bearer [api-key-actual] (obtenida por el endpoint mencionado anteriormente)

<h2>Actualizar un producto en especifico</h2>
PUT http://172.0.0.1:8000/api/products/{id}
{
	“name”: “Producto Actualizado”,
	“description”: “Un producto nuevo actualizado”,
	“image”: “https://imagen-de-prueba.com/image”
	“brand”: “Marca nueva actualizada”,
“price”: 1500,
	“price_sale”: 1499,
“category”: “Producto de indumentaria actualizado”,
	“stock”: 11
	
}

Authorization:
Type: API Key
Key: api_key
Value: [api-key-actual] (obtenida por el endpoint mencionado anteriormente)
Add to: Header

<h2>Eliminar un producto</h2>
DELETE http://172.0.0.1:8000/api/products/{id}
Authorization:
Type: API Key
Key: api_key
Value: [api-key-actual] (obtenida por el endpoint mencionado anteriormente)
Add to: Header



<h1>ERRORES</h1>
Si la solicitud no es válida, la API devolverá un error con el siguiente formato:

{
	“error”: “El nombre del producto es obligatorio”,
	“status_code”: 400
}


