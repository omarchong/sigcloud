

## SIGCLOUD
### Este sistema esta desarrolado bajo las siguientes tecnologias.

- Lenguaje de programación: PHP 7.4 o en adelante
- Framework: laravel en la version 8
- Gestor de base de datos: MYSQL
- Diseño: CSS3 y Bootstrap en la version 4.
- Frontend: Blade con js y jquery.
------
### Instrucciones para levantar el sistema en desarrollo.
- 1.- Para descargar el proyecto ingrese al siguiente link https://github.com/omarchong/sigcloud.git y siga las instrucciones como lo indoca githun¿b para clonar un proyecto.
- 2.- Dirijase a la terminal de su preferencia en su computador colocando la ruta en la que se encuentra el proyecto "SIGCLOUD"
- 3.- Una vez que abrio el proyecto en su editor de preferencia y en la terminal elejida ingrese los siguientes comandos 
- 4.- composer install, este comando re-instala los paquetes y dependecias usados. 
- 5.- composer update, este comando actualizara todos los paquetes que fueron instalados en el desarrollo para seguir la misma estructura.
- 6.- Realice una copia del archivo .envexample que se encuentra dentro del proyecto y renombre por .env
- 7.- Genere la clave de acceso a travez del comando php artisan key:generate, este comando genera la clave de encriptación de la aplicación.
- 8.- Cree una base de datos y configure el archivo .env con sus accesos de la base de datos, nombre, servidor y contraseña.
- 9.- La base de datos la puede generar con el comando php artisan migrate o en su defecto php artisan migrate:fresh --seed para obtener datos de prueba.
- 10.- Con esto ya tenemos lista la aplicación para poder abrirla en desarrollo.
- 11.- Ejecute el comando php artisan serv o si bien lo desea puede abrirlo con localhost/rutadelproyecto en el navegador.
- 12.- para verlo en el navegador coloque el siguiente enlace en el buscador http://127.0.0.1:8000
--------
### Accesos para poder ingresar al sistema
- Usuario: Chong
- Password: omar1234
--------- 
### Variables de entrono .env
- En este archivo se encuentran las variables de entorno de la base de datos, email, apis etc.
- Dentro del mismo se puede configurar lo que sea necesario con los datos solicitados.

