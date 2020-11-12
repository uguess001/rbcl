<!-- <?php 
    echo "<pre>";
    print_r($list);
    
?> -->
<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
           
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="<?php echo base_url(); ?>">
                        <?php echo $this->lang->line('label_nav_home');?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php 
                            if($this->uri->segment(3) == 'news') { 
                                echo $this->lang->line('innder_content_news');
                             }else{
                                echo $this->lang->line('label_nav_LATEST_NOTICE');
                             } ?>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="content-section listing-page-forall">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-3">
                <div class="mt-30">
                    <ul class="list-unstyled menu-list-sa">
                        
                            <li>
                                <a href="<?=base_url('/news')?>" class="<?php if($this->uri->segment(1) == 'news') { ?> active <?php } ?>">

                                     <?php echo $this->lang->line('innder_content_news'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('/latest-notice')?>" class="<?php if($this->uri->segment(1) == 'latest-notice') { ?> active <?php } ?>">

                                     <?php echo $this->lang->line('label_nav_LATEST_NOTICE'); ?>
                                </a>
                            </li>
                             
                    </ul>
                </div>

            </div>

            <!-- New section of notice and news starts from here -->

             <div class="col-lg-9">
                <div class="mt-30 new-listng row">

                    <?php if(isset($list) &&!empty($list)) :
                        foreach ($list as $value) :
                        ?>
                    <div class="col-lg-6">
                        <article class="mb-30">
                            <a href="<?=base_url().'latest-notice/'.$value->slug?>">
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
                                    <div class="news_date"><?=date('d F, Y', strtotime($value->CreatedOn));?></div>
                                    <div class="news-list-content" style="display: none;">
                                        <?=isset($value->description)?(word_limiter($value->description,50)):''?>
                                    </div>

                                    <div class="button-area-readmore" style="display: none;">
                                        <a class="btn btn-primary hvr-bounce-to-right"
                                            href="<?=base_url().'latest-notice/'.$value->slug?>"><?php echo $this->lang->line('label_btn_more'); ?>
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

              <!-- New section of notice and news ends here -->


            <!-- Old section of notice and news starts from here -->
            <div class="col-lg-9 d-none">
                <div class="section-header mt-30  mb-15 section-base-color">
                    <?php 
                            if($this->uri->segment(3) == 'news') { 
                                echo $this->lang->line('innder_content_news');
                             }else{
                                echo $this->lang->line('label_nav_LATEST_NOTICE');
                             } ?>
                </div>
                <div class="clearfix"></div>

                <table class="table">

                    <tbody>
                        <?php if(isset($list) &&!empty($list)) {
                                foreach ($list as $value) :
                                ?>
                        <tr>
                            <td> <a href="<?=$value->file?>" target="_blank"> <?=$value->title?> </a> <span
                                    class="date-">
                                    <?php
                                        $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                                        echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                                    ?>
                                </span></td>

                            <td style="width:150px;">
                            <?php if(!empty($value->file)){?>
                            <a href="<?=$value->file?>" target="_blank" class="cs-btn"
                                    download>
                                    <i class="fa fa-download"></i> Download
                                </a>
                            <?php }?>
                            </td>
                        </tr>
                        <?php endforeach;
            }else{
            echo "<tr><td>No Record Found !!</td></tr>";
            }
            ?>
                    </tbody>
                </table>
            </div>          
        </div>
    </div>
</div>