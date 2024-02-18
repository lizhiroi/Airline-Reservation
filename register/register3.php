<?php
require "../dbConnect.php";
include "../includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $province = $_POST["province"];

    // You should add input validation and data sanitation here for security.

    try {
        // Insert data into ar_person table
        $sql = "INSERT INTO ar_person (address, city, postal_code, country, province) 
                VALUES (:address, :city, :postal_code, :country, :province)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':postal_code', $postal_code, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->bindParam(':province', $province, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Data inserted successfully
            header("Location: register5.php");
            exit;
        } else {
            $errorMessage = "Error inserting data into the database.";
        }
    } catch (PDOException $e) {
        // Handle any database-related errors here
        $errorMessage = "Database error: " . $e->getMessage();
    }
}
?>

<div class="row justify-content-start mt-4">
        <div class="col-md-6">
          <div class="row align-items-center">
            <div class="col-md-1">
              <h2>
                <span class="rounded-circle bg-dark text-white p-2 mr-2"
                  >3</span
                >
              </h2>
            </div>
            <div class="col-md-11">
              <h2>Contact information</h2>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-md-1"></div>
            <div class="col-md-11">
              <p>
                Your contact information will be stored in our system for faster
                checkout, and we'll use it to send you your Aeroplan card.
              </p>
              <form method="POST" action="register3.php">
                <div class="mb-3">
                  <label for="address" class="form-label">Address:</label>
                  <input
                    type="text"
                    class="form-control shadow-none"
                    id="address"
                    name="address"
                    required
                  />
                </div>
                
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="city" class="form-label">City:</label>
                      <input
                        type="text"
                        class="form-control shadow-none"
                        id="city"
                        name="city"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="postal_code" class="form-label"
                        >Postal Code:</label
                      >
                      <input
                        type="text"
                        class="form-control shadow-none"
                        id="postal_code"
                        name="postal_code"
                        required
                      />
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="country" class="form-label">Province:</label>
                  <input
                    type="text"
                    class="form-control shadow-none"
                    id="country"
                    name="country"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="province" class="form-label">Country:</label>
                  <input
                    type="text"
                    class="form-control shadow-none"
                    id="province"
                    name="province"
                  />
                </div>
                <div class="mb-3 form-check">
                  <input
                    type="checkbox"
                    class="form-check-input shadow-none"
                    id="privacyPolicy"
                    name="privacyPolicy"
                    required
                  />
                  <label class="form-check-label" for="privacyPolicy">
                    Yes, I have read the AIRS'R'US Privacy Policy and consent to
                    it. Minors must have a parent or guardian consent on their
                    behalf.
                  </label>
                </div>
              </form>
              <div class="d-flex justify-content-end mt-3">
                  <a href="register4.php" class="btn btn-primary bg-dark text-white border-dark">
                    Continue
                  </a>
              </div>
            </div>
          </div>
        </div>

<?php include "../signIn/signIn.php"; ?> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
