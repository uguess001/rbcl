<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">

  <div class="ti-content text-center">

    <div class="title-ti"> Links </div>

    <div class="breadcrums">

      <ol class="list-unstyled list-inline">

        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>

        <li class="list-inline-item breadcrumb-item active" aria-current="page"><a href="<?=base_url().'reports'?>">Links</a></li>

        <li class="list-inline-item breadcrumb-item active" aria-current="page"><?=$list->title?></li>



      </ol>

    </div>

  </div>

</section>

<div class="clearfix"></div>

<section class="inner-page news-list">

  <div class="container">

    <div class="row">

      <div class="col-12 col-lg-9">

       



            <div class="row">

              <div class="col-12">

			   <div class="news_date"><?=date('Y-m-d', strtotime($list->CreatedOn));?></div>

                <div class="news-list-title">

                  <h3><a href="#"> <?=$list->title?></a></h3>

                </div>

				  <div class="news-list-content">

					  <?=isset($list->description)?$list->description:''?>

					   <a target="_blank" href="<?=base_url().'uploads/reports/'.$list->file?>"><?=isset($list->file)?$list->file:''?></a>

				  </div>

				  <div class="button-area-readmore" style="display:none;">

					  <a class="btn btn-primary hvr-bounce-to-right" href="#">Read More <i class="fa fa-angle-right"></i></a>

				  </div>

              </div>

            </div>



		  <br>

		  <div class="pageinate" style="display:none">

			  <div class="news-pagination">

				  <ul class="list-unstyled list-inline">

					  <li class="previous list-inline-item"><a href="#"><i class="fa fa-angle-double-left"></i> Previous</a></li>

					<li class="list-inline-item"><a href="#">1</a></li>

					<li class="list-inline-item"><a href="#">2</a></li>

					<li class="list-inline-item disabled"><a href="#" class="disabled">....</a></li>

					<li class="active list-inline-item"><a href="#">8</a></li>

					<li class="list-inline-item"><a href="#">9</a></li>

					<li class="next list-inline-item"><a href="#"> Next Page <i class="fa fa-angle-double-right"></i></a></li>

				</ul>

			  </div>

		  </div>

      </div>

      <div class="col-12 col-lg-3">

		  <div class="row sidebar-area">

			  <div class="list-s-insure">

				  <div class="sidebar-title">

					  Services

				  </div>

				  <div class="sidebar-content">

					  <ul class="list-unstyled">

					  	<?php if(isset($services) && !empty($services)) :

					  	foreach ($services as $value) :

					  	?>

						  <li><a href="<?=base_url().'services/GetDetails/'.$value->id?>"><?=$value->title?></a></li>

						  <?php

						endforeach;

					endif;

						  ?>

						  

					  </ul>

				  </div>

			  </div>

			  <div class="list-s-gallery">

				  <div class="sidebar-title">

					  See our gallery

				  </div>

				  <div class="sidebar-content">

					  <ul class="list-unstyled gallery-list-sidebar">

						  <li><a href="#"><img src="<?=RESOURCE_PATH;?>img/gallery/pinhole_kids_15-675x450.jpg" alt="Gallery 1"></a></li>

						  <li><a href="#"><img src="<?=RESOURCE_PATH;?>img/gallery/pinhole_kids_15-675x450.jpg" alt="Gallery 1"></a></li>

						  <li><a href="#"><img src="<?=RESOURCE_PATH;?>img/gallery/pinhole_kids_15-675x450.jpg" alt="Gallery 1"></a></li>

						  <li><a href="#"><img src="<?=RESOURCE_PATH;?>img/gallery/pinhole_kids_15-675x450.jpg" alt="Gallery 1"></a></li>

						  <li><a href="#"><img src="<?=RESOURCE_PATH;?>img/gallery/pinhole_kids_15-675x450.jpg" alt="Gallery 1"></a></li>

						  <li><a href="#"><img src="<?=RESOURCE_PATH;?>img/gallery/pinhole_kids_15-675x450.jpg" alt="Gallery 1"></a></li>

					  </ul>

				  </div>

			  </div>

		  </div>

	  </div>

    </div>

  </div>

</section>