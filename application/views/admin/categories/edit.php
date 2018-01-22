
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Add New Category</div>
        <div class="card-body">
          <?php if(isset($rows)) ?>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="categories_name" value="<?php echo $rows['categories_name']?>" class="form-control">
            </div>
              <div class="form-group">
                <label> Description</label>
                <textarea name="description" rows="8" class="form-control" cols="80"><?php echo $rows['description']?></textarea>
              </div>
                <div class="form-group">
                <input type="submit" name="submit" value="Update Category" class="btn btn-primary pull-right">
                <div class="clearfix"></div></div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
       <script>tinymce.init({ selector:'textarea' });</script>
