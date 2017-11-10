# laravelTest
This project is a sample shopping cart application.

It will display Apple and Orange to be ready to add to cart.

It will show items in cart. You can delete item in cart.

It applies to 2 promotions

  1. buy one, get one free on Apples

  2. 3 for the price of 2 on Oranges

It uses 

  .laravel 5.5 framework 
  
  .Eloquent ORM
  
  .Mysql Database

## install composer dependency

composer install  

## database config
  ###.env file 
  
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=laravel_shop

DB_USERNAME=root

DB_PASSWORD=root123

  ### config/app.php
'mysql' => [

            'driver' => 'mysql',
            
            'host' => env('DB_HOST', '127.0.0.1'),
            
            'port' => env('DB_PORT', '3306'),
            
            'database' => env('DB_DATABASE', 'laravel_shop'),
            
            'username' => env('DB_USERNAME', 'root'),
            
            'password' => env('DB_PASSWORD', 'root123'),
            
            'unix_socket' => env('DB_SOCKET', ''),
            
            'charset' => 'utf8',
            
            'collation' => 'utf8_unicode_ci',
            
            'prefix' => '',
            
            'strict' => true,
            
            'engine' => null,
            
        ],

## create database
  database name is 'laravel_shop'
  
  CREATE DATABASE laravel_shop;

## create database tables and sample data

  1. php artisan migrate:install
  
  2.php artisan migrate
  
  3.php artisan db:seed
  
## web application entry

http://localhost/public





