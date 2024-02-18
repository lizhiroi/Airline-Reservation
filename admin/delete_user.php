<?php
require "../dbConnect.php";

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Delete the user from the database
    $sql = "DELETE FROM ar_person WHERE person_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect back to the User Management page after successful deletion
        header("Location: admin.php#dashboard");
    } else {
        echo "Error deleting the user.";
    }
} else {
    echo "User ID not provided.";
}
?>