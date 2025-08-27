# -- correr primero composer para poder correr la app de laravel --
docker-compose run --rm app composer install

# 1. Iniciar todo
(TENER DESACTIVADO XAMPP)
# 1. Iniciar todo (TENER DESACTIVADO XAMPP)
docker-compose up -d

# 2. Entrar al contenedor Laravel (para ejecutar codigos como php artisan)
docker exec -it laravel_app bash


# 3. Instalar dependencias
composer install

# 4. Generar clave y migrar
# 3. Generar clave y migrar
php artisan key:generate
php artisan migrate

-----------------------------------------------------------------
--- Comandos Adicionales ---
Comandos ejecutables crear y eliminar
 * docker compose up --build -d
 * docker compose down

Iniciar y detener el contenedor desde la terminal
 * docker-compose stop
 * docker-compose start


--- configurado para utilizar enrutamiento de APIs ---
* docker compose exec application php artisan install:api --passport

CREAR ---  MODELO / MIGRACIONES / CONTROLADORES ---
* php artisan make:model Evento -mcr --api


