<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
            <?php 
                        echo "Payment Lists";             
                    ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="<?= base_url() ?>">
                        <?php echo $this->lang->line('label_nav_home') ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php 
                            echo "Payment Lists";            
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
        <div class="row mt-4">
             <?php 
            if(isset($list) &&!empty($list)) {
                    foreach ($list as $value) {
                    ?>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <?php if($value->image){ ?>
                        <img src="<?= $value->image ?>" alt="">
                        <?php } else{ ?>
                            <img src="<?= $value->image ?>" alt="">
                        <?php  } ?>
                        <h3><?=$value->title?></h3>
                        <span><?=$value->title?></span>
                    </div>
                    <a href="<?=$value->link?>">Visit</a>
                 </div>
            </div> 

            <?php } } ?>          
        </div>
    </div>
</div>