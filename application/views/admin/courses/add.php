
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Add New Course</div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Select Category</label>

              <select class="form-control" name="categories_id">
                <option value="">Please Select A Category</option>
                <?php
                if(isset($cat)) foreach ($cat as $key => $row) {
                  ?>
                  <option value="<?=$row->categories_id?>"
                    <?php
                      if($row->categories_id === $this->Admin_model->get_category_by_name("sub_categories",$this->uri->segment(4))->categories_id)
                      {
                        echo "selected='selected'";
                      }
                  ?>>
                    <?=$row->categories_name?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Select Category</label>

              <select class="form-control" name="sub_categories_id">
                <option value="">Please Select A Sub Category</option>
                <?php
                if(isset($sub)) foreach ($sub as $key => $row) {
                  ?>
                  <option value="<?=$row->sub_categories_id?>"
                    <?php
                      if($row->sub_categories_id === $this->Admin_model->get_category_by_name("sub_categories",$this->uri->segment(4))->sub_categories_id)
                      {
                        echo "selected='selected'";
                      }
                  ?>>
                    <?=$row->sub_cat_name?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="short_title" value="" class="form-control">
            </div>
            <div class="form-group">
              <label>Long Title</label>
              <input type="text" name="long_title" class="form-control">
              <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" rows="8" class="form-control" cols="80"></textarea>
              </div>
              <div class="form-group">
                <label>Long Description</label>
                <textarea name="long_description" rows="8" class="form-control" cols="80"></textarea></div>
                <div class="form-group">
                <label>Feature Image</label>
                <input type="file" name="feature_image" class="form-control" value=""></div>
                <div class="form-group">
                <label>Feature Video (Youtube Video ID ie - -hFBAC0D5tw)</label>
                <!-- <input type="file" name="feature_video" class="form-control" value=""></div> -->
                <input type="text" name="feature_video" class="form-control" value=""></div>
                <div class="form-group">
                <label>Course Price</label>
                <input type="text" name="course_price" class="form-control" value=""></div>
                <div class="form-group">
                <label>Course Discount Price</label>
                <input type="text" name="course_descount_price" class="form-control" value=""></div>
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
