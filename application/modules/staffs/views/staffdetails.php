<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
            <?=$lang=='en'? $list->name_en : $list->name_np ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">
                        <?php echo $this->lang->line('label_nav_home'); ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item"><a href="#">
                        <?php echo $this->lang->line('all_staffs'); ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active">
                    <?=$lang=='en'? $list->name_en : $list->name_np ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>

<div class="content-section mt-15">
    <div class="container-custom">
<div class="section-header mt-30  mb-30 fnt-a2 section-base-color fnt-bld">
	<?=$lang=='en'? $list->name_en : $list->name_np ?>         </div>
	<div class="clearfix"></div> 
        <div class="row">
            <div class="col-lg-3">
                <div class="st-img">
                    <img src="<?=$list->image ?>" alt="<?=$lang=='en'? $list->name_en : $list->name_np ?>">
                </div>
            </div>
            <div class="col-lg-9">
                <div class="st-details">
                    <div class="st-info mb-30">
                        <div class="st-title txt-upp fnt-bld"><?=$lang=='en'? $list->name_en : $list->name_np ?></div>
                        <div class="st-postion"><?=$lang=='en'? $list->post_en : $list->post_np ?></div>
                        <div class="st-email"><?=$list->email ?></div>
                    </div>
                    <?php if(!empty($list->description_en) || !empty($list->description_np)){?>
                    <div class="st-desc border-top pt15">
                        <?=$lang=='en'? $list->description_en : $list->description_np ?>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>