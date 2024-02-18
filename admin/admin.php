<?php 
require "../dbConnect.php";
include "../includes/header.php"; 
?>

<div class="container-fluid">
      <div class="row">
        
        <!-- Sidebar -->
        <nav
          id="sidebar"
          class="col-md-3 col-lg-2 d-md-block bg-transparent sidebar"
        >
          <div class="position-sticky">
            <ul class="nav flex-column" id="sidebarTabs">
              <li class="nav-item">
                <a
                  class="nav-link text-black active"
                  href="#dashboard"
                  data-bs-toggle="tab"
                  id="dashboardLink"
                >
                  Users
                </a>
              </li>

              <li class="nav-item">
                <a
                  class="nav-link text-black"
                  href="#airports"
                  data-bs-toggle="tab"
                  id="airportsLink"
                >
                  Airports
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-black"
                  href="#flights"
                  data-bs-toggle="tab"
                  id="flightsLink"
                >
                  Flights
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-black"
                  href="#bookings"
                  data-bs-toggle="tab"
                  id="bookingsLink"
                >
                  Bookings
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="tab-content" id="contentTabs">
          <div class="tab-pane active" id="dashboard">
    <h2 class="text-black">User Management</h2>
    
    <!-- Fetch user data from the database and display it in the table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Assume $db is your database connection (already established)

            $sql = "SELECT * FROM ar_person"; // Adjust the query based on your schema
            $stmt = $db->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['first_name'] . ' ' . $row['middle_name'] .' ' . $row['last_name'] . '</td>';
                echo '<td>' . $row['gender'] . '</td>';
                echo '<td>' . $row['birthday'] . '</td>';
                echo '<td>' . $row['address'] . ', ' . $row['city'] . ', ' . $row['province'] . ', ' . $row['country'] . '</td>';
                echo '<td>';
                echo '<a href="edit_user.php?user_id=' . $row['person_id'] . '" class="btn btn-primary">Edit</a>';
                echo '<a href="delete_user.php?user_id=' . $row['person_id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

</div>
            

<div class="tab-pane" id="airports">
    <h2 class="text-black">Airport Management</h2>

    <!-- Fetch airport data from the database and display it in the table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Province</th>
                <th>City</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM ar_airport"; 
            $stmt = $db->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['airport_code'] . '</td>';
                echo '<td>' . $row['airport_name'] . '</td>';
                echo '<td>' . $row['airport_province'] . '</td>';
                echo '<td>' . $row['airport_city'] . '</td>';
                echo '<td>' . $row['latitude'] . '</td>';
                echo '<td>' . $row['longitude'] . '</td>';
                echo '<td>';
                echo '<a href="edit_airport.php?airport_id=' . $row['airport_id'] . '" class="btn btn-primary">Edit</a>';
                echo '<a href="delete_airport.php?airport_id=' . $row['airport_id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this airport?\')">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

</div>

<div class="tab-pane" id="flights">
    <h2 class="text-black">Flight Management</h2>

    <!-- Fetch flight data from the database and display it in the table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Company ID</th>
                <th>Aircraft ID</th>
                <th>Departure Airport ID</th>
                <th>Arrival Airport ID</th>
                <th>Departure Date</th>
                <th>Departure Time</th>
                <th>Arrival Date</th>
                <th>Arrival Time</th>
                <th>Price Business</th>
                <th>Price Premium</th>
                <th>Price Economy</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM ar_flight"; 
            $stmt = $db->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['company_id'] . '</td>';
                echo '<td>' . $row['aircraft_id'] . '</td>';
                echo '<td>' . $row['departure_airport_id'] . '</td>';
                echo '<td>' . $row['arrival_airport_id'] . '</td>';
                echo '<td>' . $row['departure_date'] . '</td>';
                echo '<td>' . $row['departure_time'] . '</td>';
                echo '<td>' . $row['arrival_date'] . '</td>';
                echo '<td>' . $row['arrival_time'] . '</td>';
                echo '<td>' . $row['price_business'] . '</td>';
                echo '<td>' . $row['price_premium'] . '</td>';
                echo '<td>' . $row['price_economy'] . '</td>';
                echo '<td>';
                echo '<a href="edit_flight.php?flight_id=' . $row['flight_id'] . '" class="btn btn-primary">Edit</a>';
                echo '<a href="delete_flight.php?flight_id=' . $row['flight_id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this flight?\')">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

</div>
<div class="tab-pane" id="bookings">
    <h2 class="text-black">Booking Management</h2>

    <!-- Fetch booking data from the database and display it in the table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Booking Number</th>
                <th>User ID</th>
                <th>Flight ID</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Booking Status ID</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM ar_booking"; 
            $stmt = $db->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['booking_number'] . '</td>';
                echo '<td>' . $row['user_id'] . '</td>';
                echo '<td>' . $row['flight_id'] . '</td>';
                echo '<td>' . $row['booking_date'] . '</td>';
                echo '<td>' . $row['booking_time'] . '</td>';
                echo '<td>' . $row['booking_status_id'] . '</td>';
                echo '<td>' . $row['total_price'] . '</td>';
                echo '<td>';
                echo '<a href="edit_booking.php?booking_id=' . $row['booking_id'] . '" class="btn btn-primary">Edit</a>';
                echo '<a href="delete_booking.php?booking_id=' . $row['booking_id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this booking?\')">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

</div>
          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php 
include "../includes/footer.php"; 
?>