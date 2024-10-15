<?php

namespace src\Models;

require_once __DIR__ . "/../Interfaces/EntidadesInterface.php";
require_once __DIR__ . '/../Core/DataBase.php';

use PDO;
use PDOException;
use src\Core\Database;
use src\Interfaces\EntidadesInterface;

/**
 * Modelo para gestionar los maestros de rubros.
 */
class Rubro implements EntidadesInterface
{
    private $db;

    /**
     * Constructor.
     * Establece la conexión con la base de datos al crear la instancia.
     */
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    /**
     * Obtiene todos los rubros.
     * 
     * @return array Arreglo con todos los rubros.
     */
    public function getAll(): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM rubro");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los rubros: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Obtiene un rubro por su ID.
     * 
     * @param int $id ID del rubro.
     * @return array|null Arreglo asociativo con el rubro o null si no se encuentra.
     */
    public function getById(int $id): array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM rubro WHERE id_rubro = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener el rubro: " . $e->getMessage();
            return null;
        }
    }
}
