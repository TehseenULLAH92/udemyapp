<div class="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> List All Courses</div>
      <div class="card-body">
        <a href="admin/courses/add" class="btn btn-primary">Add New Course</a><br><br>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Title</th>
                <!-- <th>Description</th> -->
                <th>Image</th>
                <th>Video</th>
                <th>Date</th>
                <th>Price</th>
                <th>Discount Price</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(isset($rows)) foreach ($rows as $key => $row) {?>
              <tr>
                <td><?=word_limiter($row->short_title, 5)?></td>
                <td><?=word_limiter($row->long_title,10)?></td>
                <!-- <td><?=word_limiter($row->short_description, 10) ?></td> -->
                <td>
                  <?php if($row->feature_image){?>
                    <img src="uploads/courses/images/<?=$row->feature_image?>">
                  <?php }else{
                    ?>
                    <img class="card-img-top" src="https://udemy-images.udemy.com/course/240x135/1194906_f5e2_5.jpg" alt="">
                    <?php
                  }?>
                  </td>
                <td><?php if($row->feature_video){?>
                  <iframe width="220" height="135" src="https://www.youtube.com/embed/<?=$row->feature_video?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <?php }else{
                  ?>
                  <iframe width="220" height="135" src="https://www.youtube.com/embed/KhzGSHNhnbI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                  <?php
                }?>
                </td>
                <td><?=$row->created_date?></td>
                <td><?=$row->course_price?></td>
                <td><?=$row->course_descount_price?></td>
                <td><?=$this->Admin_model->get_category_by_name("categories",$row->categories_id)->categories_name?></td>
                <td><?=$this->Admin_model->get_category_by_name("sub_categories",$row->sub_categories_id)->sub_cat_name?></td>
                <td><a class="btn btn-primary" href="<?=base_url();?>admin/courses/edit/<?=$row->course_id?>">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete it?');" class="btn btn-primary" href="<?=base_url();?>admin/courses/delete/<?=$row->course_id?>">Delete</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
