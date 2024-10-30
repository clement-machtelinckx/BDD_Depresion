<?php

namespace App\Class;
use PDO;
use PDOException;
use App\Class\Database;
class Table extends Database
{
    private $tableName;
    private $columns = [];
    private $values = [];
    private $pdo;

    public function __construct($host, $username, $password, $dbName, $tableName)
    {
        parent::__construct($host, $username, $password, $dbName);
        $this->tableName = $tableName;
    }

    public function createColumns($tableName, $columns)
    {
        $this->columns = $columns;
        $sql = "CREATE TABLE $this->tableName (";
        foreach ($this->columns as $column) {
            $sql .= "$column, ";
        }
        $sql = rtrim($sql, ", ");
        $sql .= ")";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Table created successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error creating table: " . $e->getMessage()]);
        }
    }
}