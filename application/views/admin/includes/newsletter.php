<div class="row">
  <div class="col-md-12">
    <h6 class="my-4 font-weight-bold text-primary">Subscribers</h6>
    <div class="table-responsive">
      <table class="table table-striped" id="table-products">
        <thead>
          <tr>
                          <th>#</th>
                          <th>Email</th>
                          <th>Created</th>
                        </tr>
        </thead>


        <tbody>
          <?php if (empty($newsletter)): ?>
            <tr><td colspan="6">No Record Found</td></tr>
          <?php endif ?>

          <?php if (!empty($newsletter)): ?>
            <?php foreach ($newsletter as $key => $value): ?>
               <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->created; ?></td>
                </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>