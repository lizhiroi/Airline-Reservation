<?php 
require "../dbConnect.php";
include "../includes/header.php"; 


// read from db
// Personal Information
$firstName = $middleName = $lastName = $gender = $dateOfBirth = "";
$address = $city = $province = $country = $postal_code = "";
$preLanguage = $preMeal = $preSeat = "";

// Check if the user is logged in and has a valid session
if (isset($_SESSION["user_id"])) {
  $userId = $_SESSION["user_id"];

  // Fetch the user's personal information from the database
  $sql = "SELECT first_name, middle_name, last_name, gender, birthday FROM ar_person WHERE person_id = :person_id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':person_id', $person_id, PDO::PARAM_INT);
  $stmt->execute();
  $userData = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($userData) {
      // Populate variables with user data
      $firstName = $userData['first_name'];
      $middleName = $userData['middle_name'];
      $lastName = $userData['last_name'];
      $gender = $userData['gender'];
      $dateOfBirth = $userData['birthday'];
      
  }
}

//edit Personal Information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["firstName"])  && isset($_POST["middleName"]) && isset($_POST["lastName"]) && isset($_POST["gender"]) && isset($_POST["dateOfBirth"])) {
      // Retrieve POST data
      $firstName = $_POST["firstName"];
      $middleName = $_POST["middleName"];
      $lastName = $_POST["lastName"];
      $gender = $_POST["gender"];
      $dateOfBirth = $_POST["dateOfBirth"];

      // Additional fields like middle name, known traveler number, redress number, and more can be added similarly.

      // Update the user's personal information in the database
      $sql = "UPDATE ar_person SET
          first_name = :firstName,
          middle_name = :middleName,
          last_name = :lastName
          gender = :gender,
          birthday = :dateOfBirth,

          WHERE person_id = :personId";


      $stmt = $db->prepare($sql);
      $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
      $stmt->bindParam(':middleName', $middleName, PDO::PARAM_STR);
      $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
      $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
      $stmt->bindParam(':dateOfBirth', $dateOfBirth, PDO::PARAM_STR);

      $stmt->bindParam(':personId', $_SESSION["person_id"], PDO::PARAM_INT);

      // if ($stmt->execute()) {
      //     $successMessage = "Personal Information updated successfully!";
      // } else {
      //     $errorMessage = "Error updating personal information.";
      // }
  }
}

//handle success and error messages 
if (isset($_GET["success"])) {
  $successMessage = "Personal Information updated successfully!";
} elseif (isset($_GET["error"])) {
  $errorMessage = "Error updating personal information.";
}


// Edit contact information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["province"]) && isset($_POST["country"]) && isset($_POST["postal_code"])) {
      // Retrieve POST data
      $address = $_POST["address"];
      $city = $_POST["city"];
      $province = $_POST["province"];
      $country = $_POST["country"];
      $postal_code = $_POST["postal_code"];

      // Update the user's personal information in the database
      $sql = "UPDATE ar_person SET
          address = :address,
          city = :city,
          province = :province,
          country = :country,
          postal_code = :postal_code
          WHERE person_id = :personId";

      $stmt = $db->prepare($sql);
      $stmt->bindParam(':address', $address, PDO::PARAM_STR);
      $stmt->bindParam(':city', $city, PDO::PARAM_STR);
      $stmt->bindParam(':province', $province, PDO::PARAM_STR);
      $stmt->bindParam(':country', $country, PDO::PARAM_STR);
      $stmt->bindParam(':postal_code', $postal_code, PDO::PARAM_STR);
      $stmt->bindParam(':personId', $_SESSION["person_id"], PDO::PARAM_INT);

      // if ($stmt->execute()) {
      //     $successMessage = "Personal Information updated successfully!";
      // } else {
      //     $errorMessage = "Error updating personal information.";
      // }
  }
}

//handle success and error messages 
if (isset($_GET["success"])) {
  $successMessage = "Personal Information updated successfully!";
} elseif (isset($_GET["error"])) {
  $errorMessage = "Error updating personal information.";
}
// Edit Payment Information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["cardNumber"])) {
      // Retrieve POST data
      $cardNumber = $_POST["cardNumber"];
      // Additional fields like payment method, billing address, and more can be added similarly.

      // Update the user's payment information in the database
      $sql = "UPDATE ar_user SET card_number = :cardNumber WHERE user_id = :userId";

      $stmt = $db->prepare($sql);
      $stmt->bindParam(':cardNumber', $cardNumber, PDO::PARAM_STR);
      $stmt->bindParam(':userId', $_SESSION["user_id"], PDO::PARAM_INT);

      if ($stmt->execute()) {
          $successMessage = "Payment Information updated successfully!";
      } else {
          $errorMessage = "Error updating payment information.";
      }
  }
}

//edit Personal Information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["preLanguage"])  && isset($_POST["preMeal"]) && isset($_POST["preSeat"])) {
      // Retrieve POST data
      $preLanguage = $_POST["preLanguage"];
      $preMeal = $_POST["preMeal"];
      $preSeat = $_POST["preSeat"];

      // Additional fields like middle name, known traveler number, redress number, and more can be added similarly.

      // Update the user's personal information in the database
      $sql = "UPDATE ar_person SET
          preferred_language = :preLanguage,
          preferred_meal = :preMeal,
          preferred_seat = :preSeat,
          WHERE person_id = :personId";


      $stmt = $db->prepare($sql);
      $stmt->bindParam(':preLanguage', $preLanguage, PDO::PARAM_STR);
      $stmt->bindParam(':preMeal', $preMeal, PDO::PARAM_STR);
      $stmt->bindParam(':preSeat', $preSeat, PDO::PARAM_STR);

      $stmt->bindParam(':personId', $_SESSION["person_id"], PDO::PARAM_INT);

      // if ($stmt->execute()) {
      //     $successMessage = "Personal Information updated successfully!";
      // } else {
      //     $errorMessage = "Error updating personal information.";
      // }
  }
}

