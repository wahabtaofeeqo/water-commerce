<div class="row">

		<div class="col-md-6 my-4 col-lg-5">
		<div class="card">
			<?php if (isset($error) && $error): ?>
				<div class="alert alert-danger m-2 text-center">
					<p><?php echo $errorMessage ?></p>
				</div>
			<?php endif ?>

			<?php if (isset($error) && !$error): ?>
				<div class="alert alert-success m-2 text-center">
					<p><?php echo $message ?></p>
				</div>
			<?php endif ?>

			<div class="card-header py-0 bg-white">
				<h4 class="card-title h5 mt-2">New Products</h4>
			</div>

			<div class="card-body">
				<form action="products" method="POST">
					<div class="form-group">
						<label for="name" class="sr-only">Name</label>
						<input type="text" name="name" class="form-control" placeholder="Product Name">
					</div>

					<div class="form-group">
						<label for="name" class="sr-only">Price</label>
						<input type="text" name="price" class="form-control" placeholder="Product Price">
					</div>

					<div class="form-group">
						<label for="name" class="sr-only">Category</label>
						<select name="category" class="form-control">
							<option value="bottle water">Bottle Water</option>
							<option value="pure water">Pure Water</option>
							<option value="dispenser water">Dispenser Water</option>
						</select>
					</div>

					<div class="form-group">
						<label for="name" class="sr-only">Company</label>
						<input type="text" name="company" class="form-control" placeholder="Company Name">
					</div>

					<div class="form-group">
						<label for="name" class="d-block">Logo</label>
						<input type="file" name="logo" class="orm-control">
					</div>

					<div class="form-group">
						<label for="name" class="sr-only">Description</label>
						<textarea rows="5" name="desc" class="form-control" placeholder="Description"></textarea>
					</div>

					<button class="btn btn-danger">Add Product</button>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-6 my-4 col-lg-7">

		<div class="card">
			<div class="card-body">

				<h4 class="mb-4 h5">Prodcuts</h4>
				<table class="table border-top-0 table-striped" id="table-products">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Price</th>
							<th>Category</th>
							<th>Company</th>
						</tr>
					</thead>

					<tbody>
						<?php if (empty($products)): ?>
							<tr>
								<td colspan="5" class="text-center">No Record Found</td>
							</tr>
						<?php endif ?>

						<?php if (!empty($products)): ?>
							<?php foreach ($products as $key => $value): ?>
								<tr>
									<td><?php echo $value->id ?></td>
									<td><?php echo $value->name ?></td>
									<td><?php echo $value->price ?></td>
									<td><?php echo $value->category ?></td>
									<td><?php echo $value->company ?></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>