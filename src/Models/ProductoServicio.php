<?php

namespace src\Models;

require_once __DIR__ . '/../Interfaces/ProductoServicioInterface.php';

use src\Repositories\ProductoServicioRepository;
use src\Interfaces\ProductoServicioInterface;

class ProductoServicio implements ProductoServicioInterface
{
    private $repository;

    public function __construct(ProductoServicioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    public function getById(int $id): array
    {
        return $this->repository->findById($id);
    }

    public function getByFilter(array $data): array
    {
        return $this->repository->findByFilter($data);
    }

    public function create(array $data): bool
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function listado(string $periodo) :array
    {
        return $this->repository->listado($periodo);
    }

    public function getEmpty(): array
    {
        return [
            'id_producto_servicio' => null,
            'id_rubro' => null,
            'tipo' => '',
            'id_unidad_medida' => null,
            'codigo' => '',
            'producto_servicio' => '',
            'id_condicion_iva' => null,
            'precio_bruto_unitario' => 0.00
        ];
    }
}
