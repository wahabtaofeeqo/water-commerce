<?php include_once 'includes/navbar.php'; ?>

<header class="">
	<div id="carouselExampleControls" class="carousel slide rounded shadow" data-ride="carousel">
		<div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="./assets/images/rain.jpg" class="d-block w-100" alt="Background Image">

		      	<div class="carousel-caption d-none d-md-block full-top animated swing">
		         	<h5 class="h1 font-weight-bold center">Bottle Water From Best Companies!</h5>
		        </div>
		    </div>
		    <div class="carousel-item">
		      <img src="./assets/images/dispenser.jpg" class="d-block w-100" alt="Background Image">

		      <div class="carousel-caption d-none d-md-block full-top animated slideInUp">
		         	<h5 class="h1 font-weight-bold center">Use Water Dispenser From The Best!</h5>
		        </div>
		    </div>
		    <div class="carousel-item">
		      <img src="assets/images/bg3.jpg" class="d-block w-100" alt="Background Image">

		      <div class="carousel-caption d-none d-md-block full-top animated tada">
		         	<h5 class="h1 font-weight-bold center">What is in Your Pure Water Sachet?</h5>
		        </div>
		    </div>
		</div>
	</div>
</header>

<div class="py-5">
	<div class="container text-center pb-5 pt-4">

		<h4 class="h1 text-white mb-5 font-weight-bold animated slideInRight">Water From The Purest Source!</h4>

		<p class="text-white slide-left">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
</div>


<div class="py-5 bg-light fadeIn" id="products">

	<h4 class="h1 font-weight-bold text-primary text-center mb-5">Products</h4>

	<div class="container pt-3 pb-4 slide-left">
		<h4 class="h4 mb-3">Bottle Water</h4>
		<span class="line mb-5"></span>

		<div class="owl-carousel products-carousel owl-theme">

			<?php foreach ($products as $key => $product): ?>
				<div class="item card shadow animated">
					<img src="<?php echo("uploads/" . $product->logo)?>" class="card-img-top" style="height: 230px;">
					<div class="card-footer p-0 bg-white">
						<a href="details/1" class="btn btn-block btn-primary" style="border-top-right-radius: 0px; border-top-left-radius: 0px;">View Details</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>

	<div class="container pt-5 pb-4 slide-left">

		<h4 class="h4 mb-3">Dispenser Water</h4>
		<span class="line mb-5"></span>

		<div class="owl-carousel products-carousel owl-theme">
			<?php foreach ($products as $key => $product): ?>
				<div class="item card shadow animated">
					<img src="<?php echo("uploads/" . $product->logo)?>" class="card-img-top" style="height: 230px;">
					<div class="card-footer p-0 bg-white">
						<a href="<?php echo("details/") . $product->id; ?>" class="btn btn-block btn-primary" style="border-top-right-radius: 0px; border-top-left-radius: 0px;">View Details</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>


	<div class="container pt-5 pb-4 slide-left">

		<h4 class="h4 mb-3">Sachet Water</h4>
		<span class="line mb-5"></span>

		<div class="owl-carousel products-carousel owl-theme">
			<?php foreach ($products as $key => $product): ?>
				<div class="item card shadow animated">
					<img src="<?php echo("uploads/" . $product->logo)?>" class="card-img-top" style="height: 230px;">
					<div class="card-footer p-0 bg-white">
						<a href="<?php echo("details/") . $product->id; ?>" class="btn btn-block btn-primary" style="border-top-right-radius: 0px; border-top-left-radius: 0px;">View Details</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>


<div class="py-5 slide-left" style="background: darkblue" id="about">
	<div class="container text-center py-5">

		<h4 class="h1 text-white mb-5 font-weight-bold animated fadeIn">About Water.com</h4>
		<p class="text-white">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
</div>


<div class="py-5 bg-light" style="background: url(assets/images/blue.jpg); background-size: cover; background-attachment: fixed;">
	<div class="container text-center py-5">

		<h4 class="h1 mb-5 text-white font-weight-bold">What People Say About Us</h4>

		<div class="bg-white p-5 owl-carousel owl-theme admin-testimonial-carousel rounded shadow">
			<?php foreach ($testimonials as $key => $value): ?>
				<div class="item">
					<h1 class="h4 mb-4 font-weight-bold"><?php echo $value->name; ?></h1>
					<p class=""><?php echo $value->content; ?> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			<?php endforeach ?>
		</div>
	</div>


	<div class="container py-5">

		<div class="col-lg-10 py-5 m-auto">
			<h4 class="h4 mb-4 text-white font-weight-bold">News Letter</h4>

			<form class="form-inline" action="newsletter" method="POST" id="newsletter">
				<div class="form-group col-md-10 px-0">
					<input type="email" name="email" class="form-control form-control-lg w-100" placeholder="Enter Your Email" style="border-top-right-radius: 0; border-bottom-right-radius: 0; box-shadow: none;" required="">
				</div>
				
				<button class="btn btn-lg btn-danger col-md-2" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
					Connect
				</button>
			</form>
		</div>
	</div>
</div>


<?php include_once 'includes/footer.php'; ?>