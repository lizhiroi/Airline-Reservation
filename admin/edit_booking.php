<?php
require "../dbConnect.php";
include "../includes/header.php";

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Fetch booking data from the database based on booking_id
    $sql = "SELECT * FROM ar_booking WHERE booking_id = :booking_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
    $stmt->execute();
    $booking = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$booking) {
        echo "Booking not found.";
        exit;
    }
} else {
    echo "Booking ID not provided.";
    exit;
}

// Handle form submission for editing booking data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate booking data from the form

    // Update the booking data in the database
    $updateSql = "UPDATE ar_booking SET user_id = :user_id, flight_id = :flight_id, booking_date = :booking_date, booking_time = :booking_time, booking_status_id = :booking_status_id, total_price = :total_price WHERE booking_id = :booking_id";
    $updateStmt = $db->prepare($updateSql);

    $updateStmt->bindParam(':user_id', $_POST['user_id'], PDO::PARAM_INT);
    $updateStmt->bindParam(':flight_id', $_POST['flight_id'], PDO::PARAM_INT);
    $updateStmt->bindParam(':booking_date', $_POST['booking_date'], PDO::PARAM_STR);
    $updateStmt->bindParam(':booking_time', $_POST['booking_time'], PDO::PARAM_STR);
    $updateStmt->bindParam(':booking_status_id', $_POST['booking_status_id'], PDO::PARAM_INT);
    $updateStmt->bindParam(':total_price', $_POST['total_price'], PDO::PARAM_STR);
    $updateStmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);

    if ($updateStmt->execute()) {
        // Redirect back to the booking management page after a successful update
        header("Location: admin.php#bookings");
    } else {
        echo "Error updating booking data.";
    }
}
?>

<!-- Display the booking edit form -->
<div class="container">
    <h2>Edit Booking</h2>
    <form method="POST">
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" value="<?php echo $booking['user_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="flight_id">Flight ID</label>
            <input type="text" name="flight_id" id="flight_id" value="<?php echo $booking['flight_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="booking_date">Booking Date</label>
            <input type="text" name="booking_date" id="booking_date" value="<?php echo $booking['booking_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="booking_time">Booking Time</label>
            <input type="text" name="booking_time" id="booking_time" value="<?php echo $booking['booking_time']; ?>" required>
        </div>
        <div class="form-group">
            <label for="booking_status_id">Booking Status ID</label>
            <input type="text" name="booking_status_id" id="booking_status_id" value="<?php echo $booking['booking_status_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="text" name="total_price" id="total_price" value="<?php echo $booking['total_price']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>