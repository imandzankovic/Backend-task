Install MySql

CREATE USER 'omar1234'@'localhost' IDENTIFIED BY 'password1234'; GRANT ALL PRIVILEGES ON *.* TO 'omar1234'@'localhost' WITH GRANT OPTION;

create schema backend

open with visual studio code -rename .env.example to .env
change data in .env like this: DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=backend DB_USERNAME=omar1234 DB_PASSWORD=password1234

Steps:

INSTALL: composer install

MIGRATE AND SEED: php artisan migrate

php artisan db:seed --class=UserSeeder

php artisan db:seed --class=TaskSeeder

php artisan db:seed --class=ProjectSeeder

php artisan key:generate

START: php artisan serve

in folder docs - Documentation created with phpDoc
in folder Postman - Postman Collection for API Testing

