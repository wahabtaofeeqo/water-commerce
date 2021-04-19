<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped" id="table-products">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Payment</th>
						<th>Location</th>
						<th>Status</th>
					</tr>
				</thead>


				<tbody>
					<?php if (empty($orderedProducts)): ?>
						<tr><td colspan="6">No Record Found</td></tr>
					<?php endif ?>

					<?php if (!empty($orderedProducts)): ?>
						<?php foreach ($orderedProducts as $key => $value): ?>
							<tr>
								<td><?php echo $value->id ?></td>
								<td><?php echo $value->firstname ?></td>
								<td><?php echo $value->phone ?></td>
								<td><?php echo $value->name ?></td>
								<td> <?php echo $value->quantity ?></td>
								<td><?php if($value->pstatus == 0) echo "Not Verified"; else echo "Verified"; ?></td>
								<td><?php echo $value->location; ?></td>
								<td>
									<?php echo $value->status ?>
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>