<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="footer-title"><?php echo $this->lang->line('insurance_offerings'); ?> </div>
                <div class="i_offering">
                    <ul class="list-unstyled">
                        <?php
                        if(isset($services) && !empty($services)) :
                        foreach ($services as $value) :?>
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
            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="footer-title"> <?php echo $this->lang->line('footer_nav_quick_link'); ?> </div>
                        <div class="quick_links">
                            <ul class="list-unstyled">
                                <?php
                                if(isset($quicklinks) && !empty($quicklinks)):
                                $a=0;
                                foreach ($quicklinks as $value):
                                    if($value->category==2):
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
                    </div>
                    <!--   <div class="col-12 col-lg-4">
                        <div class="footer-title"><?php echo $this->lang->line('right_sidebar_useful_link'); ?> </div>
                        <div class="quick_links">
                            <ul class="list-unstyled">
                                <?php if(isset($usefullinks) && !empty($usefullinks)):
                                foreach ($usefullinks as $value):
                                if($a<= 5):
                                ?>
                                <li class=""><a target="_blank" href="<?=$value->url?>"><?=$value->title?></a></li>
                                <?php
                                endif;
                                $a++;
                                endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div> -->


                    <div class="col-12 col-lg-5">
                        <div class="footer-title"><?php echo $this->lang->line('right_sidebar_useful_link'); ?> </div>

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

                        <!-- <div class="map">
                            <iframe src="<?=$contactus->map?>" width="100%" height="195" frameborder="1" style="border:0">
                            </iframe>
                        </div> -->
                    </div>









                    <div class="col-12 col-lg-4">
                        <div class="footer-title"><?php echo $this->lang->line('contact_information'); ?> </div>
                        <div class="address-info">
                            <address>
                                <strong><?php echo  ($lang == 'np')?'राष्ट्रिय बीमा कम्पनी लिमिटेड ':'Rastriya Beema Company Ltd';?></strong><br>
                                <?=isset($contactus->address)?$contactus->address:'';?><br>
                                <?php echo ($lang=='np')?'पोष्ट बक्स':'P.O.box';?> :<?=isset($contactus->pobox)?$contactus->pobox:'';?><br>
                            <abbr title="Phone"><?php echo ($lang=='np')?'फोन':'Phone';?>:</abbr> <?php echo  ($lang == 'np')?changeNumberUnicode($contactus->phone):$contactus->phone;?><br>
                        <abbr title="Fax"><?php echo ($lang=='np')?'फ्याक्स':'Fax';?>:</abbr> <?php echo  ($lang == 'np')?changeNumberUnicode($contactus->fax):$contactus->fax;?><br>
                        <abbr title="Email"><?php echo ($lang=='np')?'ईमेल ':'Email';?>:</abbr> <a href="mailto:<?=$contactus->email?>"> <?=isset($contactus->email)?$contactus->email:'';?></a><br>
                    <abbr title="Website"><?php echo ($lang=='np')?'वेब':'Web';?>:</abbr> www.rbcl.com.np<br>
                </address>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="footer-menu-social">
<div class="container">
<div class="row">
    <div class="col-12 col-lg-7">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
            <li class="list-inline-item"><a href="<?=base_url().'pages/introduction-to-rbcl'?>"><?php echo $this->lang->line('label_nav_about');?></a></li>
            <!-- <li class="list-inline-item"><a href="#"><?php echo $this->lang->line('label_nav_SERVICES');?></a></li> -->
            <li class="list-inline-item"><a href="<?=base_url()?>reports"><?php echo $this->lang->line('nav_header_report');?></a></li>
            <!-- <li class="list-inline-item"><a href="#"><?php echo $this->lang->line('label_nav_media'); ?></a></li> -->
            <li class="list-inline-item"><a href="<?=base_url()?>contact"><?php echo $this->lang->line('label_nav_contact');?></a></li>
            <li class="list-inline-item"><a href="<?=base_url()?>faq"><?php echo $this->lang->line('label_nav_sub_faq');?></a></li>
            <li  class="list-inline-item"><a href="<?=base_url().'claim'?>"><?php echo $this->lang->line('label_report_feedback');?></a></li>
            <li  class="list-inline-item"><a href="<?=base_url().'gallery'?>"><?php echo $this->lang->line('label_gallery');?></a></li>
            <li  class="list-inline-item"><a href="<?=base_url().'video'?>"><?php echo $this->lang->line('label_nav_VIDEO');?></a></li>
            <li  class="list-inline-item"><a href="<?=base_url().'sitemap'?>">SiteMap</a></li>
        </ul>
    </div>
    <div class="col-12 col-lg-5">
        <ul class="list-unstyled list-inline text-right">
            <li class="list-inline-item s-facebook"><a target="_blank" href="<?=$contactus->facebook?>"><i class="fa fa-facebook fa-2x"></i></a></li>
            <li class="list-inline-item s-twitter"><a target="_blank" href="<?=$contactus->twitter?>"><i class="fa fa-twitter fa-2x"></i></a></li>
            <li class="list-inline-item s-instagram"><a target="_blank" href="<?=$contactus->instagram?>"><i class="fa fa-instagram fa-2x"></i></a></li>
        </ul>
    </div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="copyright">
<div class="container">
<div class="row">
    <?php $yesterday = date('F d, Y',strtotime("-1 days")); ?>
    <!-- <div class="col-12 col-lg-12"> Site Updated on <?php echo $yesterday ?> </div> -->
    <div class="col-12 col-lg-6"> &copy; Rastriya Beema Company Ltd <?php echo date("Y")?>. </div>
    <div class="col-12 col-lg-6" style="text-align: right;"> Site Updated on <?php echo $yesterday ?> 
        
    </div>
</div>
</div>
</div>
</footer>
<a href="#0" class="cd-top js-cd-top cd-top--show">Top</a>

<script>
    $(document).ready( function() {
  var i = 0;
  var tumyukseklik = 0;
  var yukseklik = $('#slider .slide').height();
  $('#slider').css('height', ($('#slider .slide').length * yukseklik));
  function animasyon(px){
    $('#slider').stop(false, false).animate({
      top: -px
    }, 300);
  }
 
  $('#sayfalama a').click(function(){
    var index = $(this).index();
    pozisyon = index * yukseklik;
    animasyon(pozisyon);
    if(index == $('#slider .slide').length - 1){
      i = 0;
    }else{
      i = index + 1;
    }
    return false;
  });
 
  var zamanlayici = setInterval(function() {
    tumyukseklik = i * yukseklik;
    if(i == $('#slider .slide').length - 1){
      i = -1;
    }
    animasyon(tumyukseklik);
    i++;
  }, 2000);
});
</script>