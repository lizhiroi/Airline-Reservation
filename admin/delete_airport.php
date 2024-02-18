<?php
require "../dbConnect.php";

if (isset($_GET['airport_id'])) {
    $airport_id = $_GET['airport_id'];

    // Prepare and execute the SQL query to delete the airport
    $deleteAirportSql = "DELETE FROM ar_airport WHERE airport_id = :airport_id";
    $deleteAirportStmt = $db->prepare($deleteAirportSql);
    $deleteAirportStmt->bindParam(':airport_id', $airport_id, PDO::PARAM_INT);

    if ($deleteAirportStmt->execute()) {
        // Airport successfully deleted, you can redirect or display a success message
        header("Location: admin.php"); // Redirect to the admin page
        exit;
    } else {
        // Error occurred during deletion, you can handle the error accordingly
        echo "Error: Unable to delete the airport.";
    }
} else {
    // Invalid request, airport ID is not provided
    echo "Invalid request.";
}
?>