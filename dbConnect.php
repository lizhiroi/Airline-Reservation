<?php

// session_start(); // allows the use of $_SESSION

// variable
$dbType = "mysql"; // type of database to connect to
$dbServer = "localhost"; // host name of my server
$dbName = "fsd10_class"; // name of my database
$dbPort = "8889"; // port for the database server (check MAMP)
$dbCharset = "utf8"; // charset encoding for the database
$dbUsername = "fsduser"; // user with access to the database
$dbPassword = "myDBpw"; // $dbUsername password

// connection string (data source name)
$dbDSN = "{$dbType}:host={$dbServer};dbname={$dbName};port={$dbPort};charset={$dbCharset}";

try {
    // open database connection
    $db = new PDO($dbDSN, $dbUsername, $dbPassword);
    // Set PDO to throw exceptions on error
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle any database connection errors here, such as displaying an error message.
    die("Database connection failed: " . $e->getMessage());
}
?>