<?php

namespace src\Models;

require_once __DIR__ . "/../Interfaces/EntidadesInterface.php";
require_once __DIR__ . '/../Core/DataBase.php';

use PDO;
use PDOException;
use src\Core\Database;
use src\Interfaces\EntidadesInterface;

class UnidadMedida implements EntidadesInterface
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Obtener todas las unidades de medida
    public function getAll() :array
    {
        try {
            $stmt = $this->db->query("SELECT * FROM unidad_medida");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener las unidades de medida: " . $e->getMessage();
            return [];
        }
    }

    // Obtener una unidad de medida por su ID
    public function getById(int $id) :array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM unidad_medida WHERE id_unidad_medida = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la unidad de medida: " . $e->getMessage();
            return [];
        }
    }
}
