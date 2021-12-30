## Install
    - composer install
    - php artisan key:generate
    - Kuncinya akan ditulis secara otomatis di file .env Anda.
## Database
    - buat database laravel_transisi
    - php artisan migrate
    - php artisan storage:link
	- php artisan company:link // Ujicoba berjalan di linux
## Running Seeders
    - php artisan migrate:refresh --seed
## Database Config
    - config/database.php
```
    edit .env
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_superserver
    DB_USERNAME=root
    DB_PASSWORD=
```
## Admin panel
```
    username : admin@transisi.id
    password : transisi

	demo import excel : employee.xlsx

```