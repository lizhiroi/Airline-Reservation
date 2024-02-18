<?php include "../includes/header.php"; ?>

<div class="row justify-content-start mt-4">
        <div class="col-md-6">
          <div class="row align-items-center">
            <div class="col-md-1">
              <h2>
                <span class="rounded-circle bg-dark text-white p-2 mr-2"
                  >2</span
                >
              </h2>
            </div>
            <div class="col-md-11">
              <h2>Account information</h2>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-md-1"></div>
            <div class="col-md-11">
              <p>
                Enter your name as it appears on your government-issued photo
                ID. Knowing more about our members helps us ensure greater
                account security. Only a parent or legal guardian may complete
                this form to enroll a child under the age of majority in their
                place of residence.
              </p>
              <form>
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="firstName" class="form-label"
                        >First Name:</label
                      >
                      <input
                        type="text"
                        class="form-control shadow-none"
                        id="firstName"
                        name="firstName"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="middleName" class="form-label"
                        >Middle Name(opt):</label
                      >
                      <input
                        type="text"
                        class="form-control shadow-none"
                        id="middleName"
                        name="middleName"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="lastName" class="form-label"
                        >Last Name:</label
                      >
                      <input
                        type="text"
                        class="form-control shadow-none"
                        id="lastName"
                        name="lastName"
                        required
                      />
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Gender:</label>
                  <div class="form-check">
                    <input
                      class="form-check-input shadow-none"
                      type="radio"
                      name="gender"
                      id="male"
                      value="male"
                      required
                    />
                    <label class="form-check-label" for="male">Male</label>
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input shadow-none"
                      type="radio"
                      name="gender"
                      id="female"
                      value="female"
                      required
                    />
                    <label class="form-check-label" for="female">Female</label>
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input shadow-none"
                      type="radio"
                      name="gender"
                      id="other"
                      value="other"
                      required
                    />
                    <label class="form-check-label" for="other">Other</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="dobDay" class="form-label"
                        >Date of Birth (Day):</label
                      >
                      <input
                        type="number"
                        class="form-control shadow-none"
                        id="dobDay"
                        name="dobDay"
                        min="1"
                        max="31"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="dobMonth" class="form-label"
                        >Date of Birth (Month):</label
                      >
                      <select
                        class="form-select shadow-none"
                        id="dobMonth"
                        name="dobMonth"
                        required
                      >
                        <option value="" selected>Select Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <!-- Add other months here -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="dobYear" class="form-label"
                        >Date of Birth (Year):</label
                      >
                      <input
                        type="number"
                        class="form-control shadow-none"
                        id="dobYear"
                        name="dobYear"
                        min="1900"
                        max="2023"
                        required
                      />
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <button
                    type="submit"
                    class="btn btn-primary bg-dark text-white border-dark"
                  >
                    <a
                      href="register3.php"
                      class="btn btn-primary bg-dark text-white border-dark"
                      >Continue</a
                    >
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<?php include "../signIn/signIn.php"; ?> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include "../includes/footer.php"; ?>