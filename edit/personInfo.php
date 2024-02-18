<?php 
require "../dbConnect.php";
include "../includes/header.php"; 


// read from db
// Personal Information
$legalName = $gender = $dateOfBirth = $nationality = $address = "";

// Check if the user is logged in and has a valid session
if (isset($_SESSION["user_id"])) {
  $userId = $_SESSION["user_id"];

  // Fetch the user's personal information from the database
  $sql = "SELECT first_name, gender, birthday, nationality, address FROM ar_person WHERE person_id = :person_id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
  $stmt->execute();
  $userData = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($userData) {
      // Populate variables with user data
      $legalName = $userData['first_name'];
      $gender = $userData['gender'];
      $dateOfBirth = $userData['birthday'];
      $nationality = $userData['nationality'];
      $address = $userData['address'];
  }
}

//edit Personal Information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["legalName"]) && isset($_POST["gender"]) && isset($_POST["dateOfBirth"]) && isset($_POST["nationality"]) && isset($_POST["address"])) {
      // Retrieve POST data
      $legalName = $_POST["legalName"];
      $gender = $_POST["gender"];
      $dateOfBirth = $_POST["dateOfBirth"];
      $nationality = $_POST["nationality"];
      $address = $_POST["address"];
      // Additional fields like middle name, known traveler number, redress number, and more can be added similarly.

      // Update the user's personal information in the database
      $sql = "UPDATE ar_person SET
          first_name = :legalName,
          gender = :gender,
          birthday = :dateOfBirth,
          nationality = :nationality,
          address = :address
          WHERE person_id = :personId";

      $stmt = $db->prepare($sql);
      $stmt->bindParam(':legalName', $legalName, PDO::PARAM_STR);
      $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
      $stmt->bindParam(':dateOfBirth', $dateOfBirth, PDO::PARAM_STR);
      $stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);
      $stmt->bindParam(':address', $address, PDO::PARAM_STR);
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
    // Handle the form submission and update the database
    if (isset($_POST["emailAddress"]) && isset($_POST["mobileNumber"])) {
        // Get the posted data and sanitize if needed
        $newEmailAddress = $_POST["emailAddress"];
        $newMobileNumber = $_POST["mobileNumber"];

        // Update the contact information in the database
        $sql = "UPDATE user SET email_address = :emailAddress, mobile_number = :mobileNumber WHERE user_id = :userId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':emailAddress', $newEmailAddress, PDO::PARAM_STR);
        $stmt->bindParam(':mobileNumber', $newMobileNumber, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $_SESSION["user_id"], PDO::PARAM_INT); // Assuming you have a user session

        if ($stmt->execute()) {
            // Update successful, you can set a success message here
            $successMessage = "Contact Information updated successfully!";
        } else {
            // Handle the error, e.g., display an error message
            $errorMessage = "Error updating contact information.";
        }
    }
}


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
//Edit Travel Preferences
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["preferredLanguage"]) && isset($_POST["preferredMeal"]) && isset($_POST["preferredSeat"]) && isset($_SESSION["user_id"])) {
      $newPreferredLanguage = $_POST["preferredLanguage"];
      $newPreferredMeal = $_POST["preferredMeal"];
      $newPreferredSeat = $_POST["preferredSeat"];

      // Update travel preferences in the database
      $sql = "UPDATE ar_person SET perferred_language = :preferredLanguage, perferred_meal = :preferredMeal, perferred_seat = :preferredSeat WHERE person_id = :personId";
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':preferredLanguage', $newPreferredLanguage, PDO::PARAM_STR);
      $stmt->bindParam(':preferredMeal', $newPreferredMeal, PDO::PARAM_STR);
      $stmt->bindParam(':preferredSeat', $newPreferredSeat, PDO::PARAM_STR);
      $stmt->bindParam(':personId', $_SESSION["person_id"], PDO::PARAM_INT);

      if ($stmt->execute()) {
          $successMessage = "Travel Preferences updated successfully!";
      } else {
          $errorMessage = "Error updating travel preferences.";
      }
  }
}

?>
      <!-- Personal Information Section -->
      <div class="mb-4">
          <h2>Personal Information
              <button class="btn btn-outline-primary" data-toggle="modal" data-target="#editPersonalInfoModal">Edit</button>
          </h2>
          <ul>
            <li>Legal Name: <?php echo $legalName; ?></li>
            <li>Gender: <?php echo $gender; ?></li>
            <li>Date of Birth: <?php echo $dateOfBirth; ?></li>
            <li>Nationality: <?php echo $nationality; ?></li>
            <li>Main Address: <?php echo $address; ?></li>
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
          <li>Preferred Language: English</li>
          <li>Meal Preference: Vegetarian</li>
          <li>Seat Preference: Window</li>
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
              <form method="post" action="personInfo.php">
                <div class="form-group">
                  <label for="legalName">Legal Name:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="legalName"
                    name="legalName"
                    value="<?php echo $legalName; ?>"
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
                <div class="form-group">
                  <label for="nationality">Nationality:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nationality"
                    name="nationality"
                    value="<?php echo $nationality; ?>"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="address">Main Address:</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    value="<?php echo $address; ?>"
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
                    <form method="POST">
                        <div class="form-group">
                            <label for="emailAddress">Email Address:</label>
                            <input type="email" class="form-control" id="emailAddress" name="emailAddress" required>
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber">Default Mobile Phone Number:</label>
                            <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
      <div
        class="modal fade"
        id="editTravelPrefsModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="editTravelPrefsModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editTravelPrefsModalLabel">
                Edit Travel Preferences
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
              <!-- Add form fields for editing travel preferences here -->
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cancel
              </button>
              <button
                type="button"
                class="btn btn-primary"
                data-dismiss="modal"
              >
                Save
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

