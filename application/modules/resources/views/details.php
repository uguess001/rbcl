<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">
  <div class="ti-content text-center">
    <!-- <div class="title-ti"><?php echo $this->lang->line('label_resources'); ?></div> -->
    <div class="breadcrums">
      <ol class="list-unstyled list-inline">
        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
        <li class="list-inline-item breadcrumb-item active" aria-current="page"><a href="<?=base_url().'resources'?>"><?php echo $this->lang->line('label_resources'); ?></a></li>
        <li class="list-inline-item breadcrumb-item active" aria-current="page"><?=$list->title?></li>
      </ol>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="inner-page resources-list">
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
            </div>
            <div class="row">
              <div class="col-1">
                <a target="_blank" href="<?=$list->file?>"><?php if (isset($list->file) && !empty($list->file)){?>
                  <i class="fa fa-file-pdf-o fa-3x"></i><?php } else{} ?>
                </a>
              </div>
              <div class="col-1">
                <a target="_blank" data-toggle="modal" data-target="#exampleModal" href="#">
                  <?php if (isset($list->image) && !empty($list->image)){?>
                  <i class="fa fa-file-image-o fa-3x"></i><?php } else{} ?>
                </a>
              </div>
            </div>
          </div>
        </div>
        <br>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="<?=$list->image?> " alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>