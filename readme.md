## Create initial shit

CREATE USER 'donpepeysusglobos'@'localhost' IDENTIFIED BY 'sierrita';
CREATE DATABASE reposteriadb;
GRANT ALL PRIVILEGES ON reposteriadb.* TO 'donpepeysusglobos'@'localhost';

## Create auth
php artisan make:auth

## Crete models

php artisan make:model Tag -m
php artisan make:model Exercise -m
php artisan make:model File -m

php artisan migrate

## Create many to many relationships

php artisan make:migration create_user_exercise_table --create=user_exercise



