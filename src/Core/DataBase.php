<?php

namespace src\Core;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $db   = 'sdn';
    private $user = 'postgres';  
    private $pass = 'postgres';
    private $charset = 'utf8';
    private $port = '5432';
    private $pdo;
    private $error;

    public function __construct()
    {
           $dsn = "pgsql:host=$this->host;port=$this->port;dbname=$this->db;options='--client_encoding=$this->charset'";
        
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo "Connection failed: " . $this->error;
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
