# PHP Backend Laravel

## Instalacion Composer

* laravel new BackendAppLaravel

* composer create-project laravel/laravel BackendAppLaravel 

## Levantar App 

* php -S localhost:8888 -t public


## Comandos

* php artisan make:controller BackendController


## Migrations

* php artisan make:migration create_product_table

* php artisan make:migration add_price_to_product_table --table=product

* php artisan migrate:rollback

* php artisan make:migration create_category_table

* php artisan make:migration add_category_id_to_product_table --table=product


* php artisan migrate


## Seeders

* php artisan make:seeder CategoryTable

* php artisan db:seed

* php artisan migrate:fresh --seed

* php artisan make:seeder ProductTableSeeder

## Models

* php artisan make:model Category

* php artisan make:model Product

## Factories

* php artisan make:factory CategoryFactory

* php artisan make:factory ProductFactory

* php artisan migrate:fresh --seed
