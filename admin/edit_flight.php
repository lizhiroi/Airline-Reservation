<?php
require "../dbConnect.php";
include "../includes/header.php";

if (isset($_GET['flight_id'])) {
    $flight_id = $_GET['flight_id'];

    // Fetch flight data from the database based on flight_id
    $sql = "SELECT * FROM ar_flight WHERE flight_id = :flight_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':flight_id', $flight_id, PDO::PARAM_INT);
    $stmt->execute();
    $flight = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$flight) {
        echo "Flight not found.";
        exit;
    }
} else {
    echo "Flight ID not provided.";
    exit;
}

// Handle form submission for editing flight data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate flight data from the form

    // Update the flight data in the database
    $updateSql = "UPDATE ar_flight SET company_id = :company_id, aircraft_id = :aircraft_id, departure_airport_id = :departure_airport_id, arrival_airport_id = :arrival_airport_id, departure_date = :departure_date, departure_time = :departure_time, arrival_date = :arrival_date, arrival_time = :arrival_time, price_business = :price_business, price_premium = :price_premium, price_economy = :price_economy WHERE flight_id = :flight_id";
    $updateStmt = $db->prepare($updateSql);

    $updateStmt->bindParam(':company_id', $_POST['company_id'], PDO::PARAM_INT);
    $updateStmt->bindParam(':aircraft_id', $_POST['aircraft_id'], PDO::PARAM_INT);
    $updateStmt->bindParam(':departure_airport_id', $_POST['departure_airport_id'], PDO::PARAM_INT);
    $updateStmt->bindParam(':arrival_airport_id', $_POST['arrival_airport_id'], PDO::PARAM_INT);
    $updateStmt->bindParam(':departure_date', $_POST['departure_date'], PDO::PARAM_STR);
    $updateStmt->bindParam(':departure_time', $_POST['departure_time'], PDO::PARAM_STR);
    $updateStmt->bindParam(':arrival_date', $_POST['arrival_date'], PDO::PARAM_STR);
    $updateStmt->bindParam(':arrival_time', $_POST['arrival_time'], PDO::PARAM_STR);
    $updateStmt->bindParam(':price_business', $_POST['price_business'], PDO::PARAM_STR);
    $updateStmt->bindParam(':price_premium', $_POST['price_premium'], PDO::PARAM_STR);
    $updateStmt->bindParam(':price_economy', $_POST['price_economy'], PDO::PARAM_STR);
    $updateStmt->bindParam(':flight_id', $flight_id, PDO::PARAM_INT);

    if ($updateStmt->execute()) {
        // Redirect back to flight management page after a successful update
        header("Location: admin.php#flights");
    } else {
        echo "Error updating flight data.";
    }
}
?>

<!-- Display the flight edit form -->
<div class="container">
    <h2>Edit Flight</h2>
    <form method="POST">
        <div class="form-group">
            <label for="company_id">Company ID</label>
            <input type="text" name="company_id" id="company_id" value="<?php echo $flight['company_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="aircraft_id">Aircraft ID</label>
            <input type="text" name="aircraft_id" id="aircraft_id" value="<?php echo $flight['aircraft_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="departure_airport_id">Departure Airport ID</label>
            <input type="text" name="departure_airport_id" id="departure_airport_id" value="<?php echo $flight['departure_airport_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="arrival_airport_id">Arrival Airport ID</label>
            <input type="text" name="arrival_airport_id" id="arrival_airport_id" value="<?php echo $flight['arrival_airport_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="departure_date">Departure Date</label>
            <input type="text" name="departure_date" id="departure_date" value="<?php echo $flight['departure_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="departure_time">Departure Time</label>
            <input type="text" name="departure_time" id="departure_time" value="<?php echo $flight['departure_time']; ?>" required>
        </div>
        <div class="form-group">
            <label for="arrival_date">Arrival Date</label>
            <input type="text" name="arrival_date" id="arrival_date" value="<?php echo $flight['arrival_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="arrival_time">Arrival Time</label>
            <input type="text" name="arrival_time" id="arrival_time" value="<?php echo $flight['arrival_time']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price_business">Price Business</label>
            <input type="text" name="price_business" id="price_business" value="<?php echo $flight['price_business']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price_premium">Price Premium</label>
            <input type="text" name="price_premium" id="price_premium" value="<?php echo $flight['price_premium']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price_economy">Price Economy</label>
            <input type="text" name="price_economy" id="price_economy" value="<?php echo $flight['price_economy']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>