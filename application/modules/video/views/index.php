<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH?>img/slide1.jpg);background-position: 70% 0;">
  <div class="ti-content text-center">
    <div class="title-ti"> <a href="<?=base_url().'video'?>"><?php echo $this->lang->line('label_nav_VIDEO'); ?> </div>
    <div class="breadcrums">
      <ol class="list-unstyled list-inline">
        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
        <li class="list-inline-item breadcrumb-item active" aria-current="page"><a href="<?=base_url().'video'?>"><?php echo $this->lang->line('label_nav_VIDEO'); ?></a></li>
      </ol>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="inner-page gallery">
  <div class="container">
    <div class="col-12 col-lg-12">
    <div class="page_title_"><?php echo $this->lang->line('label_nav_VIDEO'); ?></div>
    <div class="row thumbs">
    <?php if(isset($video) && !empty($video)){
    foreach ($video as $value) :
     ?>
        <div class="col-md-4 col-sm-4 col-xs-6">
         
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?=$value->url?>" frameborder="0" allowfullscreen></iframe>
          <br>
          <?=$value->title?>
          
      </div>
     <?php
     endforeach;
     } else{
      echo ($lang=='np')?"<h4>कुनै रेकर्ड छैन !! </h4>":"<h4>No Record Found !!</h4>";
     }
     ?>
    </div>
  </div>
</div>
</section>