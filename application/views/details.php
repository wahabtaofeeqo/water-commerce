<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<title>Water Without Fear</title>

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="icon" type="image/x-icon" href="favicon.ico">
  	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.toast.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
  
</head>
<body>

<nav class="navbar navbar-light bg-transparent navbar-expand-md shadow">
	<div class="container">

		<a class="navbar-brand" href="/water/home">
		   <h4 class="">Water</h4>
		</a>
	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		 </button>

		<div class="collapse navbar-collapse" id="navbarContent">

			<ul class="navbar-nav ml-auto">
			    <li class="nav-item dropdown">
			        <a class="nav-link" href="/water/contact">Contact Us</a>
			    </li>

			    <li class="nav-item dropdown">

			    	<a href="#" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    		<i class="fa fa-shopping-cart" style="font-size: 22px;"></i>
			    		<span class="badge badge-danger" style="position: absolute; top: 0px; right: 0px;">
			    			<?php echo $this->cart->total_items(); ?>
			    		</span>
			    	</a>

			    	<div class="dropdown-menu p-0" style="left: auto; top: 50px; right: 10px; width:auto;">

			    		<h6 class="dropdown-header text-white bg-danger rounded-top">
			                Cart Items
			            </h6>

			            <?php if ($this->cart->total_items() == 0): ?>
			            	<div class="dropdown-item">
					            <span class="p-5 small">Your Cart Is Empty</span>
					       	</div>
			            <?php endif ?>

			            <?php if ($this->cart->total_items() > 0): ?>
			            	<?php foreach ($this->cart->contents() as $key => $value): ?>
			            		
			            		<div class="dropdown-item d-flex align-items-center border-bottom-light" href="#">
				                  	<div class="mr-3">
				                    	<div class="icon-circle bg-primary">
				                      		<i class="fas fa-file-alt"></i>
				                    	</div>
				                  	</div>

					                <div class="d-inline-block pr-5">
					                  	<div class="small text-gray-500">Name:</div>
							            <span class=""><?php echo $value['name']; ?></span>
							       	</div>

							       	<div class="d-inline-block pr-5">
					                  	<div class="small text-gray-500">Price</div>
							            <span class="font-weight-bold"><?php echo $value['price']; ?></span>
							       	</div>

							       	<div class="d-inline-block pr-5">
					                  	<div class="small text-gray-500">Quantity</div>
							            <span class="font-weight-bold"><?php echo $value['qty']; ?></span>
							       	</div>
				                </div>

				                <?php if($key == 4) break; ?>
			            	<?php endforeach ?>

			            	<a class="dropdown-item text-center rounded-bottom small" href="/water/checkout" style="background: lightgray; color: #000;">
				    			Checkout
				    		</a>
			            <?php endif ?>
			    	</div>
			    </li>

			    <?php if ($this->session->has_userdata('username')): ?>
			    	<li class="nav-item">
				        <a class="nav-link" href="/water/logout">Logout</a>
				    </li>
			    <?php endif ?>

			</ul>
		</div>
	</div>
</nav>

<div class="bg-white py-5">
	<div class="container">
		<div class="row pb-5">
			<div class="col-md-6">
				<div class="card">
					<img src="<?php echo("../uploads/") . $product->logo; ?>" class="card-img-top" style="height: 400px;">
				</div>
			</div>

			<div class="col-md-6 mb-4">
				<h4 class="h5 title mt-4 mb-4"><?php echo $product->name . " " . $product->category; ?></h4>

				<p class="text-muted">
					<?php echo $product->description; ?>
				</p>

				<p class="">Company: <?php echo $product->company; ?></p>

				<form action="/water/add-item" method="POST" id="addItemForm">

					<input type="hidden" name="id" value="1">
					<input type="hidden" name="price" value="<?php echo($product->price); ?>">
					<input type="hidden" name="name" value="<?php echo($product->name) ?>">

					<div class="form-group mt-5">
						<input type="number" name="q" placeholder="Quantity" value="1" pattern="[0-9]" accept="[0-9]" class="form-control">
					</div>

					<button class="btn btn-danger mt-4">Add To Cart</button>
				</form>
			</div>
		</div>

		<h4 class="h4 mt-5 mb-4 font-weight-bold">Similar Products</h4>
		<span class="line mb-5"></span>

		<?php if (empty($similars)): ?>
			<p>No Similar Product Found</p>
		<?php endif ?>

		<?php if (!empty($similars)): ?>
			<div class="row pb-5">
				<div class="col-md-4">
					<div class="card shadow-sm">
						<img src="../assets/images/bottle1.jpg" class="card-img-top" style="height: 300px;">

						<button class="btn btn-light">View Details</button>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card shadow-sm">
						<img src="../assets/images/bottle1.jpg" class="card-img-top" style="height: 300px;">

						<button class="btn btn-light">View Details</button>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card shadow-sm">
						<img src="../assets/images/bottle1.jpg" class="card-img-top" style="height: 300px;">

						<button class="btn btn-light">View Details</button>
					</div>
				</div>
			</div>
		<?php endif ?>
	</div>
</div>



	<footer class="bg-dark py-3">
		<div class="container text-center">
			<p class="text-white mt-4">All Right Reserved &copy; Water.com. Designed By <a href="#" class="text-danger font-weight-bold"> Coder</a></p>
		</div>
	</footer>


    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>

   	<script type="text/javascript" src="../assets/js/smoothScroll-ES5.js"></script>
   	<script type="text/javascript" src="../assets/js/jquery.toast.min.js"></script>
   	<script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
   	<script type="text/javascript" src="../assets/js/jquery.scrollSlide.js"></script>
   	
   	<script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>