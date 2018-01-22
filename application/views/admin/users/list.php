<div class="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> List All Users</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Aprroved Or Not</th>
                <th>Created Date</th>
              </tr>
            </thead>
            <tbody>
              <?php if(isset($rows)) foreach ($rows as $key => $row) {?>
              <tr>
                <td><?=$row->username?></td>
                <td><?=$row->email?></td>
                <td><?=$row->activated?></td>
                <td><?=$row->created?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
