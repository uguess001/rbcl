<div class="fixed-p-btn">
    <a href="<?php echo base_url(); ?>pcalculator"><i class="fa fa-calculator"></i> <span>Premium calculator</span> </a>
</div>
<div class="footer-top-section">
    <div class="container-custom">
        <div class="cta-list">
            <div class="ft-c">
                <a href="<?=base_url();?>downloads/documents/7">
                    <div class="icons-section"><i class="icon-document"></i></div>
                    <div class="ftc-text">
                        <?php echo $this->lang->line('tender'); ?>
                    </div>
                </a>
            </div>
            <div class="ft-c">
            
                <div class="i_offering list-in">
                <ul class="list-unstyled list-inline">
                    <?php
                        if(isset($payments) && !empty($payments)) :
                        foreach ($payments as $value) :?>
                    <li class="list-inline-item">
                        <a href="<?=$value->link?>" target="_blank">
                            <img src="<?=$value->image?>" alt="">
                        </a>
                    </li>
                    <?php
                        endforeach;
                        endif;
                        ?>

                </ul>
                    <div class="cleafrix"></div>
                    
                </div>
                <div class="ftc-text">Pay us with</div>
                <!-- <div class="icons-section"><i class="icon-rating"></i></div>
                <div class="ftc-text">Testimonials</div> -->
            </div>
            <div class="ft-c" data-toggle="modal" data-target="#callback" style="cursor:pointer;">
                <div class="icons-section"><i class="icon-telephone-1"></i></div>
                <div class="ftc-text">
                    <?php echo $this->lang->line('request_callback'); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<footer class="pt30">
    <div class="container-custom">

        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="footer-title fnt-bld mt-15 mb-15"><?php echo $this->lang->line('contact_information'); ?>
                </div>
                <div class="address-info">
                    <address>
                        <strong><?php echo  ($lang == 'np')?'राष्ट्रिय बीमा कम्पनी लिमिटेड ':'Rastriya Beema Company Ltd';?></strong><br>
                        <?=isset($contactus->address)?$contactus->address:'';?><br>
                        <?php echo ($lang=='np')?'पोष्ट बक्स':'P.O.box';?>
                        :<?=isset($contactus->pobox)?$contactus->pobox:'';?><br>
                        <abbr title="Phone"><?php echo ($lang=='np')?'फोन':'Phone';?>:</abbr>
                        <?php echo  ($lang == 'np')?changeNumberUnicode($contactus->phone):$contactus->phone;?><br>
                        <abbr title="Fax"><?php echo ($lang=='np')?'फ्याक्स':'Fax';?>:</abbr>
                        <?php echo  ($lang == 'np')?changeNumberUnicode($contactus->fax):$contactus->fax;?><br>
                        <abbr title="Email"><?php echo ($lang=='np')?'ईमेल ':'Email';?>:</abbr> <a
                            href="mailto:<?=$contactus->email?>">
                            <?=isset($contactus->email)?$contactus->email:'';?></a><br>
                        <abbr title="Website"><?php echo ($lang=='np')?'वेब':'Web';?>:</abbr>
                        www.rbcl.com.np<br>
                    </address>
                    <div class="mt-15">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item s-facebook"><a target="_blank"
                                    href="<?=$contactus->facebook?>"><i class="fab fa-facebook fa-2x"></i></a></li>
                            <li class="list-inline-item s-twitter"><a target="_blank" href="<?=$contactus->twitter?>"><i
                                        class="fab fa-twitter fa-2x"></i></a></li>
                            <li class="list-inline-item s-instagram"><a target="_blank"
                                    href="<?=$contactus->instagram?>"><i class="fab fa-instagram fa-2x"></i></a></li>
                            <li class="list-inline-item s-youtube"><a target="_blank" href="<?=$contactus->youtube?>"><i
                                        class="fab fa-youtube fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="footer-title fnt-bld mt-15 mb-15"><?php echo $this->lang->line('insurance_offerings'); ?>
                </div>
                <div class="i_offering">
                    <ul class="list-unstyled">
                        <?php
                        if(isset($services_on_footer) && !empty($services_on_footer)) :
                        foreach ($services_on_footer as $value) :?>
                        <li>
                            <a href="<?=base_url().'services/'.$value->slug?>">
                                <?=$value->title?>
                            </a>
                        </li>
                        <?php
                        endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-lg-3">
               
                <div class="footer-title fnt-bld mt-15 mb-15">
                    <?php echo $this->lang->line('we_re_insure'); ?>
                </div>
                <div class="i_offering">
                    <ul class="list-unstyled">
                        <?php
                        if(isset($reinsure) && !empty($reinsure)) :
                        foreach ($reinsure as $value) :?>
                        <li>
                            <a href="<?=base_url().'re-insure/'.$value->slug?>">
                                <?=$value->title?>
                            </a>
                        </li>
                        <?php
                        endforeach;
                        endif;
                        ?>

                    </ul>
                    <div class="cleafrix"></div>
                </div>


                


                
            </div>


            <div class="col-12 col-lg-2">
                <div class="footer-title fnt-bld mt-15 mb-15  ">
                    <?php echo $this->lang->line('right_sidebar_useful_link'); ?> </div>

                <div class="quick_links">
                    <ul class="list-unstyled">
                        <?php
                                if(isset($quicklinks) && !empty($quicklinks)):
                                $a=0;
                                foreach ($quicklinks as $value):
                                    if($value->category==1):
                                if($a<= 5):
                                ?>
                        <li class=""><a target="_blank" href="<?=$value->url?>"><?=$value->title?></a></li>
                        <?php
                                 endif;
                                endif;
                                $a++;
                                endforeach;
                                endif;
                                ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
               

            </div>

            <div class="col-12 col-lg-2 d-none">
                <div class="footer-title fnt-bld mt-15 mb-15  no-footer-title"></div>
                <ul class="list-unstyled list-inline text-right">
                    <li class="list-inline-item s-facebook"><a target="_blank" href="<?=$contactus->facebook?>"><i
                                class="fab fa-facebook fa-2x"></i></a></li>
                    <li class="list-inline-item s-twitter"><a target="_blank" href="<?=$contactus->twitter?>"><i
                                class="fab fa-twitter fa-2x"></i></a></li>
                    <li class="list-inline-item s-instagram"><a target="_blank" href="<?=$contactus->instagram?>"><i
                                class="fab fa-instagram fa-2x"></i></a></li>
                    <li class="list-inline-item s-youtube"><a target="_blank" href="<?=$contactus->youtube?>"><i
                                class="fab fa-youtube fa-2x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="others os-s">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item"><a
                        href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
                <li class="list-inline-item"><a
                        href="<?=base_url().'pages/introduction-to-rbcl'?>"><?php echo $this->lang->line('label_nav_about');?></a>
                </li>
                <!-- <li class="list-inline-item"><a href="#"><?php echo $this->lang->line('label_nav_SERVICES');?></a></li> -->
                <li class="list-inline-item"><a
                        href="<?=base_url()?>reports"><?php echo $this->lang->line('nav_header_report');?></a></li>
                <!-- <li class="list-inline-item"><a href="#"><?php echo $this->lang->line('label_nav_media'); ?></a></li> -->
                <li class="list-inline-item"><a
                        href="<?=base_url()?>contact"><?php echo $this->lang->line('label_nav_contact');?></a></li>
                <li class="list-inline-item"><a
                        href="<?=base_url()?>faq"><?php echo $this->lang->line('label_nav_sub_faq');?></a></li>
                <li class="list-inline-item"><a
                        href="<?=base_url().'pages/claim-information'?>"><?php echo $this->lang->line('label_report_feedback');?></a></li>
                <li class="list-inline-item"><a
                        href="<?=base_url().'gallery'?>"><?php echo $this->lang->line('label_gallery');?></a></li>
                <!-- <li  class="list-inline-item"><a href="<?=base_url().'gallery'?>"><?php echo $this->lang->line('label_nav_VIDEO');?></a></li> -->
                <li class="list-inline-item"><a
                        href="<?=base_url().'sitemap'?>"><?php echo $this->lang->line('label_header_map');?></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-copy-right">
        <div class="container-custom">
            <div class="c-left">© <?=date('Y')?>,
                <?php echo ($lang == 'en') ? 'Rastriya Beema Company' : 'राष्ट्रिय बीमा कम्पनी' ?></div>
            <div class="c-right"><?php echo $this->lang->line('site_updated');?> <?=$site_updated->date ?></div>
        </div>
    </div>
