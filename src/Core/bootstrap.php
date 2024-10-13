<?php

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../Models/ProductoServicio.php';
require_once __DIR__ . '/../Services/ProductoServicioValidator.php';
require_once __DIR__ . '/../Controllers/ProductoServicioController.php';
require_once __DIR__ . "/../Services/ProductoServicioRepository.php";
require_once __DIR__ . "/../Core/Database.php";

use src\Core\Database;
use src\Models\ProductoServicio;
use src\Services\ProductoServicioValidator;
use src\Controllers\ProductoServicioController;
use src\Repositories\ProductoServicioRepository;

$database = new Database();
$dbConnection = $database->getConnection();
$productoServicioRepository = new ProductoServicioRepository($dbConnection);
$model = new ProductoServicio($productoServicioRepository);

$validator = new ProductoServicioValidator();
$controller = new ProductoServicioController($model, $validator);
