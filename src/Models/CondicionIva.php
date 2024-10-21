<?php

namespace src\Models;

require_once __DIR__ . "/../Interfaces/EntidadesInterface.php";
require_once __DIR__ . '/../Core/DataBase.php';

use PDO;
use PDOException;
use src\Core\DataBase;
use src\Interfaces\EntidadesInterface;

/**
 * Modelo para gestionar los maestros de Condiciones de IVA.
 */
class CondicionIva implements EntidadesInterface
{
    private $db;

    /**
     * Constructor.
     * Establece la conexión con la base de datos al crear la instancia.
     */
    public function __construct()
    {
        $DataBase = new DataBase();
        $this->db = $DataBase->getConnection();
    }

    /**
     * Obtiene todas las condiciones de IVA.
     * 
     * @return array Arreglo con todas las condiciones de IVA.
     */
    public function getAll(): array
    {
        try {
            $stmt = $this->db->query("SELECT * FROM condicion_iva");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la condición de IVA: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Obtiene una condición de IVA por su ID.
     * 
     * @param int $id ID de la condición de IVA.
     * @return array Arreglo asociativo con la condición de IVA o vacío si no se encuentra.
     */
    public function getById(int $id): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM condicion_iva WHERE id_condicion_iva = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la condición de IVA: " . $e->getMessage();
            return [];
        }
    }
}
