<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Products</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php 
                            if (isset($products)) {
                              echo count($products);
                            }
                          ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
            </div>
		</div>
	</div>

	<!-- Testimonial count -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      	<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Testimonials</div>
                    	<div class="h5 mb-0 font-weight-bold text-gray-800">
                       <?php 
                            if (isset($testimonials)) {
                              echo count($testimonials);
                            }
                          ?> 
                      </div>
                    </div>
                	<div class="col-auto">
                   		<i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
                	</div>
                  </div>
            </div>
        </div>
    </div>


    <!-- Newsletter count -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      	<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Newsletter</div>
                      	<div class="row no-gutters align-items-center">
	                        <div class="col-auto">
	                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                             <?php 
                                if (isset($newsletter)) {
                                  echo count($newsletter);
                                }
                              ?> 
                            </div>
	                        </div>
	                        <div class="col d-none">
	                          <div class="progress progress-sm mr-2">
	                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
	                          </div>
	                        </div>
                      	</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <!-- Contacts count -->
    <div class="col-xl-3 col-md-6 mb-4">
       	<div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      	<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Contacts</div>
                      	<div class="h5 mb-0 font-weight-bold text-gray-800">
                         <?php 
                            if (isset($contacts)) {
                              echo count($contacts);
                            }
                          ?> 
                        </div>
                    </div>
                    <div class="col-auto">
                      	<i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
	<div class="col-xl-7 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Contacts</h6>
            </div>

            <div class="card-body">

              <?php if (isset($contacts) && empty($contacts)): ?>
                <p class="text-center">No Record Found</p>
              <?php endif ?>

              <?php if(isset($contacts) && !empty($contacts)):?>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Message</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($contacts as $key => $value): ?>
                          <tr>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->subject; ?></td>
                            <td><?php echo substr($value->name, 0, 100); ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
              <?php endif ?>
            </div>
        </div>
    </div>

    <!-- Testimonilas -->
    <div class="col-xl-5 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Testimonials</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
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

<div class="row">

    <div class="col-lg-7 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Top Products</h6>
            </div>
            <div class="card-body p-0">
              <?php if (isset($products) && empty($products)): ?>
                <p>No Record Found.</p>
              <?php endif ?>

              <?php if (isset($products) && !empty($products)): ?>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <td>Company</td>
                        <th>Date</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($products as $key => $value): ?>
                        <tr>
                          <td>
                            <?php echo $value->id; ?>
                          </td>

                          <td>
                            <?php echo $value->name; ?>
                          </td>

                          <td><?php echo $value->company; ?></td>

                          <td>
                            <?php echo($value->created); ?>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              <?php endif ?>
            </div>
        </div>
    </div>

    <!-- Content Column -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
               	<h6 class="m-0 font-weight-bold text-primary">Newsletter</h6>
            </div>
            <div class="card-body p-0">
             	<?php if (isset($newsletter) && empty($newsletter)): ?>
                <p>No Record Found.</p>
              <?php endif ?>

              <?php if (isset($newsletter) && !empty($newsletter)): ?>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Date</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($newsletter as $key => $value): ?>
                        <tr>
                          <td>
                            <?php echo $value->id; ?>
                          </td>

                          <td>
                            <?php echo $value->email; ?>
                          </td>

                          <td>
                            <?php echo($value->created); ?>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              <?php endif ?>
            </div>
        </div>
    </div>
</div>