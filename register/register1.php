<?php
require "../dbConnect.php";
include "../signIn/signIn.php";
include "../includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Hash the password for security
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Perform validation here if needed

  // Insert user data into the database
  $sql = "INSERT INTO ar_user (email, password) VALUES (:email, :password)";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

  if ($stmt->execute()) {
      // Redirect to the next registration step
      header("Location: register2.php");
      exit;
  } else {
      $errorMessage = "Error inserting data into the database.";
  }
}
?>

<div class="row justify-content-start mt-4">
    <div class="col-md-6">
        <div class="row align-items-center">
            <div class="col-md-1">
                <h2><span class="rounded-circle bg-dark text-white p-2 mr-2">1</span></h2>
            </div>
            <div class="col-md-11">
                <h2>Account information</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <p>
                    Enter your email address and a password to start your enrollment. You will sign in to Aeroplan with this address.
                </p>
                <form method="POST" action="register1.php">
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input
                            type="email"
                            class="form-control shadow-none"
                            id="email"
                            name="email"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label for="password">Create Password:</label>
                        <input
                            type="password"
                            class="form-control shadow-none"
                            id="password"
                            name="password"
                            required
                        />
                    </div>
                    <!-- Add a terms and conditions checkbox here -->
                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input shadow-none"
                            id="terms"
                            name="terms"
                            required
                        />
                        <label class="form-check-label" for="terms">I have read and accepted Aeroplan's Terms and Conditions</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button
                            class="btn btn-primary bg-dark text-white border-dark"
                            type="submit"
                        >
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include "../includes/footer.php"; ?>
