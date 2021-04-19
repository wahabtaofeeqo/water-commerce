<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped" id="table-products">
        <thead>
           <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Manage</th>
            </tr>
        </thead>


        <tbody>
          <?php if (empty($contacts)): ?>
            <tr><td colspan="6">No Record Found</td></tr>
          <?php endif ?>

          <?php if (!empty($contacts)): ?>
            <?php foreach ($contacts as $key => $value): ?>
                <tr>
                  <td><?php echo $value->name; ?></td>
                  <td><?php echo $value->email; ?></td>
                  <td><?php echo $value->subject; ?></td>
                  <td><?php echo substr($value->name, 0, 100); ?></td>

                  <td>
                      <a href="#" class="btn btn-sm btn-danger">View</a>
                  </td>
                          </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>