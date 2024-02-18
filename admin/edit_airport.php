<?php
require "../dbConnect.php";
include "../includes/header.php";

if (isset($_GET['airport_id'])) {
    $airport_id = $_GET['airport_id'];

    // Fetch airport data from the database based on airport_id
    $sql = "SELECT * FROM ar_airport WHERE airport_id = :airport_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':airport_id', $airport_id, PDO::PARAM_INT);
    $stmt->execute();
    $airport = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$airport) {
        echo "Airport not found.";
        exit;
    }
} else {
    echo "Airport ID not provided.";
    exit;
}

// Handle form submission for editing airport data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate airport data from the form

    // Update the airport data in the database
    $updateSql = "UPDATE ar_airport SET airport_name = :airport_name, airport_province = :airport_province, airport_city = :airport_city, latitude = :latitude, longitude = :longitude WHERE airport_id = :airport_id";
    $updateStmt = $db->prepare($updateSql);

    $updateStmt->bindParam(':airport_name', $_POST['airport_name'], PDO::PARAM_STR);
    $updateStmt->bindParam(':airport_province', $_POST['airport_province'], PDO::PARAM_STR);
    $updateStmt->bindParam(':airport_city', $_POST['airport_city'], PDO::PARAM_STR);
    $updateStmt->bindParam(':latitude', $_POST['latitude'], PDO::PARAM_STR);
    $updateStmt->bindParam(':longitude', $_POST['longitude'], PDO::PARAM_STR);
    $updateStmt->bindParam(':airport_id', $airport_id, PDO::PARAM_INT);

    if ($updateStmt->execute()) {
        // Redirect back to airport management page after successful update
        header("Location: admin.php#airports");
    } else {
        echo "Error updating airport data.";
    }
}
?>

<!-- Display the airport edit form -->
<div class="container">
    <h2>Edit Airport</h2>
    <form method="POST">
        <div class="form-group">
            <label for="airport_name">Airport Name</label>
            <input type="text" name="airport_name" id="airport_name" value="<?php echo $airport['airport_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="airport_province">Province</label>
            <input type="text" name="airport_province" id="airport_province" value="<?php echo $airport['airport_province']; ?>" required>
        </div>
        <div class="form-group">
            <label for="airport_city">City</label>
            <input type="text" name "airport_city" id="airport_city" value="<?php echo $airport['airport_city']; ?>" required>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude" value="<?php echo $airport['latitude']; ?>" required>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude" value="<?php echo $airport['longitude']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
