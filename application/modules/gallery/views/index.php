
<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
            <?php echo $this->lang->line('label_gallery'); ?> 
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
                    <li class="list-inline-item breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('label_gallery'); ?></li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="clearfix"></div>
<div class="content-section mt-30 mb-30">
<section class="inner-page">
    <div class="container-custom p-content">
      <div class="row">
        <?php  if(isset($list) && !empty($list)) :   
          foreach ($list as $value) : ?>

        <div class="col-12 col-lg-4"> <a href="<?=base_url().'gallery/GetDetails/'.$this->Encryption->encode($value->id)?>">
          <div class="rbcl-gallery-image-holder"> <img src="<?=$value->image;?>" alt=""> <span class="img-count"> Contain <?php echo ($value->total>0)?$value->total:'No'; ?> Images</span> </div>
          <div class="rbcl-gallery-info">
            <div class="gallery-info-title"> <?=$value->title;?>  </div>
          </div>
          </a>
      </div>
      <?php
         endforeach;
        endif;
      ?>

      </div>
    </div>
  </div>
</section>
</div>
<style>

.rbcl-gallery-image-holder {
  position: relative;
}
.img-count {
  position: absolute;
  top: 10px;
  right: 8px;
  font-size: 13px;
  background: #ff7841;
  color: white;
  padding: 4px 10px;
  border-radius: 3px;
}
.rbcl-gallery-info {
  padding: 10px;
  background: #1757b8;
  color: white;
  position: absolute;
  bottom: 0px;
  width: 100%;
}
.p-content a {
  float: left;
  width: 100%;
  height: 300px;
  overflow: hidden;
  position: relative;
  margin-bottom: 25px;
}
.rbcl-gallery-image-holder {
  overflow: hidden;
  height: 300px;
}
.p-content a img {
  object-fit: cover;
  height: 100%;
}
.gallery-info-title {
    font-size: 13px;
    font-weight: bold;
    line-height: 1.3;
}
</style>