## Taller Avanzado de Desarrollo Web - Evaluacion Practica N 3

Integrantes:
- Domingo Vega (ICINF).
- Matias San Martin (ICINF).


## Sobre el proyecto

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Proyecto PHP construido con el popular framework Laravel, diseñado para crear un backend, el cual se encarga de manejar la logica y la gestion de datos detras de escena.

## Caracteristicas del proyecto

- Desarrollado en PHP, utilizando el framework Laravel.
- Arquitectura MVC (Modelo-Vista-Controlador).
- Integracion con la herramienta de base de datos MySQL.

# Primeros pasos

### 1. Instalaciones requeridas:
    1.1 PHP 8
    1.2 [Composer] (https://getcomposer.org/download/)
    1.3 MySQL: `apt-get install php-mysql`

### 2. Creacion de proyecto (Laravel):

Para crear el proyecto se utiliza `composer create-project laravel/laravel` 

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