</footer>
<style>
.others li a {
    font-size: 10px;
    font-weight: bold;
    text-transform: uppercase;
}

.others ul {
    margin: 0;
    padding: 0;
}

.others {
    margin-bottom: 14px;
}

.fixed-p-btn {
    position: fixed;
    bottom: 200px;
    right: 0;
}

.ft-c a {
    color: white;
}

.fixed-p-btn a {
    float: left;
    width: 100%;
    background: red;
    color: white;
    padding: 10px;
    border-radius: 4px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    font-size: 1.6rem;
}

.fixed-p-btn a span {
    display: none;
    float: left;
}

.fixed-p-btn:hover span {
    display: block;
    line-height: 1;
    margin-left: 10px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 13px;
    padding: 7px 1px 0;
}

.fixed-p-btn a i {
    float: left;
}

.fixed-p-btn:hover a {
    background: blue;
}

.others.os-s a {
    font-size: 9px;
}

@media only screen and (max-width: 720px) {

    span.logo-area {
        width: 55px;
    }

    span.bus-title {
        width: calc(100% - 60px);
        font-size: 17px;
        margin-top: 6px;
    }

    span.tagline {
        font-size: 11px;
    }

    .h-top-list li {
        display: none !important;
    }

    .h-top-list li:first-child {
        display: block;
    }

    .single-view .card-view {
        width: 93%;
        margin-left: 3.5%;
    }

    .st-details {
        border: 0;
        box-shadow: none;
    }

    .content-section .section-header {
        font-size: 17px;
    }
}
</style>
<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body custom-dropdown-s">
                <div class="modal-title-area">
                    <div class="section-header mt-30  mb-30 fnt-a2 section-base-color fnt-bld">
                        <?php echo $this->lang->line('request_call');?> </div>

                </div>
                <form id="callbackform" method="post" action="<?=base_url()?>welcome/callback">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="text" required
                                    placeholder="<?php echo ($lang=='np')?'पुरा  नाम':'Full Name';?>" name="name">
                            </div>

                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="text" required
                                    placeholder="<?php echo ($lang=='np')?'Email':'Email';?>" name="email">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="number" required
                                    placeholder="<?php echo ($lang=='np')?'फोन':'Phone';?>" name="phone">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="text"
                                    placeholder="<?php echo ($lang=='np')?'ठेगाना':'Address';?>" name="address">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="6"
                                    placeholder="<?php echo ($lang=='np')?'सन्देश....':'Message....';?>"
                                    name="message"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col">
                            <div class=" mar-10">
                                <button type="submit" class="btn btn-success send">
                                    <?php echo ($lang=='np')?'पठाउनुहोस्':'Send Request';?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!--<div class="modal-footer">-->
            <!--	<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo ($lang=='np')?'बन्द':'Close';?></button>-->

            <!--</div>-->
        </div>
    </div>
</div>