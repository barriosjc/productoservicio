<?php

namespace src\Repositories;

use PDO;
use PDOException;
use InvalidArgumentException;

class ProductoServicioRepository
{
    private $db;

    /**
     * Constructor de la clase.
     *
     * @param PDO $db Instancia de la conexión a la base de datos.
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Obtiene todos los productos/servicios.
     *
     * @return array Arreglo asociativo con los productos/servicios.
     */
    public function findAll(): array
    {
        try {
            $sql = "
                SELECT ps.*, r.rubro, um.unidad_medida, ci.condicion_iva
                FROM producto_servicio ps
                LEFT JOIN rubro r ON ps.id_rubro = r.id_rubro
                LEFT JOIN unidad_medida um ON ps.id_unidad_medida = um.id_unidad_medida
                LEFT JOIN condicion_iva ci ON ps.id_condicion_iva = ci.id_condicion_iva
                ORDER BY ps.id_producto_servicio
            ";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            echo "Error al obtener todos los productos: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Obtiene un producto/servicio por su ID.
     *
     * @param int $id ID del producto/servicio.
     * @return array Arreglo asociativo con los datos del producto/servicio.
     */
    public function findById(int $id): array
    {
        try {
            $sql = "
                SELECT ps.*, r.rubro, um.unidad_medida, ci.condicion_iva
                FROM producto_servicio ps
                LEFT JOIN rubro r ON ps.id_rubro = r.id_rubro
                LEFT JOIN unidad_medida um ON ps.id_unidad_medida = um.id_unidad_medida
                LEFT JOIN condicion_iva ci ON ps.id_condicion_iva = ci.id_condicion_iva
                WHERE ps.id_producto_servicio = :id
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            echo "Error al obtener el producto con ID $id: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Busca productos/servicios utilizando filtros dinámicos.
     *
     * @param array $data Filtros de búsqueda (campo => valor).
     * @return array Arreglo asociativo con los productos/servicios que coinciden con los filtros.
     */
    public function findByFilter(array $data): array
    {
        try {
            $sql = "
                SELECT ps.*, r.rubro, um.unidad_medida, ci.condicion_iva
                FROM producto_servicio ps
                LEFT JOIN rubro r ON ps.id_rubro = r.id_rubro
                LEFT JOIN unidad_medida um ON ps.id_unidad_medida = um.id_unidad_medida
                LEFT JOIN condicion_iva ci ON ps.id_condicion_iva = ci.id_condicion_iva
                WHERE 1=1
            ";

            $params = [];

            foreach ($data as $field => $value) {
                if (!empty($value)) {
                    $sql .= " AND ps.$field = :$field";
                    $params[":$field"] = $value;
                }
            }

            $stmt = $this->db->prepare($sql);

            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            echo "Error al obtener los productos con filtros: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Crea un nuevo producto/servicio en la base de datos.
     *
     * @param array $data Datos del nuevo producto/servicio.
     * @return bool Devuelve true si la creación fue exitosa, false en caso contrario.
     */
    public function create(array $data): bool
    {
        try {
            $sql = "
                INSERT INTO producto_servicio (id_rubro, tipo, id_unidad_medida, codigo, producto_servicio, id_condicion_iva, precio_bruto_unitario)
                VALUES (:id_rubro, :tipo, :id_unidad_medida, :codigo, :producto_servicio, :id_condicion_iva, :precio_bruto_unitario)
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_rubro', $data['id_rubro']);
            $stmt->bindParam(':tipo', $data['tipo']);
            $stmt->bindParam(':id_unidad_medida', $data['id_unidad_medida']);
            $stmt->bindParam(':codigo', strtoupper($data['codigo']));
            $stmt->bindParam(':producto_servicio', $data['producto_servicio']);
            $stmt->bindParam(':id_condicion_iva', $data['id_condicion_iva']);
            $stmt->bindParam(':precio_bruto_unitario', $data['precio_bruto_unitario']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al crear el producto: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Actualiza un producto/servicio en la base de datos.
     *
     * @param int $id ID del producto/servicio a actualizar.
     * @param array $data Datos actualizados del producto/servicio.
     * @return bool Devuelve true si la actualización fue exitosa, false en caso contrario.
     */
    public function update(int $id, array $data): bool
    {
        try {
            $sql = "
                UPDATE producto_servicio
                SET id_rubro = :id_rubro, tipo = :tipo, id_unidad_medida = :id_unidad_medida,
                    codigo = :codigo, producto_servicio = :producto_servicio, id_condicion_iva = :id_condicion_iva,
                    precio_bruto_unitario = :precio_bruto_unitario
                WHERE id_producto_servicio = :id
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':id_rubro', $data['id_rubro']);
            $stmt->bindParam(':tipo', $data['tipo']);
            $stmt->bindParam(':id_unidad_medida', $data['id_unidad_medida']);
            $stmt->bindParam(':codigo', strtoupper($data['codigo']));
            $stmt->bindParam(':producto_servicio', $data['producto_servicio']);
            $stmt->bindParam(':id_condicion_iva', $data['id_condicion_iva']);
            $stmt->bindParam(':precio_bruto_unitario', $data['precio_bruto_unitario']);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el producto con ID $id: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Elimina un producto/servicio de la base de datos.
     *
     * @param int $id ID del producto/servicio a eliminar.
     * @return bool Devuelve true si la eliminación fue exitosa, false en caso contrario.
     */
    public function delete(int $id): bool
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM producto_servicio WHERE id_producto_servicio = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el producto con ID $id: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Lista los productos/servicios agrupados por un período de tiempo.
     *
     * @param string $periodo Período de tiempo para agrupar los resultados (DIA, SEM, MES, AÑO).
     * @return array Arreglo asociativo con la cantidad de productos/servicios agrupados por el período.
     * @throws InvalidArgumentException Si el período no es válido.
     */
    public function listado(string $periodo): array
    {
        try {
            switch (strtoupper($periodo)) {
                case 'DIA':
                    $groupBy = "DATE(ps.created_at)";
                    break;
                case 'SEM':
                    $groupBy = "DATE_TRUNC('week', ps.created_at)";
                    break;
                case 'MES':
                    $groupBy = "TO_CHAR(ps.created_at, 'YYYY-MM')";
                    break;
                case 'ANO':
                    $groupBy = "EXTRACT(YEAR FROM ps.created_at)";
                    break;
                default:
                    throw new InvalidArgumentException("Período no válido. Debe ser 'DIA', 'SEM', 'MES', o 'AÑO'.");
            }

            $sql = "
                SELECT 
                    $groupBy AS periodo, 
                    COUNT(*) AS cantidad
                FROM producto_servicio ps
                GROUP BY $groupBy
                ORDER BY $groupBy DESC
            ";

            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error al obtener la cantidad de registros agrupados por $periodo: " . $e->getMessage();
            return [];
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
            return [];
        }
    }
}
