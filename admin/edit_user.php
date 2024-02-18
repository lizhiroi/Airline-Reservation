<?php
require "../dbConnect.php";
include "../includes/header.php";

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch user data from the database based on user_id
    $sql = "SELECT * FROM ar_person WHERE person_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit;
    }
} else {
    echo "User ID not provided.";
    exit;
}

// Handle form submission for editing user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate user data from the form

    // Update the user data in the database
    $updateSql = "UPDATE ar_person SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name, gender = :gender, birthday = :birthday, address = :address, city = :city, province = :province, country = :country WHERE person_id = :user_id";
    $updateStmt = $db->prepare($updateSql);

    $updateStmt->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
    $updateStmt->bindParam(':middle_name', $_POST['middle_name'], PDO::PARAM_STR);
    $updateStmt->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
    $updateStmt->bindParam(':gender', $_POST['gender'], PDO::PARAM_STR);
    $updateStmt->bindParam(':birthday', $_POST['birthday'], PDO::PARAM_STR);
    $updateStmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
    $updateStmt->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
    $updateStmt->bindParam(':province', $_POST['province'], PDO::PARAM_STR);
    $updateStmt->bindParam(':country', $_POST['country'], PDO::PARAM_STR);
    $updateStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    if ($updateStmt->execute()) {
        // Redirect back to user management page after successful update
        header("Location: admin.php#dashboard");
    } else {
        echo "Error updating user data.";
    }
}

?>

<!-- Display the user edit form -->
<div class="container">
    <h2>Edit User</h2>
    <form method="POST">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $user['first_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" value="<?php echo $user['middle_name']; ?>">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $user['last_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" name="gender" id="gender" value="<?php echo $user['gender']; ?>" required>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="text" name="birthday" id="birthday" value="<?php echo $user['birthday']; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="<?php echo $user['address']; ?>" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" value="<?php echo $user['city']; ?>" required>
        </div>
        <div class="form-group">
            <label for="province">Province</label>
            <input type="text" name="province" id="province" value="<?php echo $user['province']; ?>" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" id="country" value="<?php echo $user['country']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>