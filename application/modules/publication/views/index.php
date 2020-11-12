<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">
  <div class="ti-content text-center">
    <div class="title-ti"><?php echo $this->lang->line('label_nav_publication'); ?></div>
    <div class="breadcrums">
      <ol class="list-unstyled list-inline">
        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
        <li class="list-inline-item breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('label_nav_publication'); ?></li>
      </ol>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="inner-page publication-list">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-9">
        <div class="page_title_"><?php echo $this->lang->line('label_nav_publication'); ?></div>
        <ul class="list-unstyled">
          <?php if(isset($list) &&!empty($list)) {
          foreach ($list as $value) :
          ?>
          <li>
            <div class="row">
              <div class="col-12">
                <div class="publication_date"><?php 
                $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                ?></div>
                <div class="publication-list-title">
                  <h3><a href="<?=base_url().'publication/'.$value->slug?>"> <?=$value->title?> </a> </h3>
                </div>
                <div class="publication-list-content">
                  <?=isset($value->description)?$value->description:''?>
                  <a target="_blank" href="<?=base_url().'uploads/publication/'.$value->file?>"><?=isset($value->file)?$value->file:''?></a>
                </div>
                <div class="button-area-readmore">
                  <a class="btn btn-primary hvr-bounce-to-right" href="<?=base_url().'publication/'.$value->slug?>"><?php echo $this->lang->line('dor_data_list_view'); ?> <i class="fa fa-angle-right"></i></a>
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
      <div class="col-12 col-lg-3">
        <div class="sidebar-area">
          <div class="list-s-insure">
            <div class="sidebar-title">
              NEWS
            </div>
            <div class="sidebar-content">
              <ul class="list-unstyled">
                <?php if(isset($news) && !empty($news)) :
                foreach ($news as $value) :
                ?>
                <li>
                  <a href="<?=base_url().'news/'.$value->slug?>">
                    <div class="title-area">
                      <?=$value->title?>
                    </div>
                    <div class="title-area">
                      <?=$value->pu?>
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
          <div class="list-s-insure">
            <div class="sidebar-title">
              Services
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