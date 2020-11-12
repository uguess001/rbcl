<section class="top_innerpage">
    <div class="container">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
                <?php echo $this->lang->line('innder_content_news'); ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php echo $this->lang->line('innder_content_news'); ?>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="content-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="mt-30 new-listng row">

                    <?php if(isset($list) &&!empty($list)) :
						foreach ($list as $value) :
						?>
                    <div class="col-lg-6">
                        <article class="mb-30">
                            <a href="<?=base_url().'news/'.$value->slug?>">
                                <?php if($value->image){ ?>
                                <div class="img-area">
                                    <img src="<?=$value->image?>">
                                </div>
                                <?php }else{  ?>
                                <div class="img-area">
                                    <img src="<?=base_url()?>application/resources/site/aviation.jpg">
                                </div>
                                <?php } ?>
                                <div class="art-content">
                                    <div class="news-list-title">
                                        <h3 class="fnt-bld"> <?=$value->title?>
                                        </h3>
                                    </div>
                                    <!--<div class="news_date"><?=date('d F, Y', strtotime($value->CreatedOn));?></div>-->
                                    
                                    <div class="news_date">
                                        <?php 
                                            $createdOn= date('Y-m-d', strtotime($value->CreatedOn)); 
                                            echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn; 
                                        ?>
                                    </div>
                                    
                                    
                                    <div class="news-list-content" style="display: none;">
                                        <?=isset($value->description)?(word_limiter($value->description,50)):''?>
                                    </div>

                                    <div class="button-area-readmore" style="display: none;">
                                        <a class="btn btn-primary hvr-bounce-to-right"
                                            href="<?=base_url().'news/'.$value->slug?>"><?php echo $this->lang->line('label_btn_more'); ?>
                                            <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                    <?php
						endforeach;
						endif;
						?>


                </div>
                <div class="clearfix"></div>
                <div class="page-s">
                    <?php echo $pages;?>
                </div>
            </div>
            <div class="col-lg-3 d-none">
                <div class="list-s-insure">
                    <div class="sidebar-title">
                        <?php echo $this->lang->line('innder_content_news'); ?>
                    </div>
                    <div class="sidebar-content">
                        <ul class="list-unstyled">
                            <?php if(isset($news) && !empty($news)) :
			foreach ($news as $value) :
			?>
                            <li>
                                <a href="<?=base_url().'news/'.$value->slug?>">
                                    <div class="title-area" style="padding-left: 10px;">
                                        <?=$value->title?>
                                    </div>
                                    <div class="title-area">
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