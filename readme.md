## Create initial shit

* CREATE USER 'donpepeysusglobos'@'localhost' IDENTIFIED BY 'sierrita';
* CREATE DATABASE reposteriadb;
* GRANT ALL PRIVILEGES ON reposteriadb.* TO 'donpepeysusglobos'@'localhost';

## Create auth

* php artisan make:auth

## Crete models

* php artisan make:model Tag -m
* php artisan make:model Exercise -m
* php artisan make:model File -m

* php artisan migrate

## Create many to many relationships

* php artisan make:migration create_user_exercise_table --create=user_exercise

## Create controllers

* php artisan make:controller TagController
* php artisan make:controller ExerciseController
* php artisan make:controller FileController

## Insert tags

INSERT INTO tags (title, description) VALUES ('Fisica mecánica', 'Fisica mecánica');
INSERT INTO tags (title, description) VALUES ('Física de campos', 'Física de campos');
INSERT INTO tags (title, description) VALUES ('Física de ondas', 'Física de ondas');
INSERT INTO tags (title, description) VALUES ('Química general e inorgánica', 'Química general e inorgánica');
INSERT INTO tags (title, description) VALUES ('Biología', 'Biología');