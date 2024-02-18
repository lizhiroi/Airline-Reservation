<?php
session_start(); // Start the session
require "../dbConnect.php";

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
            header("Location: admin.php");
        } else {
            // Redirect regular users to the homepage
            header("Location: ../index.php");
        }

        exit;
    } else {
        $errorMessage = "Invalid email/card or password.";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AIRS'R'US</title>
    <link rel="stylesheet" href="../style/global_style.css" />
    <!-- <link rel="stylesheet" href="../style/style.css" /> -->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    
    <link rel="icon" type="image/x-icon" href="../image/favicon.png" />

  </head>
  <body>
    <div class="container">
      <br/>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img
              classs="img-responsive"
              width="35px"
              height=""
              src="../image/favicon.png"
            />
            AIRS'R'US</a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

        </div>
      </nav>
<!-- HTML form for user sign-in -->
<div class="row justify-content-start mt-4">
    <div class="col-md-6">
        
        <div class="row align-items-center">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                
                <form id="signInForm" action="../signIn/signInPage.php" method="post">
                            <div class="mb-3">
                                <label for="emailCard" class="form-label">Email or Card Number:</label>
                                <input type="text" class="form-control" id="emailCard" name="emailCard" required />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required />
                            </div>
                            <div class="d-flex justify-content-end">
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
<?php include "../includes/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

