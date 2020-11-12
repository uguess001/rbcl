<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
			<?=isset($list->title)?$list->title:''?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">
                        <?php echo $this->lang->line('label_nav_home'); ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item"><a href="#">
                        <?php echo $this->lang->line('pages'); ?>
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
	<?=isset($list->title)?$list->title:''?>         </div>
				<div class="mt-30">
				<?=isset($list->description)?$list->description:'';?>
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
<!--  -->