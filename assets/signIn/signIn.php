</div>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    