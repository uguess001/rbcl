<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">

  <div class="ti-content text-center">
    <div class="title-ti"><?php echo $this->lang->line('innder_content_achievements'); ?></div>
    <div class="breadcrums">
      <ol class="list-unstyled list-inline">
        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
        <li class="list-inline-item breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('innder_content_achievements'); ?></li>
      </ol>
    </div>
  </div>

</section>

<div class="clearfix"></div>

<section class="inner-page achievements-list">

  <div class="container">

    <div class="row">

      <div class="col-12 col-lg-9">

        <ul class="list-unstyled">

        	<?php if(isset($list) &&!empty($list)) : 

        	foreach ($list as $value) :

        		?>

          <li>

            <div class="row">

              <div class="col-12">

			   <div class="achievements_date"><?=date('Y-m-d', strtotime($value->CreatedOn));?></div>

                <div class="achievements-list-title">

                  <h3><a href="<?=base_url().'achievements/GetDetails/'.$this->Encryption->encode($value->id)?>"> <?=$value->title?> </a> </h3>

                </div>

				  <div class="achievements-list-content">

					  <?=isset($value->description)?$value->description:''?>

					  <a target="_blank" href="<?=base_url().'uploads/achievements/'.$value->file?>"><?=isset($value->file)?$value->file:''?></a>

				  </div>

				  <div class="button-area-readmore">

					  <a class="btn btn-primary hvr-bounce-to-right" href="<?=base_url().'achievements/GetDetails/'.$this->Encryption->encode($value->id)?>"><?php echo $this->lang->line('dor_data_list_view'); ?> <i class="fa fa-angle-right"></i></a>

				  </div>

              </div>

            </div>

          </li>

          <?php 

      endforeach;

  endif;

          ?>



        </ul>

		  <br>
<?php echo $pages; ?>
		  <div class="pageinate" style="display:none">

			  <div class="achievements-pagination">

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

						  <li><a href="<?=base_url().'services/GetDetails/'.$this->Encryption->encode($value->id)?>"><?=$value->title?></a></li>

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

              <?php 
              if(isset($gallery) && !empty($gallery)):
                foreach ($gallery as $value) :
                  if($a<=6):
              ?>
              <li style="width: 48%;height: 50px; overflow: hidden;"><a href="<?=base_url().'gallery/GetDetails/'.$this->Encryption->encode($value->id)?>"><img src="<?=base_url().'uploads/gallery/'.$value->featured?>" alt="Gallery 1"></a></li>

            <?php 
                endif;
              endforeach;
            endif;

            ?>

            </ul>

          </div>
          </div>




		  </div>

	  </div>

    </div>

  </div>

</section>