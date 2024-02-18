<?php include "../includes/header.php"; ?>

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
              <h2 class="text-black ">User Management</h2>
              <!-- Dashboard content goes here -->
              <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Create Date</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>Admin</td>
                <td>2023-10-15</td>
                <td>1985-05-20</td>
                <td>(555) 555-5555</td>
                <td>123 Main St, City, State</td>
                <td>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>User</td>
                <td>2023-09-30</td>
                <td>1990-12-10</td>
                <td>(555) 555-1234</td>
                <td>456 Elm St, Town, State</td>
                <td>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>

            </div>
            
            <div class="tab-pane" id="airports">
              <h2 class="text-black">Airport Management</h2>
              <!-- Airport management content goes here -->
            </div>
            <div class="tab-pane" id="flights">
              <h2 class="text-black">Flight Management</h2>
              <!-- Flight management content goes here -->
            </div>
            <div class="tab-pane" id="bookings">
              <h2 class="text-black">Booking Management</h2>
              <!-- Booking management content goes here -->
            </div>
          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include "../includes/footer.php"; ?>