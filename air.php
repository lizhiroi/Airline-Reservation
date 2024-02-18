<?php
// connect to databse
require 'dbConnect.php';


$page="home";
include "includes ./header.php";

// $sql= "SELECT airport_city FROM ar_airport";

// $query = $db->query($sql);

// $city = $query->fetchAll(PDO::FETCH_COLUMN); 
// $city = array_unique($city);

// sort($city);



$sql= "SELECT airport_id, airport_city FROM ar_airport";

$stmt = $db->prepare($sql);
$stmt->execute();

$city = $stmt->fetchAll();

echo "<pre>";
print_r($city);

?>