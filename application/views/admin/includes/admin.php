<div class="row " style="height: inherit;">
	<div class="col-md-12 col-lg-6 mb-4">
		<div class="card">
			<form action="admins" class="card-body" method="POST" id="adminForm">
				<div class="form-group">
					<label for="firstname">Firstname:</label>
					<input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
				</div>

				<div class="form-group">
					<label for="lastname">Lastname:</label>
					<input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
				</div>

				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" class="form-control" placeholder="Email" required>
				</div>

				<div class="form-group">
					<label for="phone">Phone:</label>
					<input type="tel" name="phone" class="form-control" placeholder="Phone" required>
				</div>

				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>

				<button class="btn btn-outline-danger mt-4 px-5">Add</button>
			</form>
		</div>
	</div>


	<div class="col-md-12 col-lg-6">
		<div class="card">
			<div class="card-header py-0 bg-danger">
				<h4 class="card-title mt-2 h5 text-white">Administrators</h4>
			</div>

			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
							<th>Phone</th>
						</tr>
					</thead>


					<tbody>
						<?php if (empty($admins)): ?>
							<tr><td colspan="6">No Record Found</td></tr>
						<?php endif ?>

						<?php if (!empty($admins)): ?>
							<?php foreach ($admins as $key => $value): ?>
								<tr>
									<td><?php echo $value->id ?></td>
									<td><?php echo $value->firstname ?></td>
									<td><?php echo $value->lastname; ?></td>
									<td><?php echo $value->email; ?></td>
									<td><?php echo $value->phone; ?></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>