<?php 

use Model\ActiveRecord;

require __DIR__ . '/../vendor/autoload.php';

// Cargar variables del .env desde la raíz del proyecto
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

// Funciones y configuración de la base de datos
require 'funciones.php';
require 'config/database.php';

// Asignar conexión de base de datos a ActiveRecord
ActiveRecord::setDB($db);
