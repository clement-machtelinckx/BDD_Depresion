<?php
// yoyoyoy
namespace App\Class;
use PDO;
use PDOException;
class Database
{
    private $host;
    private $username;
    private $password;
    private $dbName;
    private $pdo;

    public function __construct($host, $username, $password, $dbName = null)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->host}";
            if ($this->dbName) {
                $dsn .= ";dbname={$this->dbName}";
            }
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function createDatabase($databaseName)
    {
        $sql = "CREATE DATABASE $databaseName";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Database created successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error creating database: " . $e->getMessage()]);
        }
    }
    public function dropDatabase($databaseName)
    {
        $sql = "DROP DATABASE $databaseName";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Database dropped successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error dropping database: " . $e->getMessage()]);
        }
    }
    public function useDatabase($databaseName)
    {
        $sql = "USE $databaseName";
        try {
            $this->pdo->exec($sql);
            // echo json_encode(["result" => "success", "message" => "Database connected successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error connecting database: " . $e->getMessage()]);
        }
    }
    public function getDatabase($databaseName)
    {
        $sql = "SHOW DATABASES LIKE '$databaseName'";
        $stmt = $this->pdo->query($sql);
        $database = $stmt->fetch();
        return $database;
    }

    public function createTable($tableName, $columns)
    {
        $sql = "CREATE TABLE $tableName ($columns)";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Table created successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error creating table: " . $e->getMessage()]);
        }
    }
    public function dropTable($tableName)
    {
        $sql = "DROP TABLE $tableName";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Table dropped successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error dropping table: " . $e->getMessage()]);
        }
    }
    public function getTableColumns($tableName)
    {
        $sql = "SHOW COLUMNS FROM $tableName";
        $stmt = $this->pdo->query($sql);
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $columns;
    }
    public function getTableData($tableName)
    {
        $sql = "SELECT * FROM $tableName";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function addColumn ($tableName, $columnName, $columnType) {
        $sql = "ALTER TABLE $tableName ADD COLUMN $columnName $columnType";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Column added successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error adding column: " . $e->getMessage()]);
        }
    }
    public function dropColumn ($tableName, $columnName) {
        $sql = "ALTER TABLE $tableName DROP COLUMN $columnName";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Column dropped successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error dropping column: " . $e->getMessage()]);
        }
    }
    public function getTableCollection()
    {
        $sql = "SHOW TABLES";
        $stmt = $this->pdo->query($sql);
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $tables;
    }
    public function getTableCollectionAndColumns(){
        $sql = "SHOW TABLES";
        $stmt = $this->pdo->query($sql);
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

        for ($i=0; $i < count($tables); $i++) { 
            $sql = "SHOW COLUMNS FROM $tables[$i]";
            $stmt = $this->pdo->query($sql);
            $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $tables[$i] = [
                "tableName" => $tables[$i],
                "columns" => $columns
            ];
        }
        return $tables;
    }

    public function insertRow($tableName, $data)
    {
        $columns = implode(', ', array_map(function ($column) {
            return "`$column`";
        }, array_keys($data[0])));
        $values = [];
    
        foreach ($data as $row) {
            $escapedValues = array_map([$this->pdo, 'quote'], $row);
            $values[] = '(' . implode(', ', $escapedValues) . ')';
        }
    
        $sql = "INSERT INTO $tableName ($columns) VALUES " . implode(', ', $values);
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Data inserted successfully"]);
            
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error inserting data: " . $e->getMessage()]);
        }
    }
    
    public function getRow($tableName, $columnName, $value)
    {
        $sql = "SELECT * FROM $tableName WHERE $columnName = '$value'";
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetch();
        return $row;
    }

    public function getCollectionRow($tableName)
    {
        $sql = "SELECT * FROM $tableName";
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function dropRow($tableName, $columnName, $value)
    {
        $sql = "DELETE FROM $tableName WHERE $columnName = '$value'";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Row deleted successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error deleting row: " . $e->getMessage()]);
        }
    }

    public function updateRow($tableName, $columnName, $value, $newValues)
    {
        $data = [$columnName => $value]; 
        $data = array_merge($data, $newValues); 
    
        $set = [];
        foreach ($data as $key => $val) {
            $set[] = "`$key` = '$val'";
        }
        $set = implode(', ', $set);
        $sql = "UPDATE `$tableName` SET $set WHERE `$columnName` = '$value'";
        echo $sql;
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Row updated successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error updating row: " . $e->getMessage()]);
        }
    }
    
    

    public function updateColumn($tableName, $columnName, $newColumnName, $columnType)
    {
        $sql = "ALTER TABLE $tableName CHANGE $columnName $newColumnName $columnType";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Column updated successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error updating column: " . $e->getMessage()]);
        }
    }

    public function updateTableName($tableName, $newTableName)
    {
        $sql = "RENAME TABLE $tableName TO $newTableName";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Table name updated successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error updating table name: " . $e->getMessage()]);
        }
    }
    public function updateDatabaseName($databaseName, $newDatabaseName)
    {
        $sql = "ALTER DATABASE $databaseName MODIFY NAME = $newDatabaseName";
        try {
            $this->pdo->exec($sql);
            echo json_encode(["result" => "success", "message" => "Database name updated successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["result" => "error", "message" => "Error updating database name: " . $e->getMessage()]);
        }
    }

    public function dumpDatabase($databaseName, $HOST, $USERNAME, $PASSWORD){

        $date = date("Y-m-d");
        $time = time();
        $fileName = $databaseName . $date . $time . ".sql"; 
        $dir = dirname(__FILE__) . '/dump/'. $fileName;
        exec("mysqldump --user={$USERNAME} --password={$PASSWORD} --host={$HOST} {$databaseName} --result-file={$dir} 2>&1", $output);
        return $output;
    }


    public function getCollectionDatabases()
    {
        $sql = "SHOW DATABASES";
        $stmt = $this->pdo->query($sql);
        $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $filteredDatabases = [];
        foreach ($databases as $databaseName) {
            if ('information_schema' === $databaseName) continue;
            if ('mysql' === $databaseName) continue;
            if ('performance_schema' === $databaseName) continue;
            if ('phpmyadmin' === $databaseName) continue;
            if ('sys' === $databaseName) continue;
            $filteredDatabases[] = $databaseName;
        }
        return $filteredDatabases;
        // return $databases;
    }
    

    public function getColumnName($tableName)
    {
        $sql = "SHOW COLUMNS FROM $tableName";
        $stmt = $this->pdo->query($sql);
        $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $columns;
    }


    public function getPdo()
    {
        return $this->pdo;
    }
}

// Usage:
// host / username / password / dbname
// $db = new Database('localhost', 'root', '');
// $db->connect();
// $pdo = $db->getPdo();
