
<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
            <?=$albumname->title;?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
                    <li class="list-inline-item breadcrumb-item"><a href="<?=base_url().'gallery'?>"><?php echo $this->lang->line('label_gallery'); ?></a></li>
                    <li class="list-inline-item breadcrumb-item active" aria-current="page"><?=$albumname->title;?></li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="clearfix"></div>
<div class="content-section mt-30 mb-30">
<section class="inner-page">
    <div class="container-custom gallery-content">
	<div class="m-p-g">
			<div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
				   
			<?php if(isset($list) && !empty($list)) :

foreach ($list as $value) :

?>
				<img src="<?=base_url().'uploads/gallery/'.$value->image?>" data-full="<?=base_url().'uploads/gallery/'.$value->image?>" class="m-p-g__thumbs-img" />
				<?php 

endforeach;

endif;



?>	
			</div>

			<div class="m-p-g__fullscreen"></div>
		</div>



    </div>
  </div>
</section>
</div>


<div class="clearfix"></div>
<style>
    
	/* .gallery-content a {
    float: left;
    width: 100%;
    margin-bottom: 25px;
    height:200px;
    box-shadow: 0 0 11px -2px #605d5d;
    border-radius: 4px;
    overflow: hidden;
}
.gallery-content img {
    object-fit: cover;
    height: 100%;
	width:100%;
} */
</style>