<div class="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> List All Categories</div>
      <div class="card-body">
        <a href="admin/categories/add" class="btn btn-primary">Add New Categories</a><br><br>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(isset($rows)) foreach ($rows as $key => $row) {?>
              <tr>
                <td><?=$row->categories_name?></td>
              <td><?=word_limiter($row->description, 10) ?></td>
                <td><a class="btn btn-primary" href="<?=base_url();?>admin/categories/edit/<?=$row->categories_id?>">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete it?');" class="btn btn-primary" href="<?=base_url();?>admin/categories/delete/<?=$row->categories_id?>">Delete</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
