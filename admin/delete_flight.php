<?php
require "../dbConnect.php"; // Include your database connection file
// Check if the flight_id is provided in the URL
if (isset($_GET['flight_id'])) {
    $flight_id = $_GET['flight_id'];

    // Delete associated records (e.g., ar_ticket) first to avoid foreign key constraints
    $deleteTicketsSql = "DELETE FROM ar_flight WHERE flight_id = :flight_id";
    $deleteTicketsStmt = $db->prepare($deleteTicketsSql);
    $deleteTicketsStmt->bindParam(':flight_id', $flight_id, PDO::PARAM_INT);
    $deleteTicketsStmt->execute();

    // Now you can safely delete the flight
    $deleteFlightSql = "DELETE FROM ar_flight WHERE flight_id = :flight_id";
    $deleteFlightStmt = $db->prepare($deleteFlightSql);
    $deleteFlightStmt->bindParam(':flight_id', $flight_id, PDO::PARAM_INT);

    if ($deleteFlightStmt->execute()) {
        header("Location: admin.php"); // Redirect back to the admin.php page
        exit();
    } else {
        echo "Error deleting flight.";
    }
} else {
    echo "Flight ID not provided.";
}
?>