<?php
// connect to databse
require 'dbConnect.php';

// Fetch All the cities query the database
$sql= "SELECT airport_id, airport_city FROM ar_airport";

$stmt = $db->prepare($sql);
$stmt->execute();

$city = $stmt->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST superglobal
    $departure = $_POST["departure"];
    $arrive = $_POST["arrive"];
    // For example, print the submitted data
	// echo '<script>alert("From: " . $departure . " To: " . $arrive);</script>';

    // echo "From: " . $departure . "<br>";
    // echo "To: " . $arrive;
} else {
    // Handle invalid requests
    // echo "Invalid request";
}



$page="home";
include "includes ./header.php";
?>

<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
	<div class="carousel-indicators">
		<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
	</div>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="./assets/img/slider/slider_bg01.jpg" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">
			<div class="container">
				<div class="carousel-caption text-start">
					<h1>Example headline.</h1>
					<p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
					<p><a class="btn btn-lg btn-primary" href="./register/register1.php">Sign up today</a></p>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="./assets/img/slider/slider_bg02.jpg" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">
			<div class="container">
				<div class="carousel-caption">
					<h1>Another example headline.</h1>
					<p>Some representative placeholder content for the second slide of the carousel.</p>
					<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
				</div>
			</div>
		</div>
		<div class="carousel-item">

			<img src="./assets/img/slider/slider_bg03.jpg" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">
			<div class="container">
				<div class="carousel-caption text-end">
					<h1>One more for good measure.</h1>
					<p>Some representative placeholder content for the third slide of this carousel.</p>
					<p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
				</div>
			</div>
		</div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>

<!-- Flight Search  -->
<div class="container-fluid">
	<div class="card custom-bg w-75 p-4 d-flex">
		<div class="row">
			<div class="pb-3 h3 text-left">Flight Search &#128747;</div>
		</div>
		<form id="flight-form" method="POST" action="booking-list.php">
			<div class="row">
				<div class="form-group col-md align-items-start flex-column">
					<label for="origin" class="d-inline-flex">From</label>
					<input type="text" placeholder="City or Airport" class="form-control" id="departure" name="departure" oninput="showCities(this.value, 'departure')" required>
				</div>
				<div class="form-group col-md align-items-start flex-column">
					<label for="depart" class="d-inline-flex">To</label>
					<input type="text" placeholder="City or Airport" class="form-control" id="arrive" name="arrive" oninput="showCities(this.value, 'return')"  required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md align-items-start flex-column">
					<label for="departure-date" class=" d-inline-flex">Depart</label>
					<input type="date" class="form-control" id="departure-date" name="departure-date" onkeydown="return false" required>
				</div>
				<div class="form-group col-md align-items-start flex-column">
					<label for="return-date" class="d-inline-flex">Return</label>
					<input type="date" placeholder="One way" value="" onChange="this.setAttribute('value', this.value)" class="form-control" id="return-date" name="return-date">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-3 align-items-start flex-column">
					<label for="adults" class="d-inline-flex col-auto">Adults <span class="sublabel"> 12+
						</span></label>
					<select class="form-select" id="adults" onchange="javascript: dynamicDropDown(this.options[this.selectedIndex].value);">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
				</div>
				<div class="form-group col-lg-3 align-items-start flex-column">
					<label for="children" class="d-inline-flex col-auto">Children <span class="sublabel"> 2-11
						</span></label>
					<select class="form-select" id="children">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
					</select>
				</div>
				<div class="form-group col-lg-3 align-items-start flex-column">
					<label for="infants" class="d-inline-flex col-auto">Infants <span class="sublabel"> less than
							2</span></label>
					<select class="form-select" id="infants">
						<option value="0">0</option>
						<option value="1">1</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-6 align-items-start flex-column">
					<label for="cabin" class="d-inline-flex">Cabin</label>
					<select class="form-select" id="cabin">
						<option value="ECONOMY">Economy</option>
						<option value="PREMIUM_ECONOMY">Premium Economy</option>
						<option value="BUSINESS">Business</option>
						<option value="FIRST">First</option>
					</select>
				</div>

			</div>
			<div class="row">
				<div class="text-center col-auto">
					<button type="submit" class="btn btn-primary">Search flights</button>
				</div>
			</div>
		</form>
	</div>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-4">
			<img src="./assets/img/images/fly_img02.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">

			<h2 class="fw-normal">Heading</h2>
			<p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
			<p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img src="./assets/img/images/fly_img03.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">
			<h2 class="fw-normal">Heading</h2>
			<p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
			<p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
		</div><!-- /.col-lg-4 -->
		<div class="col-lg-4">
			<img src="./assets/img//images/fly_img04.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">
			<h2 class="fw-normal">Heading</h2>
			<p>And lastly this, the third column of representative placeholder content.</p>
			<p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
		</div><!-- /.col-lg-4 -->
	</div><!-- /.row -->


	<!-- START THE FEATURETTES -->

	<hr class="featurette-divider">

	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-body-secondary">It’ll blow your mind.</span></h2>
			<p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
		</div>
		<div class="col-md-5">
			<img src="./assets/img/images/fly_img05.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">

		</div>
	</div>

	<hr class="featurette-divider">

	<div class="row featurette">
		<div class="col-md-7 order-md-2">
			<h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-body-secondary">See for yourself.</span></h2>
			<p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
		</div>
		<div class="col-md-5 order-md-1">
			<img src="./assets/img/images/fly_img07.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">
		</div>
	</div>

	<hr class="featurette-divider">

	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-body-secondary">Checkmate.</span></h2>
			<p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
		</div>
		<div class="col-md-5">
			<img src="./assets/img/images/fly_img08.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false" alt="...">
		</div>
	</div>

	<hr class="featurette-divider">

	<!-- /END THE FEATURETTES -->

</div><!-- /.container -->



<?php include "includes ./footer.php"; ?>