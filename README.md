# Taller Avanzado de Desarrollo Web - Evaluacion Practica N 3

Integrantes:
- Domingo Vega (ICINF).
- Matias San Martin (ICINF).

# Rutas del proyecto

## Rutas para el modelo Perro

- Crear un perro:
La ruta para crear un perro es http://127.0.0.1:8000/api/perro/create y el cuerpo en formato json de la solicitud (POST) debe llevar los siguientes datos:

```json
{
	"name": "nombrePerro",
	"url":"urlFotoPerro",
	"descripcion": "descripcionPerro"
}
```

- Para buscar y ver un perro (Por ID):
La ruta para visualizar un perro es http://127.0.0.1:8000/api/perro/view y el cuerpo de en formato json lleve llevar por dato el `id` del perro a visualizar, en este ejemplo se visualiza el perro de id "6".

```json
{
	"id": 6
}
```

- Para modificar datos de un perro (Por ID):
La ruta para modificar los datos de un perro es http://127.0.0.1:8000/api/perro/update y en el cuerpo del json actualmente se deben incorporar todos los datos del perro, los que se conservaran y los que se modificaran, esta en proceso de mejora aun, un ejemplo para actualizar los registros del perro de id "1":
```json
{
	"id": 1,
	"name": "PerroActualizado",
	"url": "urlActualizada",
	"descripcion":"descripcionActualizada"
}
```

- Para eliminar un perro (Por ID):
La ruta para eliminar un perro de la base de datos es: http://127.0.0.1:8000/api/perro/delete y en el cuerpo del json solo debe ir la id del perro a eliminar, ejemplo para eliminar el perro de id 12


```json
{
	"id": 12
}
```

- Para ver todos los perros existentes:
La ruta para visualizar todos los perros de la base de datos es: http://127.0.0.1:8000/api/perro/viewAll y **no es necesario un json con datos**.

## Rutas para el modelo Interaccion

- Para crear una interaccion:
La ruta para crear una interaccion entre perros es http://127.0.0.1:8000/api/interaccion/create y en el cuerpo json debe tener los siguientes datos (A: Aceptado, R: Rechazado).
```json
{
	"idPerroInteresado": 3,
	"idPerroCandidato": 4,
	"preferencia": "A"
}
```

- Para visualizar una interaccion de un perro (ID de Registro):
La ruta para visualizar una interaccion es: http://27.0.0.1:8000/api/interaccion/view y en el cuerpo json se debe incluir unicamente la id de la interaccion a visualizar, por ejemplo para ver la interaccion del registro de id 2:
```json
{
	"id": 2
}
```

- Para actualizar valores de un registro de interaccion:
La ruta para actualizar un registro de una interaccion es: http://127.0.0.1:8000/api/interaccion/update y en el cuerpo json debe incluir la id del registro de interaccion a modificar, y los valores no se modificaran y los valores que si se modificaron,

```json
{
	 	"id": 3,
		"idPerroInteresado": 3,
		"idPerroCandidato": 4,
		"preferencia": "A"
}
```

- Para eliminar una interaccion (Por ID de registro de interaccion):
La ruta para eliminar el registro de una interaccion es: http://127.0.0.1:8000/api/interaccion/delete y **en el cuerpo se debe incluir unicamente la ID del registro que se eliminara, no confundir con los id de los perros.**

```json
{
	"id": 3
}
```

- Para ver todas las interacciones existentes:
La ruta para visualizar todos los registros de interacciones en la base de datos es: http://127.0.0.1:8000/api/interaccion/viewAll y no es necesario mandar un json en la solicitud.


## Sobre el proyecto

<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

Proyecto PHP construido con el popular framework Laravel, diseñado para crear un backend, el cual se encarga de manejar la logica y la gestion de datos detras de escena.

## Caracteristicas del proyecto

- Desarrollado en PHP, utilizando el framework Laravel.
- Arquitectura MVC (Modelo-Vista-Controlador).
- Integracion con la herramienta de base de datos MySQL.

# Primeros pasos

