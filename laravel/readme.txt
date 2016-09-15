 PASOS DE CONFIGURACION  PROYECTO LARAVEL:

 1. Generar la llave con key:generate si en caso que le pida el key (llave):
    ejemplo:
    $ php artisan key:generate
    resultado:
    Application key [Idgz1PE3zO9iNc0E3oeH3CHDPX9MzZe3] set successfully.

 2. Configurar la conexion con  la BD del proyecto en el archivo .env: 
    ejemplo nombre de la BD: 'l5'
			DB_CONNECTION=pgsql
			DB_HOST=localhost
			DB_PORT=5432
		    DB_DATABASE=l5
			DB_USERNAME=postgres
			DB_PASSWORD=123456

 3. Dentro de la Carpeta Config, configurar el archivo database.php 
    ejemplo:
 			'database' => env('DB_DATABASE', 'l5'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', '123456'),


 4. Dar permisos con el comando chmod, buscando directorio de la carpeta del proyecto, ejemplo:
 	sudo cd mi_proyecto 
 	sudo chmod -R 777 * 

 5. Levantar el proyecto con:
    $ php artisan serve
    Resultado:
    Laravel development server started on http://localhost:8000/

 6.Ingresar a http://localhost:8000/


 

