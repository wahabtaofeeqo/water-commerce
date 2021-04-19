<?php include_once 'header.php'; ?>

<nav class="navbar navbar-light bg-transparent navbar-expand-md shadow">
	<div class="container">

		<a class="navbar-brand" href="home">
		   <h4 class="">Water</h4>
		</a>
	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		 </button>

		<div class="collapse navbar-collapse" id="navbarContent">

			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
			        <a class="nav-link" href="home">Home</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" href="#products" scrollTo="products" duration="2000">Products</a>
			    </li>
			    <li class="nav-item">
			       <a class="nav-link" href="#about">About Us</a>
			    </li>

			    <li class="nav-item dropdown">
			        <a class="nav-link" href="contact">Contact Us</a>
			    </li>

			    <li class="nav-item dropdown">

			    	<a href="#" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    		<i class="fa fa-shopping-cart" style="font-size: 22px;"></i>
			    		<span class="badge badge-danger small" style="position: absolute; top: 0px; right: 0px;">
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
				                  	<div class="mr-3 d-none">
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

			            	<a class="dropdown-item text-center rounded-bottom small" href="checkout" style="background: lightgray; color: #000;">
				    			Checkout
				    		</a>
			            <?php endif ?>
			    	</div>
			    </li>

			    <?php if ($this->session->has_userdata('username')): ?>
			    	<li class="nav-item">
				        <a class="nav-link" href="logout">Logout</a>
				    </li>
			    <?php endif ?>

			</ul>
		</div>
	</div>
</nav>