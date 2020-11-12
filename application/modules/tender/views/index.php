<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">
  <div class="ti-content text-center">
    <!-- <div class="title-ti"> <?php echo $this->lang->line('label_nav_TENDER'); ?> </div> -->
    <div class="breadcrums">
      <ol class="list-unstyled list-inline">
        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
        <li class="list-inline-item breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('label_nav_TENDER'); ?></li>
      </ol>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="inner-page news-list">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="page_title_"><?php echo $this->lang->line('label_nav_TENDER'); ?></div>
        <ul class="list-unstyled">
          <?php if(isset($list) &&!empty($list)) {
          foreach ($list as $value) :
          ?>
          <li>
            <div class="row">
              <div class="col-12">
                
                <div class="news-list-title">
                  <h3><a href="<?=base_url().'tender/'.$value->slug?>"> <?=$value->title?> </a> </h3>
                </div>
                <div class="news-list-content">
                  <div class="row">
                    <div class="col-1">
                      <a target="_blank" href="<?=$value->file?>"><?php if (isset($value->file) && !empty($value->file)){?>
                        <i class="fa fa-file-pdf-o fa-3x"></i><?php } else{} ?>
                      </a>
                    </div>
                    <div class="col-11">
                      <div class="news_date"><?php 
                      $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                      echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                      ?>&nbsp;<span class="expiredate"><?=date('Y-m-d', strtotime($value->expirydate));?></span></div>
                      <?=isset($value->description)?(word_limiter($value->description,30)):''?>
                    </div>
                  </div>
                </div>
                <div class="button-area-readmore">
                  <a class="btn btn-primary hvr-bounce-to-right" href="<?=base_url().'tender/'.$value->slug?>"><?php echo $this->lang->line('label_btn_more'); ?> <i class="fa fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </li>
          <?php
          endforeach;
          }else{
          echo ($lang=='np')?"<h4>कुनै रेकर्ड छैन !! </h4>":"<h4>No Record Found !!</h4>";
          }
          ?>
        </ul>
        <br>
        <?php echo $pages; ?>
      </div>
      <div class="col-12 col-lg-3" style="display: none;">
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