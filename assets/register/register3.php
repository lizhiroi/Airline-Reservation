<?php include "../includes/header.php"; ?>

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
              <form>
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
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="unit" class="form-label">Unit/Apt:</label>
                      <input
                        type="text"
                        class="form-control shadow-none"
                        id="unit"
                        name="unit"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="town" class="form-label">Town/City:</label>
                      <input
                        type="text"
                        class="form-control shadow-none"
                        id="town"
                        name="town"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="postcode" class="form-label"
                        >Post Code:</label
                      >
                      <input
                        type="text"
                        class="form-control shadow-none"
                        id="postcode"
                        name="postcode"
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
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone Number:</label>
                  <input
                    type="tel"
                    class="form-control shadow-none"
                    id="phone"
                    name="phone"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="phoneType" class="form-label">Phone Type:</label>
                  <select
                    class="form-select shadow-none"
                    id="phoneType"
                    name="phoneType"
                  >
                    <option value="mobile">Mobile</option>
                    <option value="home">Home</option>
                    <option value="work">Work</option>
                  </select>
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
                <div class="d-flex justify-content-end">
                  <button
                    type="submit"
                    class="btn btn-primary bg-dark text-white border-dark"
                  >
                    <a
                      href="register4.php"
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