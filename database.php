<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'users';
$table = 'usersTable';

function createDb()
{
    global $servername, $username, $password, $dbname;
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $dbname";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Database created successfully<br>";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function createTable()
{
    global $servername, $username, $password, $dbname, $table;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // sql to create table
        $sql = "CREATE TABLE $table(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    age VARCHAR(50),
    phone VARCHAR(50),
    email VARCHAR(50),
    city VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table MyGuests created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully";

} catch (PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
}