?>
      <!-- Personal Information Section -->
      <div class="mb-4">
          <h2>Personal Information
              <button class="btn btn-outline-primary" data-toggle="modal" data-target="#editPersonalInfoModal">Edit</button>
          </h2>
          <ul>
            <li>First Name: <?php echo $firstName; ?></li>
            <li>Middle Name: <?php echo $middleName; ?></li>
            <li>Last Name: <?php echo $lastName; ?></li>
            <li>Gender: <?php echo $gender; ?></li>
            <li>Date of Birth: <?php echo $dateOfBirth; ?></li>

        </ul>
      </div>

      <!-- Contact Information Section -->
      <div class="mb-4">
        <h2>
          Contact Information
          <button
            class="btn btn-outline-primary"
            data-toggle="modal"
            data-target="#editContactInfoModal"
          >
            Edit
          </button>
        </h2>
        <ul>
          <li>Address: <?php echo $address; ?></li>
          <li>City: <?php echo $city; ?></li>
          <li>Provice: <?php echo $province; ?></li>
          <li>Country: <?php echo $country; ?></li>
          <li>Postal Code: <?php echo $postal_code; ?></li>
        </ul>
      </div>

      <!-- Payment Information Section -->
      <div class="mb-4">
        <h2>
          Payment Information
          <button
            class="btn btn-outline-primary"
            data-toggle="modal"
            data-target="#editPaymentInfoModal"
          >
            Edit
          </button>
        </h2>
        <p>
          Are you an Authorized User on someone else's account? You may be
          eligible for exciting travel benefits. Link your card and start
          reaping the benefits today!
          <a href="#" class="btn btn-link">Link my card</a>
        </p>
      </div>

      <!-- Travel Preferences Section -->
      <div class="mb-4">
        <h2>
          Travel Preferences
          <button
            class="btn btn-outline-primary"
            data-toggle="modal"
            data-target="#editTravelPrefsModal"
          >
            Edit
          </button>
        </h2>
        <ul>
          <li>Preferred Language: <?php echo $preLanguage; ?></li>
          <li>Meal Preference: <?php echo $preMeal; ?></li>
          <li>Seat Preference: <?php echo $preSeat; ?></li>
        </ul>
      </div>


   
      <div
        class="modal fade"
        id="editPersonalInfoModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="editPersonalInfoModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editPersonalInfoModalLabel">
                Edit Personal Information
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="editPersonInfo.php">
                <div class="form-group">
                  <label for="firstName">First Name:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="firstName"
                    name="firstName"
                    value="<?php echo $firstName; ?>"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="middleName">Middle Name:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="middleName"
                    name="middleName"
                    value="<?php echo $middleName; ?>"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="lastName">Last Name:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    name="lastName"
                    value="<?php echo $lastName; ?>"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="gender">Gender:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="gender"
                    name="gender"
                    value="<?php echo $gender; ?>"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="dateOfBirth">Date of Birth:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="dateOfBirth"
                    name="dateOfBirth"
                    value="<?php echo $dateOfBirth; ?>"
                    required
                  />
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
  <div class="modal fade" id="editContactInfoModal" tabindex="-1" role="dialog" aria-labelledby="editContactInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editContactInfoModalLabel">Edit Contact Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="editPersonInfo.php">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="province">Province:</label>
                        <input type="text" class="form-control" id="province" name="province" value="<?php echo $province; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?php echo $country; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code:</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?php echo $postal_code; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

      <div
        class="modal fade"
        id="editPaymentInfoModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="editPaymentInfoModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editPaymentInfoModalLabel">
                Edit Payment Information
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="update_payment_info.php">
                <div class="form-group">
                  <label for="cardNumber">Card Number:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="cardNumber"
                    name="cardNumber"
                    required
                  />
                </div>
                <!-- Add more form fields for editing payment information -->
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cancel
              </button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>

<!-- Edit Travel Preferences Modal -->
<div class="modal fade" id="editTravelPrefsModal" tabindex="-1" role="dialog" aria-labelledby="editTravelPrefsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTravelPrefsModalLabel">Edit Travel Preferences</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="editPersonInfo.php">
          <div class="form-group">
            <label for="preLanguage">Preferred Language:</label>
            <input type="text" class="form-control" id="preLanguage" name="preLanguage" value="<?php echo $preLanguage; ?>" required>
          </div>
          <div class="form-group">
            <label for="preMeal">Preferred Meal:</label>
            <input type="text" class="form-control" id="preMeal" name="preMeal" value="<?php echo $preMeal; ?>" required>
          </div>
          <div class="form-group">
            <label for="preSeat">Preferred Seat:</label>
            <input type="text" class="form-control" id="preSeat" name="preSeat" value="<?php echo $preSeat; ?>" required>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php 
include "../includes/footer.php"; 
?>    

