<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">
  <div class="ti-content text-center">
    <!-- <div class="title-ti"><?php echo $this->lang->line('label_resources'); ?></div> -->
    <div class="breadcrums">
      <ol class="list-unstyled list-inline">
        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
        <!--        <li class="list-inline-item breadcrumb-item"><a href="#">Gallery</a></li>-->
        <li class="list-inline-item breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('label_resources'); ?></li>
      </ol>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="inner-page news-list">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-9">
         <div class="page-title-"><?php echo $this->lang->line('label_resources'); ?></div>
        <ul class="list-unstyled">
          <?php
          $counter = 0;
          if(isset($list) &&!empty($list)) {
          foreach ($list as $value) :
          $counter+=1;
          ?>
          <li>
            <div class="row">
              <div class="col-12">
                <div class="news_date"><?php 
                $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                ?></div>
                <div class="news-list-title">
                  <h3><a href="<?=base_url().'resources/'.$value->slug?>"> <?=$value->title?> </a> </h3>
                </div>
                <div class="news-list-content">
                  <?=isset($value->description)?$value->description:''?>
                </div>
                <div class="row">
                  <div class="col-1">
                    <a target="_blank" href="<?=$value->file?>"><?php if (isset($value->file) && !empty($value->file)){?>
                      <i class="fa fa-file-pdf-o fa-3x"></i><?php } else{} ?>
                    </a>
                  </div>
                  <div class="col-1">
                    <a target="_blank" data-toggle="modal" data-target="#exampleModal<?=$counter;?>" href="#">
                      <?php if (isset($value->image) && !empty($value->image)){?>
                      <i class="fa fa-file-image-o fa-3x"></i><?php } else{} ?>
                    </a>
                  </div>
                </div>
                <div class="button-area-readmore">
                  <a class="btn btn-primary hvr-bounce-to-right" href="<?=base_url().'resources/'.$value->slug?>"><?php echo $this->lang->line('dor_data_list_view'); ?> <i class="fa fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </li>
          <div class="modal fade" id="exampleModal<?=$counter;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <img src="<?=$value->image?> " alt="">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
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
      <div class="col-12 col-lg-3">
        <div class="row sidebar-area">
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
<!-- Modal -->