<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">
	<div class="ti-content text-center">
		<!-- <div class="title-ti"> <?php echo $this->lang->line('label_testimonials'); ?> </div> -->
		<div class="breadcrums">
			<ol class="list-unstyled list-inline">
				<li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
				<li class="list-inline-item breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('label_testimonials'); ?></li>
			</ol>
		</div>
	</div>
</section>
<div class="clearfix"></div>
<section class="inner-page testimonial">
	<div class="container">
	<div class="row">
		<div class="col-12 col-lg-9">
			<div class="row testimonials no-gutter">
					
					<?php $count=0;
					if(isset($list) &&!empty($list)) :
					foreach ($list as $value) :
					$count++;
					?>
					
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="box-test">
							<div class="active item">
								<div class="carousel-info">
									<img alt="" src="<?=base_url().'uploads/testimonials/'.$value->image?>" class="pull-left">
									
								</div>
								<blockquote>
									<div class="pull-left">
										<span class="testimonials-name"><?=$value->name?></span>
									</div>
									<div class="clearfix"></div>
									<p>
									<?=isset($value->description)?(word_limiter($value->description,50)):''?>
								</p>
								
								</blockquote>
								
								
							</div>
						</div>
					</div>
					<?php
					endforeach;
					endif;
					?>
					
				</div>
		</div>
		<div class="col-12 col-lg-3">
			<div class="sidebar-area">
          <div class="list-s-insure">
            <div class="sidebar-title">
              <?php echo $this->lang->line('label_nav_SERVICES'); ?>
            </div>
            <div class="sidebar-content">
              <ul class="list-unstyled">
                <?php if(isset($services) && !empty($services)) :
                foreach ($services as $value) :
                ?>
                <li class="nav-item <?=($this->uri->segment(2)==$value->slug)?'active':''?>">
                  <a href="<?=base_url().'services/'.$value->slug?>">
                    <div class="icon_area">
                      <span class="<?=$value->icon?>"></span>
                    </div>
                    <div class="title-area">
                      <?=$value->title?>
                    </div>
                  </a>
                </li>
                <?php
                endforeach;
                endif;
                ?>
                
              </ul>
            </div>
          </div>
          <div class="list-s-gallery">
            <div class="sidebar-title">
              <?php echo $this->lang->line('latest_gallery'); ?>
            </div>
            <div class="sidebar-content">
              <ul class="list-unstyled gallery-list-sidebar">
                <?php
                $a=0;
                if(isset($gallery) && !empty($gallery)):
                foreach ($gallery as $value) :
                if($a<1):
                ?>
                <li style="width: 100%; overflow: hidden;"><a href="<?=base_url().'gallery/GetDetails/'.$this->Encryption->encode($value->id)?>"><img src="<?=$value->image?>" alt="Gallery 1"></a></li>
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