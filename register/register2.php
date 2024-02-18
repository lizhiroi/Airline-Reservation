<?php
require "../dbConnect.php";
include "../includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];

    
        try {
            // Insert data into ar_person table
            $sql = "INSERT INTO ar_person (first_name, middle_name, last_name, gender, birthday) 
                    VALUES (:firstName, :middleName, :lastName, :gender, :birthday)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $stmt->bindParam(':middleName', $middleName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
            $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);

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
                        <h2><span class="rounded-circle bg-dark text-white p-2 mr-2">2</span></h2>
                    </div>
                    <div class="col-md-11">
                        <h2>Account Information</h2>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <p>Enter your name as it appears on your government-issued photo ID. Knowing more about our members helps us ensure greater account security. Only a parent or legal guardian may complete this form to enroll a child under the age of majority in their place of residence.</p>
                        <form method="POST" action="register2.php">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name:</label>
                                        <input type="text" class="form-control shadow-none" id="firstName" name="firstName" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="middleName" class="form-label">Middle Name:</label>
                                        <input type="text" class="form-control shadow-none" id="middleName" name="middleName">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for "lastName" class="form-label">Last Name:</label>
                                        <input type="text" class="form-control shadow-none" id="lastName" name="lastName" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender:</label>
                                <div class="form-check">
                                    <input class="form-check-input shadow-none" type="radio" name="gender" id="male" value="male" required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input shadow-none" type="radio" name="gender" id="female" value="female" required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input shadow-none" type="radio" name="gender" id="other" value="other" required>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="birthday" class="form-label">Birthday:</label>
                                        <input type="number" class="form-control shadow-none" id="birthday" name="dobDay" min="1" max="31" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary bg-dark text-white border-dark">Continue</button>
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
<?php include "../signIn/signIn.php"; ?> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include "../includes/footer.php"; ?>