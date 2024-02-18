<?php
require "../dbConnect.php";

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Prepare and execute the SQL query to delete the booking
    $deleteBookingSql = "DELETE FROM ar_booking WHERE booking_id = :booking_id";
    $deleteBookingStmt = $db->prepare($deleteBookingSql);
    $deleteBookingStmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);

    if ($deleteBookingStmt->execute()) {
        // Booking successfully deleted, you can redirect or display a success message
        header("Location: admin.php"); // Redirect to the admin page
        exit;
    } else {
        // Error occurred during deletion, you can handle the error accordingly
        echo "Error: Unable to delete the booking.";
    }
} else {
    // Invalid request, booking ID is not provided
    echo "Invalid request.";
}
?>