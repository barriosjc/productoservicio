<?php

require __DIR__ . '/Core/bootstrap.php'; // Cargamos las dependencias desde bootstrap.php
require __DIR__ . '/Views/main.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$view = '';  

// rutas
switch (true) {
    case ($uri === '/' || $uri === '/sdn/'):
        $controller->index();
        break;

    case (substr($uri, -strlen('/productoservicio')) === '/productoservicio'):
        $controller->index();
        break;

    case (substr($uri, -strlen('/productoservicio/create')) === '/productoservicio/create'):
        $controller->create();
        break;

    case (preg_match('/\/productoservicio\/edit\/(\d+)/', $uri, $matches)):
        $controller->edit($matches[1]);
        break;

    case (preg_match('/\/productoservicio\/delete\/(\d+)/', $uri, $matches)):
        $controller->delete($matches[1]);
        exit;

    case (substr($uri, -strlen('/listados')) === '/listados'):
        $controller->listados();
        break;
    
    default:
        http_response_code(404);
        echo "404 Not Found";
        exit;
}

