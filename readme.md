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

* php artisan make:migration create_exercise_user_table --create=user_exercise

## Create controllers

* php artisan make:controller TagController
* php artisan make:controller ExerciseController
* php artisan make:controller FileController

## Insert tags

INSERT INTO tags (title, description) VALUES ('Fisica mecánica', 'La mecánica es la rama de la física que estudia y analiza el movimiento y reposo de los cuerpos, y su evolución en el tiempo, bajo la acción de fuerzas.');

INSERT INTO tags (title, description) VALUES ('Física de campos', 'En física, la teoría de campos describe el conjunto de principios y técnicas matemáticas que permiten estudiar la dinámica y distribución espacial de los campos físicos.');

INSERT INTO tags (title, description) VALUES ('Física de ondas', 'La física de ondas estudia la propagación de perturbaciones de medios materiales y de campos en un contexto clásico, destacando sus implicaciones y sus efectos en medios deformables: acústica y óptica.');

INSERT INTO tags (title, description) VALUES ('Geometría Euclidiana', 'Estudia las figuras geométricas planas, sus definiciones, sus características, propiedades, principales características y sus relaciones. ');

INSERT INTO tags (title, description) VALUES ('Química general e inorgánica', 'La Materia (elementos, compuestos y mezclas), sus transformaciones y relaciones cualitativas y cuantitativas que se establecen entre las diferentes de forma de la materia y su relación con la energía.');

INSERT INTO tags (title, description) VALUES ('Fundamentos de Programación', 'Implementar algoritmos computacionales en un lenguaje de programación que valide la entrada de datos y permita su ejecución, mediante el uso del pensamiento lógico y sistémico dando solución a problemas básicos de ingeniería y de la vida diaria.');

INSERT INTO tags (title, description) VALUES ('Cálculo Diferencial', 'Expresiones y operaciones algebraicas, funciones algebraicas, funciones trigonométricas, funciones trascendentes, la derivada y optimización.');

INSERT INTO tags (title, description) VALUES ('Cálculo Integral', 'Resolver problemas de ingeniería mediante la aplicación de los conceptos de: integral definida, series de términos constantes y series de potencias.');

INSERT INTO tags (title, description) VALUES ('Cálculo Vectorial', 'Modelar con rigor situaciones reales que se representan por medio de funciones de varias variables y analizar su comportamiento mediante la aplicación de la derivada, la integral y las herramientas de la Geometría Vectorial.');