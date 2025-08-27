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
-------------------------------------------------------------------
🚀 Pasos para levantar el proyecto

Levantar los contenedores con Docker:
docker compose up -d --build

Ejecutar las migraciones de la base de datos:
docker compose exec app php artisan migrate

Ejecutar los seeders para poblar datos iniciales:
docker compose exec app php artisan db:seed

Levantar el servidor de Vite para compilar assets (Tailwind, JS, etc.):
docker compose exec app npm run dev

Abrir en el navegador:
http://localhost:8000/register

✅ Con esto ya tendrás el sistema funcionando y podrás registrarte en el CRM.
-----------------------------------------------------------------------
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


