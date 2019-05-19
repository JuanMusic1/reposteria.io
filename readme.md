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

INSERT INTO tags (title, description) VALUES ('Fisica mecánica', 'La mecánica es la rama de la física que estudia y analiza el movimiento y reposo de los cuerpos, y su evolución en el tiempo, bajo la acción de fuerzas.');
INSERT INTO tags (title, description) VALUES ('Física de campos', 'En física, la teoría de campos describe el conjunto de principios y técnicas matemáticas que permiten estudiar la dinámica y distribución espacial de los campos físicos.');
INSERT INTO tags (title, description) VALUES ('Física de ondas', 'La física de ondas estudia la propagación de perturbaciones de medios materiales y de campos en un contexto clásico, destacando sus implicaciones y sus efectos en medios deformables: acústica y óptica.');
