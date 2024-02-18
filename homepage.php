<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../project/style/global_style.css" />
    <link rel="stylesheet" href="../project/style/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter&family=Merriweather+Sans:wght@300&family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="icon" type="image/x-icon" href="../project/image/favicon.png" />
  </head>
  <body>
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img
              classs="img-responsive"
              width="35px"
              height=""
              src="../project/image/favicon.png"
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
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <button
                  type="button"
                  class="btn btn-primary btn-block"
                  data-bs-toggle="modal"
                  data-bs-target="#signInModal"
                >
                  <i class="fa fa-fw fa-user"></i>
                  Sign In
                </button>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <!-- Sign In Modal -->
    <div
      class="modal fade"
      id="signInModal"
      tabindex="-1"
      aria-labelledby="signInModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="emailCard" class="form-label"
                  >Email or Card Number:</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="emailCard"
                  name="emailCard"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  required
                />
              </div>
              <div class="d-flex justify-content-center">
                <button
                  type="submit"
                  class="btn btn-primary bg-dark text-white border-black"
                >
                  Sign In
                </button>
              </div>
            </form>
          </div>
          <div class="mt-3 text-center">
            <p>
              <a href="create-account.html" class="text-black"
                >Create an Account</a
              >
            </p>
            <p>
              <a href="forgot-password.html" class="text-black"
                >Forgot Password</a
              >
            </p>
          </div>
        </div>
      </div>
    </div>
    <hr class="featurette-divider" />
    <!-- FOOTER -->
    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-body-secondary"
          >Place sticky footer content here.</span
        >
      </div>
    </footer>
  </body>
</html>
