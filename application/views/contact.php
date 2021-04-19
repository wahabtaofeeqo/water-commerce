<div class="center col-md-6 col-lg-4">
	<div class="card shadow fadeIn">

		<?php if (isset($error) && $error): ?>
			<div class="mb-4 alert alert-danger">
				<p><?php echo $errorMessage; ?></p>
			</div>
		<?php endif ?>

		<?php if (isset($error) && !$error): ?>
			<div class="mb-4 alert alert-success">
				<p><?php echo $message; ?></p>
			</div>
		<?php endif ?>

		<div class="card-header py-0 bg-white">
			<h4 class="h4 card-title mt-2">Contact Us</h4>
		</div>

		<div class="card-body">
			<form action="contact" method="POST">
				<div class="form-group">
					<label for="name" class="sr-only">Name</label>
					<input type="text" name="name" class="form-control" style="box-shadow: none;" placeholder="Enter Your Name">
				</div>

				<div class="form-group">
					<label for="name" class="sr-only">Email</label>
					<input type="text" name="email" class="form-control" style="box-shadow: none;" placeholder="Enter Email">
				</div>

				<div class="form-group">
					<label for="name" class="sr-only">Subject</label>
					<input type="text" name="subject" class="form-control" style="box-shadow: none;" placeholder="Enter Subject">
				</div>

				<div class="form-group">
					<label for="name" class="sr-only">Message</label>
					<textarea rows="5" placeholder="Message" name="message" class="form-control" placeholder="Enter Message"></textarea>
				</div>

				<button class="btn btn-danger">Send</button>
			</form>
		</div>
	</div>
</div>