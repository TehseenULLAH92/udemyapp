<div class="title-background">
  <div class="container">
    <div class="py-5 mt-4">
      <h3><?=$row->short_title?></h3>
      <h5><?=$row->long_title?></h5>
      <h5><span class="badge badge-warning">BEST SELLER</span><small class="text-muted ml-10">&#9733; &#9733; &#9733; &#9733; &#9734;</small></h5>
      <h5>Category : <strong><?=$this->Admin_model->get_category_by_name("categories",$row->categories_id)->categories_name?></strong> | Sub Category : <strong><?=$this->Admin_model->get_category_by_name("sub_categories",$row->sub_categories_id)->sub_cat_name?></strong> </h5>
      <h5></h5>
    </div>

  </div>

</div>
<div class="container">
  <div class="row">
    <div class="col-lg-8 mt-4">
      <p class="lead content"><?=$row->long_description?></p>
    </div>

    <div class="col-md-4">
      <div class="mt-4">
        <div class="card h-100">

          <div class="card-body">
            <iframe class="full-width" src="https://www.youtube.com/embed/<?=$row->feature_video?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
      <div class="card-footer">
        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        <h5 class="color-black"><span class="line">$ <?=$row->course_price?></span> <span class="pull-right"><?=$row->course_descount_price?></span></h5>
        <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>site/create_payment_with_paypal">
            <fieldset>
                <input title="item_name" name="item_name" type="hidden" value="<?=$row->short_title?>">
                <input title="item_number" name="item_number" type="hidden" value="<?=$row->course_id?>">
                <input title="item_description" name="item_description" type="hidden" value="<?=$row->long_title?>">
                <input title="item_tax" name="item_tax" type="hidden" value="0">
                <input title="item_price" name="item_price" type="hidden" value="<?=round($row->course_descount_price)?>">
                <input title="details_tax" name="details_tax" type="hidden" value="1">
                <input title="details_subtotal" name="details_subtotal" type="hidden" value="<?=round($row->course_descount_price)?>">

                <div class="form-group">
                    <div class="col-sm-offset-5">
                        <button  type="submit"  class="btn btn-danger btn-block">Buy Now</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <a href="#" class="btn btn-primary btn-block">Add To Cart</a>
      </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->

</div>
