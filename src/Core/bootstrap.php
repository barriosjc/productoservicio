<?php

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../Models/ProductoServicio.php';
require_once __DIR__ . '/../Services/ProductoServicioValidator.php';
require_once __DIR__ . '/../Controllers/ProductoServicioController.php';
require_once __DIR__ . "/../Services/ProductoServicioRepository.php";
require_once __DIR__ . "/DataBase.php";

use src\Core\DataBase;
use src\Models\ProductoServicio;
use src\Services\ProductoServicioValidator;
use src\Controllers\ProductoServicioController;
use src\Repositories\ProductoServicioRepository;

$DataBase = new DataBase();
$dbConnection = $DataBase->getConnection();
$productoServicioRepository = new ProductoServicioRepository($dbConnection);
$model = new ProductoServicio($productoServicioRepository);

$validator = new ProductoServicioValidator();
$controller = new ProductoServicioController($model, $validator);
