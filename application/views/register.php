<?php include_once 'includes/header.php'; ?>

<div class="col-md-8 col-lg-4 my-4 mx-auto">
	<div class="card">
		<?php if (isset($error) && $error): ?>
			<div class="alert alert-danger m-2 text-center">
				<p><?php echo $errorMessage ?></p>
			</div>
		<?php endif ?>

		<div class="card-header py-0 bg-white">
			<h4 class="text-center card-title mt-2">Register</h4>
		</div>

		<div class="card-body">
			<form action="register" method="POST">

				<div class="form-group mb-4">
					<label for="username small">Fisrtname</label>
					<input type="text" name="firstname" class="form-control" placeholder="Enter Fisrtname" required="">
				</div>

				<div class="form-group mb-4">
					<label for="username small">Lastname</label>
					<input type="text" name="lastname" class="form-control" placeholder="Enter Lastname" required="">
				</div>

				<div class="form-group mb-4">
					<label for="username small">Email Address</label>
					<input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
				</div>

				<div class="form-group mb-4">
					<label for="username small">Phone Number</label>
					<input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required="">
				</div>

				<div class="form-group mb-4">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Enter Password" required="">
				</div>

				<button class="btn btn-block btn-primary mb-4">Register</button>

				<div>
					<small class="small d-block text-center text-muted mb-2">Already Have An Account?</small>
					<a href="login" class="btn btn-outline-danger btn-block">Login</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="./assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script type="text/javascript" src="./assets/js/jquery.toast.min.js"></script>
<script type="text/javascript" src="./assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="./assets/js/script.js"></script>

</body>
</html>