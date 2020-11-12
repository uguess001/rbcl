<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
                <?=$list->title?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="<?= base_url() ?> ">
                        <?php echo $this->lang->line('label_nav_home') ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item"><a href="#">
                        <?php echo $this->lang->line('label_nav_WEENSURE'); ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <a href="#"><?=$list->title?></a>
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
				<div class="mt-30">
                    <?php if(isset($list->image)){
                        ?>

				<div class="news-list-content">
                    <img src="<?= $list->image ?>" height="auto">
                </div>

                      <?php  
                    }?>
                <div class="news-list-content">
                    <?= $list->description; ?>
                </div>
				</div>
                
            </div>


            <div class="col-lg-3">
                <div class="list-s-insure">
                    <div class="sidebar-title">
                        <?php echo $this->lang->line('label_nav_WEENSURE'); ?>
                    </div>
                    <div class="sidebar-content">
                        <ul class="list-unstyled">
                            <?php if(isset($reinsure) && !empty($reinsure)) :
                                    foreach ($reinsure as $value) :
                                    ?>
                            <li class="ser-item <?=($this->uri->segment(2)==$value->slug)?'active':''?>">
                                <a href="<?=base_url().'re-insure/'.$value->slug?>">
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
