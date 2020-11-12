<div style="position: absolute; right: 30px; z-index: 999;top: 30px;">
  <?php
  /**
  * Show Flash Data
  */
  $_flash_msg = $this->session->flashdata('_flash_msg');
  //print_r($_flash_msg ); exit();
  if (!empty($_flash_msg)) {
  ?>
  <div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
    <a class="close" data-dismiss="alert">×</a>
    <?php echo $_flash_msg['_message']; ?>
  </div>
  <?php
  }
  ?>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    $slide=0;
    $counter = 0;
    $counter = 'active';
    if(isset($banner) && !empty($banner)) :
    foreach ($banner as $value) : ?>
    
    <li data-target="#carouselExampleIndicators" data-slide-to="<?=$slide++?>" class="<?=$counter++?>"></li>
    <?php
    endforeach;
    endif;
    ?>
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
  </ol>
  <div class="carousel-inner">
    
    <?php
    $counter = 0;
    $counter = 'active';
    foreach ($banner as $value) : ?>
    <div class="carousel-item <?=$counter++;?>"> 
    <img class="d-block w-100" src="<?=$value->image?>" alt="Slider Image for <?=isset($value->title)?$value->title:''?>">

      <?php if(!empty($value->description) && $value->description !=''){ ?>

      <div class="carousel-caption d-none d-md-block">
        <h3><?=isset($value->title)?$value->title:''?></h3>
        <div class="captio-body">
          <p><?=word_limiter($value->description,30)?> </p>
        </div>
      
        <div class="caption_footer">
          <div class="row">
            <!-- <div class="col">View All</div> -->
            <div class="col text-right">
              <ul class="list-unstyled list-inline">
                <li class="list-inline-item"> <a href="#carouselExampleIndicators" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a> </li>
                <li class="list-inline-item"> <a href="#carouselExampleIndicators" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    </div>
    <?php endforeach; ?>
  </div>
  <!--      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> -->
</div>
<div class="clearfix"></div>


<div class="row">
  
  <div class="col-12 col-lg-11">
        <!-- <div class="sliding-marquee">
          <ul >
              <?php if(isset($news_marquee) && !empty($news_marquee)):
              foreach ($news_marquee as $value):
              ?>
              <li ><a href="<?=base_url().'news/'.$value->slug?>"><span>
                <?php 
                      $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                      echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                      ?>
              </span> - <?=$value->title?></a></li>
              <?php endforeach;
              endif;
              ?>
          </ul>

        </div> -->

        <marquee behavior="scroll" direction="left" style="padding-top:10px"
           onmouseover="this.stop();"
           onmouseout="this.start();">  <?php if(isset($news_marquee) && !empty($news_marquee)):
              foreach ($news_marquee as $value):
              ?>
              <a href="<?=base_url().'news/'.$value->slug?>"><span>
                <?php 
                      $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                      echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                      ?>
              </span> - <?=$value->title?></a>&nbsp&nbsp&nbsp&nbsp&nbsp
              <?php endforeach;
              endif;
              ?></marquee>

  </div>
<div class="clearfix"></div>
  <div class="col-12 col-lg-1" style="padding-left: 40px; height: 44px;">
    <a href="<?=base_url().'news'?>" ><span style="font-size:14px; float: left;
    border-radius: 6px;
        padding-left: 5px;
    color: white;
    background: #E86D36;
    border: none;">
    
     <?php echo $this->lang->line('label_nav_LATEST_NOTICE');?></span>
    </a>
  </div>
  
</div>
 

<style>

  .m-section-quote {
    margin-top: 27px;
}
  .sliding-marquee {
   
    width: 100%;
    height: 44px;
    /*background-color: #000;*/
    opacity: 0.8;
    color: white;
    line-height: 44px;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
}


.sliding-marquee ul {
    left: 0;
    top: 0;
    position: absolute;
    animation: marquee 30s linear infinite;
}

.sliding-marquee ul li {
    display: inline-block;
    font-size: 15px;
    text-transform: uppercase;
}


.sliding-marquee ul li i {
    margin-right: 20px;
}

.sliding-marquee ul li + li {
    margin-left: 40px;
}


.sliding-marquee ul li:hover {
 animation-play-state: paused;
 }

@keyframes marquee {
    0%   { left: 0% }
    100% { left: -100% }
}
</style>




<!-- <section class="ct_news">
  <div class="container news-ticker-area">
    <div class="breakingNews" id="bn7">
      <div class="bn-title"><h2><?php echo $this->lang->line('label_nav_LATEST_NOTICE');?></h2><span></span></div>
      <ul>
        <?php if(isset($news_marquee) && !empty($news_marquee)):
        foreach ($news_marquee as $value):
        ?>
        <li><a href="<?=base_url().'news/'.$value->slug?>"><span>
          <?php 
                $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                ?>
        </span> - <?=$value->title?></a></li>
        <?php endforeach;
        endif;
        ?>
      </ul>
      <div class="bn-navi">
        <span></span>
        <span></span>
      </div>
      
    </div>
  </div>
</section> -->
