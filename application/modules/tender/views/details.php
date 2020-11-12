<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">

  <div class="ti-content text-center">

    <!--<div class="title-ti"> <?php echo $this->lang->line('label_nav_TENDER'); ?> </div>-->

    <div class="breadcrums">

      <ol class="list-unstyled list-inline">

        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>

        <li class="list-inline-item breadcrumb-item active" aria-current="page"><a href="<?=base_url().'tender'?>"><?php echo $this->lang->line('label_nav_TENDER'); ?></a></li>

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

			   <div class="news_date"><?php 
                $createdOn= date('Y-m-d', strtotime($list->CreatedOn));
                echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                ?></div>

                <div class="news-list-title">

                  <h3><a href="#"> <?=$list->title?></a></h3>

                </div>

				  <div class="news-list-content">

					  <?=isset($list->description)?$list->description:''?>
              <br>
					  <a target="_blank" href="<?=$list->file?>"><?php if (isset($list->file) && !empty($list->file)){?>
                   <span class="fa fa-file-pdf-o fa-3x"></span><?php } else{} ?>
                 </a>

				  </div>
          <div class="news_date"><strong>Expiry Date</strong>  <?=date('Y-m-d', strtotime($list->expirydate));?></div>

				  <div class="button-area-readmore" style="display:none;">

					  <a class="btn btn-primary hvr-bounce-to-right" href="#">Read More <i class="fa fa-angle-right"></i></a>

				  </div>

              </div>

            </div>



		  <br>

		  
      </div>

      <div class="col-12 col-lg-3" style="display:none">

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

						  <li><a href="<?=base_url().'services/'.$value->slug?>"><?=$value->title?></a></li>

						  <?php

						endforeach;

					endif;

						  ?>

						  

					  </ul>

				  </div>

			  </div>


          <div class="list-s-gallery">
            <div class="sidebar-title">
              See our  latest gallery
            </div>
            <div class="sidebar-content">

            <ul class="list-unstyled gallery-list-sidebar">

              <?php 
              if(isset($gallery) && !empty($gallery)):
                foreach ($gallery as $value) :
                  if($a<1):
              ?>
              <li style="width: 100%; overflow: hidden;">
                <a href="<?=base_url().'gallery/GetDetails/'.$this->Encryption->encode($value->id)?>"><img height="50px" src="<?=base_url().'uploads/gallery/'.$value->featured?>" alt="Gallery 1"></a>
              </li>

            <?php 
            $a++;
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