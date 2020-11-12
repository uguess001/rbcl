<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
                <?php echo $this->lang->line('board_of_members'); ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                    <li class="list-inline-item breadcrumb-item active" aria-current="page">
                        <?php echo $this->lang->line('board_of_members'); ?></li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="content-section mt-30 mb-30">
    <section class="inner-page member-page member-list news-list">
        <div class="container-custom p-content">
                     
    <div class="section-header  mb-30 section-secon-color">
    <?php echo $this->lang->line('board_of_members'); ?>
                </div> 

            <div class="clearfix"></div>
            <div class="row">

                <div class="single-view">
                    <div class="card-view">
                        
                            <div class="img-container">
                                <img class=""
                                    src="<?php echo ($chairman->image == 'No Image')?RESOURCE_PATH.'no-image.png':$chairman->image ?>"
                                    alt="Card image cap">

                            </div>
                            <div class="staff-de">
                                <div class="staff-header"><span
                                        style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?=isset($chairman->name)?$chairman->name:''?></span>
                                </div>
                                <?php if($lang=='en'){?>
                                <div class="staff-postion">
                                    Chairman
                                </div>
                                <?php } else{ ?>
                                <div class="staff-postion ">
                                   अध्यक्ष
                                   </div>
                                <?php } ?>
                                 <?php if($lang=='en'){?>
                                <div class="staff-postion">
                                    Appointed by Nepal Government
                                </div>
                                <?php } else{ ?>
                                <div class="staff-postion mb-15">
                                   नेपाल सरकार द्वारा नियुक्त
                                   </div>
                                <?php } ?>
                                
                             
                                <a href="<?=base_url().'staffs/staffdetails/'.$chairman->id?>">
                                    <?php echo $this->lang->line('more_information'); ?>
                                </a>
                            </div>
                       
                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <?php if(!empty($boardmember)) {
            foreach ($boardmember as $value) { ?>


                <div class="col-lg-4">
                    <div class="card-view">
                        
                            <div class="img-container">
                                <img class=""
                                    src="<?php echo ($value->image == 'No Image')?RESOURCE_PATH.'no-image.png':$value->image ?>"
                                    alt="Card image cap">

                            </div>
                            <div class="staff-de">
                                <div class="staff-header"><span
                                        style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?= $value->name;?></span>
                                </div>
                                
                                <?php if($lang=='en'){?>
                                <div class="staff-postion">
                                    <?=(isset($value->designation) && $value->designation==1 )?'Chairman':'Board  Director'?>
                                </div>
                                <?php } else{ ?>
                                <div class="staff-postion ">
                                    <?=(isset($value->designation) && $value->designation==1 )?'अध्यक्ष':'सञ्चालक'?>
                                </div>
                                <?php } ?>
                                <?php if (!empty($value->post)) { ?>
                                <div class="staff-postion mb-15"><?=$value->post?></div>
                                <?php } ?>
                                <a href="<?=base_url().'staffs/staffdetails/'.$value->id?>">
                                    <?php echo $this->lang->line('more_information'); ?>
                                </a>
                            </div>


                        
                    </div>
                </div>



                <?php } } ?>

                <div class="col-lg-4">
                    <div class="card-view">
                        <a href="<?=base_url().'staffs/staffdetails/42'?>">
                            <div class="img-container">
                                <img class="" src="<?php echo base_url().'uploads/staffs/niranjan.jpg'?>"
                                    alt="Mr. Niranjan Acharya">

                            </div>
                            <div class="staff-de">
                                <div class="staff-header"><span
                                        style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?php echo ($lang=='en')?'Niranjan Acharya':'निरनजन आचार्य' ?></span>
                                </div>
                                <div class="staff-position mb-15">
                                    <?php echo ($lang=='en')?'(Company Secretary, RBCL)':'कम्पनी सचिव' ?></div>
                            </div>
                            


                        </a>
                    </div>
                </div>


                <div class="clearfix"></div>
            </div>

        </div>
    </section>
</div>