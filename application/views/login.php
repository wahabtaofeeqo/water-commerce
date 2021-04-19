<?php include_once 'includes/header.php'; ?>

<div class="col-md-4 col-lg-3 center">
	<div class="card">

		<?php if (isset($error) && $error == TRUE): ?>
			<div class="alert alert-danger mx-2">
				<p><?php echo $errorMessage ?></p>
			</div>
		<?php endif ?>

		<div class="card-header py-0 bg-white">
			<h4 class="text-center card-title mt-2">Login</h4>
		</div>
		<div class="card-body">
			<form action="login" method="POST">
				<div class="form-group mb-4">
					<label for="username small">Email Address</label>
					<input type="text" name="username" class="form-control" placeholder="Enter Email" required="required">
				</div>

				<div class="form-group mb-4">
					<label for="password">Enter Password</label>
					<input type="password" name="password" class="form-control" placeholder="Enter Password" required="required">
				</div>

				<button class="btn btn-block btn-primary mb-4">Login</button>

				<div>
					<small class="small d-block text-center text-muted mb-2">Don't Have An Account?</small>
					<a href="register" class="btn btn-outline-danger btn-block">Create Account</a>
				</div>
			</form>
		</div>
	</div>
</div>