### 1. Instalaciones requeridas:
    1.1 PHP 8: 
    ```bash
        apt-get update
        apt-get install --no-install-recommends php8.1
        apt-get install -y php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath

        php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
        php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
        php composer-setup.php
        php -r "unlink('composer-setup.php');"   
    ```
    1.2 [Composer] (https://getcomposer.org/download/)
    1.3 MySQL: `apt-get install php-mysql`

### 2. Creacion de proyecto (Laravel):

Para crear el proyecto se utiliza `composer create-project laravel/laravel nombre_proyecto` 

### 3. Generar clave de cifrado unica para el proyecto:

La clave generada se utiliza para cifrar datos sensibles de la aplicacion, como las cookies y las contrasenas, se utiliza el comando `php artisan key:generate`, una vez ejecutado el comando, Laravel genera una nueva clave de cifrado y la establece automaticamente en el archivo '.env' del proyecto.

### 4. Creacion de un usuario y una base de datos para MySQL:

- Ingresar a MySQL por consola con el comando `sudo mysql -u root -p`.
- Crear un usuario en el sistema de la base de datos MySQL con el comando `CREATE USER 'nombre_usuario'@'localhost' IDENTIFIED BY 'contrasena_usuario'`
- Establecer una contrasena para el usuario que se acaba de crear con el comando `SET PASSWORD FOR 'nombre_usuario'@'localhost' IDENTIFIED BY 'contrasena_usuario'`
- Otorgarle privilegios al usuario con el comando `GRANT ALL ON . TO 'nombre_usuario'@'localhost'`
- Crear una base de datos con el comando `CREATE DATABASE nombre_baseDeDatos`

### 5. Configuraracion de base de datos:

En el archivo '.env' del proyecto configurar los siguientes parametros:
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_USERNAME='nombre_usuario'
- DB_PASSWORD='contrasena_usuario'

### 6. Comienzo del proyecto:

 1. Creacion un modelo:
 Un modelo representa una tabla en la base de datos y define la estructura y comportamiento de los datos, para crear un model se utiliza el comando `php artisan make:model nombre_modelo -m` donde '-m' se utiliza para generar una migracion junto con el modelo.

 2. Creacion de un controlador del modelo:
 Un controlador se utiliza para recibir las solicitudes del usuario, procesar los datos y enviar una respuesta adecada, para crear un controlador se utiliza el comando `php artisan make:controller 'nombre_modeloControler`.

 3. Creacion de solicitud:
 Se utiliza para manejar y validar los datos de entrada de una solicitud HTPP y se crea con el comando `php artisan make:request nombreRequest`.

 4. Configuracion de rutas:
 Una vez creado el modelo, el controlador y la solicitud se debe configurar las rutas correspondientes en Laravel para que las solicitudes entrantes sean dirigidas a las acciones adecuadas en el controlador, esto se realiza en el archivo 'routes/api.php':

```php
    use App\Http\Controllers\NombreModeloController;

    Route::prefix('/nombre_modelo')->group(function () {
        Route::post('/create', [NombreModeloController::class, 'createModel']);
        Route::get('/view', [NombreModeloController::class, 'showModel']);
        Route::put('/update', [NombreModeloController::class, 'updateModel']);
        Route::delete('/delete', [NombreModeloController::class, 'deleteModel']);
    });
```

5. Creacion de Factory:
 Un factory, se utiliza para crear datos falsos o de prueba rapidamente, para crear un factory se utiliza el comando `php artisan make:factory nombre_modeloFactory --model=nombre_modelo` y se generara en el directorio 'database/factories' donde en el factory creado se puede encontrar el metodo define, el cual define como se deben generar los datos para el modelo asociado al factory. Por ejemplo tenemos un factory para el modelo 'Perro' y el factory seria 'PerroFactory' y el codigo seria el siguiente

 Nota: Factory utiliza un paquete llamado 'faker' que es una biblioteca para generar datos falsos, no se necesita instalar ya que viene incluido de forma predeterminada pero si de todos modos se quiere instalar se realiza con el comando `composer require fakerphp/faker`

```php
    namespace Database\Factories;
    use Illuminate\Database\Eloquent\Factories\Factory;
    // Se importa el modelo asociado al factory
    use App\Models\Perro;

    class PerroFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                "name" => $this->faker->name(),
                "url" => $this->faker->text(),
                "descripcion" => $this->faker->text(),
            ];
        }
    }
```

Luego se debe configurar en 'database/seeders/DatabaseSeeder.php' el seeder para indicar cuantos registros generar
```php
    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use App\Models\Perro;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            Perro::factory()->count(10)->create();
        }
    }
```

6. Poblar base de datos:
Para ejecutar uno o varios seeders se utiliza el comando `php artisan db:seed`


