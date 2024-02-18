<?php
require "../dbConnect.php";

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emailCard"]) && isset($_POST["password"])) {
    $emailCard = $_POST["emailCard"];
    $password = $_POST["password"];

    // Create a function to check user credentials
    function checkUserCredentials($emailCard, $password, $db) {
        $sql = "SELECT * FROM ar_user WHERE email = :emailCard OR card_number = :emailCard";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':emailCard', $emailCard, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return null;
    }

    $user = checkUserCredentials($emailCard, $password, $db);

    if ($user) {
        // Set user session and redirect to the desired page
        $_SESSION['loggedIn'] = true;
        $_SESSION['userId'] = $user['user_id'];

        if ($user['admin']) {
            // Redirect admin to the admin panel
            header("Location: admin-panel.php");
        } else {
            // Redirect regular users to the homepage
            header("Location: ../homepage.php");
        }

        exit;
    } else {
        $errorMessage = "Invalid email/card or password.";
    }
}

?>

<!-- HTML form for user sign-in -->
<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="signInForm" action="signIn.php" method="post">
                    <div class="mb-3">
                        <label for="emailCard" class="form-label">Email or Card Number:</label>
                        <input type="text" class="form-control" id="emailCard" name="emailCard" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required />
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary bg-dark text-white border-black" id="signInButton">
                            Sign In
                        </button>
                    </div>
                </form>
                <?php
                if (isset($errorMessage)) {
                    echo '<p class="text-danger">' . $errorMessage . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

