# Clinic

## Requirements
* Docker Desktop



## Installation
````
./vendor/bin/sail up
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
./vendor/bin/sail artisan storage:link
````

## Usefull commands
````
./vendor/bin/sail artisan db:seed --class=ProcedureCategoriesSeeder
./vendor/bin/sail artisan db:seed --class=ProceduresSeeder
````