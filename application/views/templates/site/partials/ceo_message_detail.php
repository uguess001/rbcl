<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
            <?=$lang=='en'? $list->name_en : $list->name_np ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="https://rbcl.gov.np/test">
                        <?php echo $this->lang->line('label_nav_home'); ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active">
                    <?= $list->title ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>

<div class="content-section mt-15">
    <div class="container-custom">

        <div class="row">
            <div class="col-lg-3">
                <div class="st-img">
                    <img src="<?=$list->image ?>" alt="<?=$list->title ?>">
                </div>
                <div class="font-weight-bold">
                    <?=$list->name ?>
                </div>
                <small>
                    <?=$list->position ?>
                </small>
            </div>
            <div class="col-lg-9">
                <div class="st-details">
                    <div class="st-info mb-30">
                        <div class="st-title txt-upp fnt-bld"><?= $list->title ?></div>
                        
                        
                        <!-- <div class="st-postion"><?=$lang=='en'? $list->post_en : $list->post_np ?></div> -->
                        <!-- <div class="st-email"><?=$list->email ?></div> -->
                    </div>
                    <?php if(!empty($list->description) ){?>
                    <div class="st-desc border-top pt15">
                        <?= $list->description ?>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>