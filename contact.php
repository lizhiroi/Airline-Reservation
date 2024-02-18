<?php
$page="contact";
include "includes ./header.php";
?>


<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb-content text-center">
          <h2 class="title">Contact Us</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../Release/index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb-area-end -->

<!-- contact-area -->
<section class="contact-area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="section-title text-center mb-40">
          <span class="sub-title">contact us now</span>
          <h2 class="title">Write a Message</h2>
        </div>
        <div class="contact-form">
          <form action="#">
            <div class="row">
              <div class="col-md-6">
                <div class="form-grp">
                  <input type="text" placeholder="Your Name *">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-grp">
                  <input type="email" placeholder="Your Email *">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-grp">
                  <input type="text" placeholder="Subject">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-grp">
                  <input type="number" placeholder="Your Mobile">
                </div>
              </div>
            </div>
            <div class="form-grp">
              <textarea name="message" placeholder="Message"></textarea>
            </div>
            <div class="submit-btn text-center">
              <button type="submit" class="btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact-area-end -->


<?php
include "includes ./footer.php";
?>
