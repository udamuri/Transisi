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
## Dasar 1 test
```
    php dasar1_1.php;
	Nilai Rata Rata : 74.952380952381
	7 Nilai Tertinggi : 79, 81, 86, 87, 90, 91, 100
	7 Nilai Terendah : 40, 55, 65, 65, 67, 69, 72%   

    php dasar1_2.php;
	TranSISI : 3

    php dasar1_3.php;
	UNIGRAM : Jakarta, adalah, ibukota, negara, Republik, Indonesia
	BIGRAM : Jakarta adalah, ibukota negara, Republik Indonesia
	TRIGRAM : Jakarta adalah ibukota, negara Republik Indonesia

    php dasar1_4.php;
	* * 3 4 * 6 * 8 
	9 * * 12 * * 15 16 
	* 18 * 20 21 * 23 24 
	* * 27 28 * 30 * 32 
	33 * * 36 * * 39 40 
	* 42 * 44 45 * 47 48 
	* * 51 52 * 54 * 56 
	57 * * 60 * * 63 64

    php dasar1_5.php;
	DFHKNQ :EDKGSK
	
    php dasar1_6.php;

```
## Admin panel Laravel
```
    username : admin@transisi.id
    password : transisi

	demo import excel : employee.xlsx

```