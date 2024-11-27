# Clinic

## Requirements
PHP 8.3 x
MySQL 8.0 x
or
Docker Desktop

## Installation without Docker
````
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan dusk:install
php artisan dusk:chrome-driver
php artisan serve
````

## Usefull commands
````
php artisan db:seed --class=ProcedureCategoriesSeeder
php artisan db:seed --class=ProceduresSeeder
````

## Run Test
````
php artisan dusk
````

## Installation with Docker
````
./vendor/bin/sail up
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
./vendor/bin/sail artisan storage:link
./vendor/bin/sail artisan dusk:install
./vendor/bin/sail artisan dusk:chrome-driver
````

## Usefull commands
````
./vendor/bin/sail artisan db:seed --class=ProcedureCategoriesSeeder
./vendor/bin/sail artisan db:seed --class=ProceduresSeeder
````

## Run Test
````
./vendor/bin/sail artisan dusk
````