<?php
// vendor\bin\phpunit tests

use PHPUnit\Framework\TestCase;
use App\Class\Database;
require_once __DIR__ . '/../../vendor/autoload.php';

// use GuzzleHttp\Client;
// include '../src/conf.php';

class DatabaseTest extends TestCase
{
public function testCreateDatabase()
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->createDatabase('test');
    $this->assertContains('test', $db->getCollectionDatabases());
}

public function testCreateTable()
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->useDatabase('test');
    $db->createTable('user', 'id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY');
    $db->createTable('restaurant', 'id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY');
    $this->assertContains('user', $db->getTableCollection('user'));
    $this->assertContains('restaurant', $db->getTableCollection('restaurant'));
}

public function testUpdateTableName(): void
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->useDatabase('test');
    $db->updateTableName('user', 'modifUser');
    $this->assertContains('modifuser', $db->getTableCollection('modifuser'));
    $this->assertContains('restaurant', $db->getTableCollection('restaurant'));
}

public function testDropTable(): void
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->useDatabase('test');
    $db->dropTable('modifuser');
    $this->assertNotContains('modifuser', $db->getTableCollection('modifuser'));
    $this->assertContains('restaurant', $db->getTableCollection('restaurant'));
}

public function testAddColumn(): void
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->useDatabase('test');
    $db->addColumn('restaurant', 'name', 'VARCHAR(100)');
    $db->addColumn('restaurant', 'age', 'INT');
    $db->addColumn('restaurant', 'number', 'DECIMAL(10,2)');
    $db->addColumn('restaurant', 'date', 'DATE');
    $db->addColumn('restaurant', 'description', 'TEXT');
    $db->addColumn('restaurant', 'todelete', 'TEXT');
    $this->assertContains('name', $db->getColumnName('restaurant'));
    $this->assertContains('age', $db->getColumnName('restaurant'));
    $this->assertContains('number', $db->getColumnName('restaurant'));
    $this->assertContains('date', $db->getColumnName('restaurant'));
    $this->assertContains('description', $db->getColumnName('restaurant'));
    // no assert for now
}

public function testDropColumn(): void
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->useDatabase('test');
    $db->dropColumn('restaurant', 'todelete');
    $this->assertNotContains('todelete', $db->getTableColumns('restaurant'));
}

public function testInsertRow(): void
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->useDatabase('test');
    $db->insertRow('restaurant', [
        ['name' => 'McDonalds', 'age' => 30, 'date' => '2021-03-01', 'description' => 'Fast food'],
        ['name' => 'Burger King', 'age' => 40, 'date' => '2020-05-15', 'description' => 'Fast food'],
        ['name' => 'KFC', 'age' => 35, 'date' => '2021-01-01', 'description' => 'Fast food'],
        ['name' => 'Subway', 'age' => 25, 'date' => '2021-02-01', 'description' => 'Fast food'],
        ['name' => 'Pizza Hut', 'age' => 45, 'date' => '2021-03-01', 'description' => 'Fast food'],
    ]);

    $this->assertContains('McDonalds', $db->getRow('restaurant', 'name', 'McDonalds'));
}
public function updateRow(): void
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->useDatabase('test');
    $db->updateRow('restaurant', 'id', 1, ['name' => 'McGronalds', 'age' => 55, 'date' => '2022-03-01', 'description' => 'slow food']);
}

public function testDeleteRow():void
{
    $db = new Database('localhost', 'root', 'Clement2203$');
    $db->connect();
    $db->useDatabase('test');
    $db->dropRow('restaurant', 'id', 1);
    // $this->assertNotContains('McGronalds', $db->getRow('restaurant', 'name', 'McGronalds'));

}


public function testDropDatabase(): void
{
    $db = new Database('localhost','root','Clement2203$');
    $db->connect();
    $db->dropDatabase('test');
    $this->assertNotContains('test', $db->getCollectionDatabases());
}
}