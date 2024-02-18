<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AIRS'R'US</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <!-- bootstrap icon font (Main Menu) -->
    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    /> -->

    <!-- bootstrap icon font (SNS) -->
    <!-- <link
      href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"
      rel="stylesheet"
    /> -->
  </head>
  <body>
    <div class="container">
      <div class="bg-dark p-3">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h1 class="display-4 text-white">AIRS'R'US</h1>
          </div>
          <div class="d-flex align-items-center">
            <a
              class="btn btn-outline-secondary text-white border-dark"
              href="javascript:void(0);"
              id="searchButton"
              data-toggle="collapse"
              data-target="#searchInput"
              aria-expanded="false"
              aria-controls="searchInput"
              >Search</a
            >
            <div class="collapse form-inline ml-2" id="searchInput">
              <input
                class="form-control shadow-none mr-2"
                type="text"
                placeholder="Search"
                aria-label="Search"
              />
            </div>
            <div>
              <button
                type="button"
                class="btn btn-outline-secondary text-white border-dark"
                data-bs-toggle="modal"
                data-bs-target="#signInModal"
              >
                Sign In
              </button>
            </div>
          </div>
        </div>
      </div>
