<div class="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> List All Sub Categories</div>
      <div class="card-body">
        <a href="admin/sub_categories/add" class="btn btn-primary">Add New Sub Category</a><br><br>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(isset($rows)) foreach ($rows as $key => $row) {?>
              <tr>
                <td><?=$row->sub_cat_name?></td>
                <td><?=$this->Admin_model->get_category_by_name("categories",$row->categories_id)->categories_name?></td>
                <td><?=word_limiter($row->description, 10) ?></td>
                <td><a class="btn btn-primary" href="<?=base_url();?>admin/sub_categories/edit/<?=$row->sub_categories_id?>">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete it?');" class="btn btn-primary" href="<?=base_url();?>admin/sub_categories/delete/<?=$row->sub_categories_id?>">Delete</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
