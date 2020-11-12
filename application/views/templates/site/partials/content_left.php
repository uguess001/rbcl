<div class="content-section pt15  mt-15">
        <div class="container-custom">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-header  mb-30 section-secon-color">
                        <?php echo ($lang=='np')?'हाम्रो बारेमा ':'About Rastriya Beema';?>
                    </div>
                    <div
                        class="custom-text-section fnt-bld fnt-2 fnt-lhs fnt-l-s txt-upp mb-15 <?php echo ($lang=='np')?'langnp':'';?> ">
                        <?php echo $about_us->title;?>
                    </div>
                    <div class="section-content-section text-justify">

                        <?=isset($about_us)?(word_limiter($about_us->description,60,'...')):''?>
                    </div>
                    <div class="section-footer-section">
                        <div class="s-width">
                            <a href="<?=base_url().'pages/proud-of-53-years-excellence'?>" class="v-bts vts-block">
                                <?php echo $this->lang->line('view_all') ?>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="mb-30">
                <div class="section-header  mb-30 section-secon-color">
                                <?php echo $this->lang->line('summary'); ?>
                            </div>
                <div id="chart">
                                    
                                    </div>
                                    <div class="clearfix"></div> 
                                    <div clas="mt-15"></div>
                </div></div>
                <div class="col-lg-8 d-none">
                    <div class="row">
                        <div class="col-lg-3">
                           
                            <div class="show-char-list d-none">
                                <ul class="list-unstyled">
                                    <li><a href="javascript:viod(0)" class="s-btn s-active s-btn-block fnt-bld active"
                                            data-tag="mon-s">
                                            <?php echo $this->lang->line('portfolio_wise');?>
                                        </a></li>
                                    <!-- <li><a href="javascript:viod(0)" class="s-btn s-btn-block fnt-bld" >
                                        <?php echo $this->lang->line('service_wise');?>
                                    </a>
                                </li> -->
                                    <li><a href="javascript:viod(0)" class="s-btn s-btn-block fnt-bld" data-tag="mon-d">
                                            <?php echo $this->lang->line('branch_wise');?>
                                        </a></li>

                                </ul>
                                <div class="p-cal brdr-top mt-30 pt15">

                                    <ul class="list-unstyled">
                                        <li><a href="<?=base_url().'pcalculator' ?>"
                                                class="s-btn s-btn-block fnt-bld"><i class="fa fa-calculator"></i>
                                                Premium calculator</a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="chart-area-s">


                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="content-section pt15 pb30 mt-15  bg-gray-light">
            <div class="container-custom">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="new-section mt-15">
                            <div class="news-header">
                                <?php echo $this->lang->line('label_nav_LATEST_NEWS');?>
                            </div>
                            <div class="news-content">
                                <div class="demo">
                                    <ul>
                                        <?php if(!empty($news)) {
                        foreach ($news as $value){ 

                            ?>
                                        <li class="news-item">
                                            <a href="<?=base_url().'news/'.$value->slug?>">
                                                <div
                                                    class="news-img <?= $_SESSION['lowbandwidth'] == 'low' ? 'low-bandwidth-type' : '' ?>">

                                                    <?php if(isset($_SESSION['lowbandwidth']) && $_SESSION['lowbandwidth'] == 'low'){   }else{ 
                                             
                                            if(isset($value->image) && $value->image !=''){ ?>


                                                    <img src="<?=$value->image?>" alt="<?=$value->title;?>">

                                                    <?php }else{ ?>

                                                    <img src="http://rbcl.com.np/application/resources/admin/assets/source/fire%20(1).jpg"
                                                        class="new-image-view">

                                                    <?php } } ?>
                                                </div>
                                                <div class="list-news-cont">

                                                    <span class="ls-date">
                                                        <?php 
                                                    $createdOn= date('Y-m-d', strtotime($value->CreatedOn)); 
                                                    echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn; 
                                                ?>
                                                    </span>
                                                    <p><?=$value->title;?></p>

                                                </div>
                                            </a>
                                        </li>

                                        <?php } }?>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-footer">
                                <div class="d-view">
                                    <a href="<?=base_url().'news'?>" class="v-bts">
                                        <?php echo $this->lang->line('more_update');  ?>
                                    </a>
                                </div>
                                <div class="nes-btns">
                                    <a href="#" class="sld-bts btnUp-slide"><i class="fa fa-angle-up"></i></a>
                                    <a href="#" class="sld-bts btnDwn-slide"><i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="mt-45  mb-30">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="section-header pt30 mb-30  mt-70 section-secon-color">
                                    <?php echo $this->lang->line('portfolio') ?>
                                </div>
                                <div class="section-content-section sev-infromation">

                                    <?php
                            foreach ($services as $key => $value) {  
                                $content=$value->description;
                                $content = preg_replace("/<img[^>]+\>/i", " ", $content); 

                               
                                ?>

                                    <div class="serives-info <?=$value->slug?> <?=$key==0?'active':''?>">
                                        <div class="sev-title mb-30 fnt-bld"><?=$value->title?></div>
                                        <div class="ser-content mb-30 text-justify">
                                            <?=strip_tags(word_limiter($content,30))?>


                                            <a href="<?=base_url().'services/'.$value->slug?>" class="re-mre-link">
                                                <?php echo $this->lang->line('view_all') ?>
                                            </a>
                                        </div>
                                    </div>

                                    <?php }  ?>



                                    <div class="ser-list mt-15">
                                        <div class="slider-navigation-slick">
                                            <div class="s-arrow-section left-arrow prev-pro">
                                                <i class="fa fa-angle-left"></i>
                                            </div>
                                            <div class="s-arrow-section right-arrow next-pro">
                                                <i class="fa fa-angle-right"></i>
                                            </div>
                                        </div>
                                        <div class="s-list-s">
                                            <?php
                                    foreach ($services as $key => $value) {
                                        
                                      ?>
                                            <div>
                                                <a href="javascript:void(0)" data-tag="<?=$value->slug?>"
                                                    class="<?=$key==0?'active':''?>">
                                                    <div class="list-d">
                                                        <span class="i-palce"><i class="<?=$value->icon?>"></i></span>
                                                        <span class="i-text"><?=explode(' ',$value->title)[0]?></span>
                                                    </div>
                                                </a>
                                            </div>

                                            <?php  } ?>

                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            <div class="col-lg-5">
                                <div class="ser-img mt-15">

                                    <?php
                                    foreach ($services as $key => $value) {  
                                         
                                        ?>

                                    <div
                                        class="serives-info <?=$value->slug?> <?=$key==0?'active':''?> <?= $_SESSION['lowbandwidth'] == 'low' ? 'low-bandwidth-gallery' : '' ?>">
                                        <?php if(isset($_SESSION['lowbandwidth']) && $_SESSION['lowbandwidth'] == 'low'){   }else{ ?>
                                        <img src="<?=$value->image?>" alt="">
                                        <?php } ?>
                                    </div>
                                    <?php }  ?>


                                </div>
                            </div>

                        </div>
                    </div>





                    
                </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="content-section ">
            <div class="container-custom">
                <div class="row">
                <div class="col-lg-5 mb-30">
                        <div class="section-header mt-30  mb-30 section-base-color">
                            <?php echo $this->lang->line('label_gallery');?> <span class="right-v"> <a
                                    href="<?=base_url().'gallery/'?>">
                                    <?php echo $this->lang->line('view_all') ?></a></a></span>
                        </div>
                        <div class="slider-navigation-slick">
                    <div class="s-arrow-section s-gall left-arrow prev-pro1">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="s-arrow-section s-gall right-arrow next-pro1">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
                        <div class="gal-slider-s slider-navigation-slick s-list-s-s">
                        
                            <?php
                   

                            foreach ($gallery as $key => $value) {  ?>

                            <div class="slide-ss ">
                                <div
                                    class="slide-m-img <?= $_SESSION['lowbandwidth'] == 'low' ? 'low-bandwidth-gallery' : '' ?>">
                                    <?php if(isset($_SESSION['lowbandwidth']) && $_SESSION['lowbandwidth'] == 'low'){   }else{ ?>
                                    <img src="<?=$value->image?>" alt="">
                                    <?php } ?>
                                </div>
                                <span class="active-view-content">
                                    <a
                                        href="<?=base_url().'gallery/GetDetails/'.$this->Encryption->encode($value->id)?>">
                                        <?=$value->title?></a></span>
                            </div>
                            <?php   } ?>
                        </div>

                    </div>
                    <div class="col-lg-4">
                    <div class="section-header mt-30  mb-30 section-base-color">
                            Social Media
                        </div>
                    <div class="facebook-wid">
                    <div class="fb-page" data-href="https://www.facebook.com/beema.company/" data-tabs="timeline" data-width="" data-height="280" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/merocreations/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/merocreations/">Merocreations</a></blockquote></div>                
                    </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="section-header pt30 mb-30  mt-15 section-secon-color">
                            <?php echo ($lang == 'np') ? 'सूचना अधिकारी':'Information Officer'?>
                        </div>
                        <div class="mt-15">
                            <?php if(isset($information_officer) && !empty($information_officer)){ ?>


                            <div class="spok-details">
                                <div
                                    class="spok-img <?= $_SESSION['lowbandwidth'] == 'low' ? 'low-bandwidth-type' : '' ?>">

                                    <?php if(isset($_SESSION['lowbandwidth']) && $_SESSION['lowbandwidth'] == 'low'){   }else{ ?>
                                    <img src="<?php echo $information_officer->image ?>" alt="">
                                    <?php } ?>
                                </div>
                                <div class="spok-detail">
                                    <div class="spoke-name">
                                        <?php echo $information_officer->name ?>
                                    </div>

                                    <div class="spoke-position-de">
                                        <?php echo ($lang=='np')?'फोन:':'Phone:';?>
                                        <?php echo $information_officer->phone ?>
                                    </div>
                                    <div class="spoke-position-de">Mobile No: 9841330249</div>
                                    <div class="spoke-position-de">
                                        <?php echo ($lang=='np')?'ईमेल:':'Email:';?>
                                        <?php echo $information_officer->email ?>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="content-section pt30 pb30 bg-gray-light">
            <div class="container-custom">
                <div class="section-header section-base-color small-border">
                    <?php echo $this->lang->line('partner'); ?>
                </div>
                <div class="slider-navigation-slick">
                    <div class="s-arrow-section left-arrow prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="s-arrow-section right-arrow next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="slic-slider">

                    <div class="cus-slid">
                        <a href="https://www.nrb.org.np" target="_blank">
                            <img src="<?=base_url().'uploads/partner/nrb.png'?>">
                        </a>
                    </div>
                    <div class="cus-slid">
                        <a href="https://www.nrcs.org" target="_blank"><img
                                src="<?=base_url().'uploads/partner/NepalRedCross.png'?>">
                        </a>
                    </div>


                    <div class="cus-slid">
                        <!-- <a href="https://www.nrb.org.np" target="_blank">
                    <img src="<?=base_url().'uploads/partner/nrb.png'?>">
                </a> -->
                        <a href="https://www.nepalairlines.com.np" target="_blank"><img
                                src="http://rbcl.com.np/uploads/partner/NepalAirline.png" style="height: 55px;"></a>
                    </div>
                    <div class="cus-slid">
                        <!--  <a href="https://www.nrb.org.np" target="_blank">
                    <img src="<?=base_url().'uploads/partner/nrb.png'?>">
                </a> -->
                        <a href="http://noc.org.np" target="_blank"><img
                                src="http://rbcl.com.np/uploads/partner/noc.png" style="height: 55px;"></a>
                    </div>
                    <div class="cus-slid">
                        <!-- <a href="https://www.nrb.org.np" target="_blank">
                    <img src="<?=base_url().'uploads/partner/nrb.png'?>">
                </a> -->
                        <a href="http://www.sipradi.com.np" target="_blank"><img
                                src="http://rbcl.com.np/uploads/partner/sipradi.png" style="height: 55px;"></a>
                    </div>
                    <div class="cus-slid">
                        <!-- <a href="https://www.nrb.org.np" target="_blank">
                    <img src="<?=base_url().'uploads/partner/nrb.png'?>">
                </a> -->
                        <a href="https://www.ntc.net.np" target="_blank"><img
                                src="http://rbcl.com.np/uploads/partner/NepalTelecom.png" style="height: 55px;"></a>
                    </div>
                    <div class="cus-slid">
                        <!-- <a href="https://www.nrb.org.np" target="_blank">
                    <img src="<?=base_url().'uploads/partner/nrb.png'?>">
                </a> -->
                        <a href="http://site.epfnepal.com.np" target="_blank"><img
                                src="http://rbcl.com.np/uploads/partner/EmployeesPF.png" style="height: 55px;"></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        </div>

        <style>
        .low-bandwidth-type {
            height: 50px;
            background: #a2a0a0;
        }

        .low-bandwidth-gallery {
            height: 300px;
            background: #a2a0a0;
        }

        .ser-img {
            min-height: 361px;
        }

        .spok-details {
            margin: 0 auto;
            margin-top: 0px;
            text-align: center;
            margin-top: 60px;
            width: 100%;
        }

        .spok-details .spok-img {
            height: 150px;
            overflow: hidden;
            width: 150px;
            margin: 0 auto;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .spok-details .spok-img img {
            object-fit: cover;
            width: 100%;
            object-position: top;
            height: auto;
        }

        .spoke-position-de {
            font-size: 13px;
        }

        span.right-v {
            float: right;
            font-size: 12px;
            margin-top: 10px;

        }

        span.right-v a {
            color: #ff7841;
        }

        .classinfo {
            display: none;
        }

        .classinfo.active {
            display: block;
        }
        </style>