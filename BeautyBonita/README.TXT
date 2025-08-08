# 1. Iniciar todo
(TENER DESACTIVADO XAMPP)
docker-compose up -d

# 2. Entrar al contenedor Laravel
docker exec -it laravel_app bash

# 3. Instalar dependencias
composer install

# 4. Generar clave y migrar
php artisan key:generate
php artisan migrate
