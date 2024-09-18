# Clinic

## Requirements
* Docker Desktop



## Installation
````
./vendor/bin/sail up
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan storage:link
./vendor/bin/sail php artisan db:seed
````