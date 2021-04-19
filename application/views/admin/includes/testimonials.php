<div class="row">
	<div class="col-md-7 m-auto">
		<div class="card card-primary">
			<div class="card-header py-3">
				<h6 class="mb-0 text-primary font-weight-bold">
					Testimonials
				</h6>
			</div>

			<div class="card-body text-center">
				<?php if (isset($testimonials) && empty($testimonials)): ?>
	                <p>No Record Found.</p>
	              <?php endif ?>

              <?php if (isset($testimonials) && !empty($testimonials)): ?>
                <div class="owl-carousel admin-testimonial-carousel owl-theme">
                  <?php foreach ($testimonials as $key => $value): ?>
                    <div class="item text-center">
                      <p class="text-muted">
                        <?php echo $value->content; ?>
                      </p>

                      <h6 class="font-weight-bold text-center"><?php echo $value->name; ?></h6>
                    </div>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
			</div>
		</div>
	</div>
</div>