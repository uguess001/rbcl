<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
                <?php 
                        echo "Payment Methods";             
                    ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="<?= base_url() ?>">
                            <?php echo $this->lang->line('label_nav_home') ?>
                        </a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php 
                            echo "Payment Methods";            
                        ?>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="content-section listing-page-forall">
    <div class="container-custom">
    <div class="section-header mt-30  mb-30 fnt-a2 section-base-color fnt-bld">
    <?php 
                            echo "Payment Methods";            
                        ?>
                                       </div>
                                       <div class="clearfix"></div>
        <div class="row mt-4">
            <?php 
            if(isset($list) &&!empty($list)) {
                    foreach ($list as $value) {
                    ?>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                <div class="card text-center mb-4">
                    <div class="card-body">
                    <a href="<?=$value->link?>">
                        <?php if($value->image){ ?>
                        <img src="<?= $value->image ?>" alt="">
                        <?php } else{ ?>
                        <img src="<?= $value->image ?>" alt="">
                        <?php  } ?>
                        </a>
                    </div>
                  
                </div>
            </div>

            <?php } } ?>
        </div>
    </div>
</div>