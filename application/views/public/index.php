<div class="container-fluid">
  <div class="row">
  <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block img-fluid" src="assets/public/img/slider1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" src="assets/public/img/slider1.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" src="assets/public/img/slider1.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>

<div class="container">

  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <?php if(isset($rows)) foreach ($rows as $key => $row): ?>
          <div class="col-lg-3 col-md-4 mb-2">
            <div class="card h-100">
              <a href="details/<?=$row->slug?>"><span class="badge badge-primary">NEW</span>
                <?php if($row->feature_image){?>
                  <img class="card-img-top" src="uploads/courses/images/<?=$row->feature_image?>" alt="">
                <?php }else{
                  ?>
                  <img class="card-img-top" src="https://udemy-images.udemy.com/course/240x135/1194906_f5e2_5.jpg" alt="">
                  <?php
                }?>
              </a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="details/<?=$row->slug?>"><?=$row->short_title?></a>
                </h4>
                <p class="card-text"><?=$row->long_title?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                <h5 class="color-black"><span class="line">$ <?=$row->course_price?></span> <span class="pull-right"><?=$row->course_descount_price?></span></h5>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <?php if(isset($best_seller)) foreach ($best_seller as $key => $row): ?>
          <div class="col-lg-3 col-md-4 mb-2">
            <div class="card h-100">
              <a href="details/<?=$row->slug?>"><span class="badge badge-warning">BEST SELLER</span>
                <?php if($row->feature_image){?>
                  <img class="card-img-top" src="uploads/courses/images/<?=$row->feature_image?>" alt="">
                <?php }else{
                  ?>
                  <img class="card-img-top" src="https://udemy-images.udemy.com/course/240x135/1194906_f5e2_5.jpg" alt="">
                  <?php
                }?>
              </a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="details/<?=$row->slug?>"><?=$row->short_title?></a>
                </h4>
                <p class="card-text"><?=$row->long_title?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                <h5 class="color-black"><span class="line">$ <?=$row->course_price?></span> <span class="pull-right"><?=$row->course_descount_price?></span></h5>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>
