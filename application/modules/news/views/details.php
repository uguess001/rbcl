<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
                <?=isset($list->title)?$list->title:''?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">
                        <?php echo $this->lang->line('label_nav_home') ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item"><a href="<?=base_url()?>news">
                        <?php echo $this->lang->line('innder_content_news') ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active" aria-current="page">
                        <?=isset($list->title)?$list->title:''?>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="content-section">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-9">
                
                <div class="section-header mt-30  mb-30 fnt-a2 section-base-color fnt-bld">
	                        <?=isset($list->title)?$list->title:''?>
	           </div>
	           <div class="clearfix"></div>
	           
                <div class="mt-30 mb-30">
                <?php if(isset($list->image) && !empty($list->image)){ ?>
                    <div class="img-area">
                    <img src="<?=$list->image?>">
                    </div>
                       
                    <?php } else{} ?>
                    <div class="content-desc">
	                   
                        <div class="conent-main-">
                        <?=isset($list->description)?$list->description:''?>
                        </div>
                        <?php if(isset($list->file) && !empty($list->file)){ ?>
                        <div class="has-file">
                        <a href="<?php echo $list->file; ?>" class="btn btn-primary" download><i
                                class="fa fa-file-pdf-o"></i> Download</a>
                        <div class="mt-15">
                            <object data="<?php echo $list->file; ?>" type="application/pdf" width="100%"
                                height="600px">
                                <p>Alternative text - include a link <a href="<?php echo $list->file; ?>">to the
                                        PDF!</a></p>
                            </object>
                        </div>
                        </div>
                        <?php } else{} ?>
                    </div>
                    
                   
                </div>
            </div>
            <div class="col-lg-3">
                <div class="list-s-insure">
                    <div class="sidebar-title">
                        <?php echo $this->lang->line('label_nav_SERVICES'); ?>
                    </div>
                    <div class="sidebar-content">
                        <ul class="list-unstyled">
                            <?php if(isset($services) && !empty($services)) :
								  foreach ($services as $value) :
								  ?>
                            <li class="ser-item <?=($this->uri->segment(2)==$value->slug)?'active':''?>">
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
            </div>
        </div>
    </div>
</div>

<style>

.img-area {
  float: left;
  width: 100%;
  margin-bottom:20px;
}
</style>