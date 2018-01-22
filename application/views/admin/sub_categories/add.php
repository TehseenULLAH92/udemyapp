
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Add New Sub Category</div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Select Category</label>
              <select class="form-control" name="categories_id">
                <option value="">Please Select A Category</option>
                <?php if(isset($rows)) foreach ($rows as $key => $row) {
                  ?>
                  <option value="<?=$row->categories_id?>"><?=$row->categories_name?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="sub_cat_name" value="" class="form-control">
            </div>
              <div class="form-group">
                <label> Description</label>
                <textarea name="description" rows="8" class="form-control" cols="80"></textarea>
              </div>

                <div class="form-group">
                <input type="submit" name="submit" value="Add New Course" class="btn btn-primary pull-right">
                <div class="clearfix"></div></div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
       <script>tinymce.init({ selector:'textarea' });</script>
