<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">

  <div class="ti-content text-center">

    <!-- <div class="title-ti"><?php echo $this->lang->line('right_sidebar_download'); ?> </div> -->

    <div class="breadcrums">

      <ol class="list-unstyled list-inline">

        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>

        <li class="list-inline-item breadcrumb-item active" aria-current="page"><a href="<?=base_url().'downloads'?>"><?php echo $this->lang->line('right_sidebar_download'); ?></a></li>

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

					  <a target="_blank" href="<?=$list->file?>"><?=isset($list->file)?$list->file:''?></a>

				  </div>

				  <div class="button-area-readmore" style="display:none;">

					  <a class="btn btn-primary hvr-bounce-to-right" href="#">Read More <i class="fa fa-angle-right"></i></a>

				  </div>

              </div>

            </div>



		  <br>

      </div>

      <div class="col-12 col-lg-3">

		  <div class="row sidebar-area">

			  <div class="list-s-insure">

				  <div class="sidebar-title">

					  <?php
					  if($this->uri->segment(2)=='GetDocumentsDetails'){
					  	echo $this->lang->line('label_nav_documents');
					  }
					  elseif ($this->uri->segment(2)=='GetCircularsDetails') {
					  	echo $this->lang->line('label_nav_circulars');
					  }
					  elseif ($this->uri->segment(2)=='GetBulletinsDetails') {
					  	echo $this->lang->line('label_nav_bulletine');
					  }
					  else{
					  	
					  }
					  ?>

				  </div>

				  <div class="sidebar-content">
				  	<?php  if($this->uri->segment(2)=='GetDocumentsDetails') :?>
					  <ul class="list-unstyled">

					  	<?php if(isset($documents) && !empty($documents)) :

					  	foreach ($documents as $value) :

					  	?>

						  <li class="nav-item <?=($this->uri->segment(3)==$this->Encryption->encode($value->id))?'active':''?>"><a href="<?=base_url().'downloads/GetDocumentsDetails/'.$this->Encryption->encode($value->id)?>"><?=$value->title?></a></li>

						  <?php

						endforeach;

					endif;

						  ?>

						  

					  </ul>
					  <?php endif; ?>
					  <?php  if($this->uri->segment(2)=='GetCircularsDetails') :?>
					  <ul class="list-unstyled">

					  	<?php if(isset($circulars) && !empty($circulars)) :

					  	foreach ($circulars as $value) :

					  	?>

						  <li class="nav-item <?=($this->uri->segment(3)==$this->Encryption->encode($value->id))?'active':''?>"><a href="<?=base_url().'downloads/GetCircularsDetails/'.$this->Encryption->encode($value->id)?>"><?=$value->title?></a></li>

						  <?php

						endforeach;

					endif;

						  ?>

						  

					  </ul>
					  <?php endif; ?>
					  <?php  if($this->uri->segment(2)=='GetBulletinsDetails') :?>
					  <ul class="list-unstyled">

					  	<?php if(isset($bulletins) && !empty($bulletins)) :

					  	foreach ($bulletins as $value) :

					  	?>

						  <li class="nav-item <?=($this->uri->segment(3)==$this->Encryption->encode($value->id))?'active':''?>"><a href="<?=base_url().'downloads/GetBulletinsDetails/'.$this->Encryption->encode($value->id)?>"><?=$value->title?></a></li>

						  <?php

						endforeach;

					endif;

						  ?>

						  

					  </ul>
					  <?php endif; ?>
				  </div>

			  </div>

		  </div>

	  </div>

    </div>

  </div>

</section>