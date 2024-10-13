<?php

namespace src\Interfaces;

interface ProductoServicioInterface
{
    public function getEmpty() :array;
    public function getAll() :?array;
    public function getById(int $id) :array;
    public function getByFilter(array $data) :array;
    public function create(array $data) :bool;
    public function update(int $id, array$data) :bool;
    public function delete(int $id) :bool;
    public function listado(string $periodo) :array;
}
