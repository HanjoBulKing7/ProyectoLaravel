# -- correr primero composer para poder correr la app de laravel --
docker-compose run --rm app composer install

# 1. Iniciar todo
(TENER DESACTIVADO XAMPP)
# 1. Iniciar todo (TENER DESACTIVADO XAMPP)
docker-compose up -d

# 2. Entrar al contenedor Laravel
docker exec -it laravel_app bash

# 3. Instalar dependencias
composer install

# 4. Generar clave y migrar
# 3. Generar clave y migrar
php artisan key:generate
php artisan migrate


--- Comandos Adicionales ---

Elimina el contenedor y el
volumen de la base de datos:
  
docker-compose down --volumes