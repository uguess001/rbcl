<div class="slider-section">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-8">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        $slide=0;
                        $counter = 0;
                        $counter = 'active';
                        if(isset($banner) && !empty($banner)) :
                        foreach ($banner as $value) : ?>

                        <li data-target="#carouselExampleCaptions" data-slide-to="<?=$slide++?>"
                            class="<?=$counter++?>"></li>
                        <?php
                        endforeach;
                        endif;
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                            $counter = 0;
                            $counter = 'active';
                            foreach ($banner as $value) : ?>
                        <div class="carousel-item <?=$counter++;?> <?= $_SESSION['lowbandwidth'] == 'low' ? 'low-bandwithimage' : '' ?>">
                            
                              <?php if(isset($_SESSION['lowbandwidth']) && $_SESSION['lowbandwidth'] == 'low'){   }else{ ?>
                                <img class="d-block w-100" src="<?=$value->image?>"
                                    alt="Slider Image for <?=isset($value->title)?$value->title:''?>">
                             <?php } ?>
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?=isset($value->title)?$value->title:''?></h5>
                                <p><?= strip_tags(word_limiter($value->description,20)); ?><a href="<?=base_url().'services/'.$value->slug?>" class="vxk" style="color:#fd7e14;">
                            <?php echo $this->lang->line('view_all') ?></a></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mem-list">
                    <div class="sinle-mem pb15">
                        <div class="mem-title ptsmall pbsmall fnt-bld">
                             <?php echo $this->lang->line('chairperson_message');?>
                        </div>
                        <div class="mem-img <?= $_SESSION['lowbandwidth'] == 'low' ? 'low-bandwidth-type' : '' ?>">
                              <?php if(isset($_SESSION['lowbandwidth']) && $_SESSION['lowbandwidth'] == 'low'){   }else{ ?>
                            <img src="<?=base_url()?>application/resources/admin/assets/source/umesh%20chandra.jpg" alt="">
                            <?php } ?>
                        </div>
                        <div class="mem-details">
                            <!-- <p class="mem-mess text-justify">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam veritatis numquam natus 
                                iusto Magnam veritatis numquam natus 
                                iusto.... <a href="#" class="re-mre-link">View All</a>
                            </p> -->
                            <p class="mem-mess text-justify">
                                <?php 
                                // $description = substr($mesage_fromCEOandChair[0]->description, 0, 100);
                                $description = strip_tags(word_limiter($mesage_fromCEOandChair[0]->description,20));
                                echo strip_tags($description);  
                                ?>... 
                                <a href="<?=base_url().'messageFrom/message-from-chairperson'?>" class="re-mre-link">
                                    <?php echo $this->lang->line('view_all');?>
                                </a></p>
                            <p class="mem-position fnt-bld">
                                <?php echo $mesage_fromCEOandChair[0]->name ?>
                            </p>
                        </div>
                    </div> 
                    <div class="sinle-mem pt15">
                        <div class="mem-title ptsmall pbsmall fnt-bld">
                            <?php echo $this->lang->line('ceo_message');?>
                        </div>
                        <div class="mem-img <?= $_SESSION['lowbandwidth'] == 'low' ? 'low-bandwidth-type' : '' ?>">
                            
                             <?php if(isset($_SESSION['lowbandwidth']) && $_SESSION['lowbandwidth'] == 'low'){   }else{ ?>
                            <img src="<?=base_url()?>application/resources/admin/assets/source/Dilli%20Raj%20Aryal.jpg" alt="">
                            <?php } ?>
                            
                        </div>
                        <div class="mem-details">
                        <p class="mem-mess text-justify">
                        <?php 
                            // $description = substr($mesage_fromCEOandChair[1]->description, 0, 100);
                            $description = strip_tags(word_limiter($mesage_fromCEOandChair[1]->description,20));
                            echo strip_tags($description);  
                            ?>... 
                            <a href="<?=base_url().'messageFrom/message-from-ceo'?>" class="re-mre-link">
                                <?php echo $this->lang->line('view_all');?>
                            </a>
                            </p>
                            <p class="mem-position fnt-bld">
                                <?php echo $mesage_fromCEOandChair[1]->name ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-ticker mt-15 mb-15">
        <div class="container-custom">
            <div class="new-ticker">
                <div class="newticker-label">
                   <?php echo $this->lang->line('label_nav_LATEST_NOTICE');?>
                </div>
                <div class="newticker-contet">
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        <?php if(isset($news_marquee) && !empty($news_marquee)):
              foreach ($news_marquee as $value):
              ?>
                        <a href="<?=base_url().'latest-notice'?>" class="newsli">
                        <span class="news-tick-date">
                            
                            <?php 
                                $createdOn= date('Y-m-d', strtotime($value->CreatedOn)); 
                                echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn; 
                            ?>
                            
                            </span>  <?=$value->title?></a>
                        <?php endforeach;
              endif;
              ?>
                    </marquee>
                </div>
            </div>

        </div>
    </div>
    
    <style>
        .low-bandwithimage {
        height: 400px;
        background: #a2a0a0;
    }
    
    .low-bandwidth-type{
        background: #a2a0a0;
    }
    </style>
    
    