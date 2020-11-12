<div class="header-top">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-9">
                <div class="h-top-list">
                    <ul>
                        <li><span class="icons-s"><i class='fas fa-map-marker'></i></span>
                            <?=isset($contactus->address)?$contactus->address:'';?></li>
                        <li> <span class="icons-s"><i class='far fa-clock'></i></span> Open : Sun-Thr: <span
                                class="o-duration"> 10:00-17:00<span>
                                    <span class="seperator"></span>
                                    Fri: <span class="o-duration"> 10:00-13:30<span>
                                            <span class="seperator"></span>
                                            Sat: <span class="o-duration">Closed</span>
                        </li>
                        <li><span class="icons-s"><i class='fas fa-phone'></i></span> <a
                                href="tel:<?php echo  ($lang == 'np')?changeNumberUnicode($contactus->phone):$contactus->phone;?>"><?php echo  ($lang == 'np')?changeNumberUnicode($contactus->phone):$contactus->phone;?></a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="official-use">
                <a href="javascript:void(0)" class="s-drop"> <?=$lang=='en'?'e-Service':'ई-सर्भिस'?></a>
                    <ul class="list-unstyled">
                        <li><a href="#"> Office Login</a></li>
                        <li><a href="#"> Check Mail</a></li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="main-header">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-7">
                <div class="business-logso">
                    <a href="<?=base_url();?>">
                        <span class="logo-area">
                            <img src="<?=RESOURCE_PATH?>img/logo.png" alt="RBCL Logo">
                        </span>
                        <span class="bus-title">
                            <?=$lang=='en'?'Rastriya Beema Company Ltd':'राष्ट्रिय बीमा कम्पनी लिमिटेड '?>
                            <span
                                class="tagline"><?=$lang=='en'?'&quot;Nation’s Insurer – Rastriya Beema Company&quot;':'&quot;राष्ट्रको बीमक  - राष्ट्रिय बीमा कम्पनी&quot;'?>
                            </span>
                        </span>

                    </a>
                </div>
            </div>
            <!-- <?php echo "<pre>"; print_r($contactus);?> -->
            <div class="col-lg-5">
                <div class="r-side-bar">
                    <div class="right-section">
                        <div class="follow-us">
                            <ul class="list-unstyled">
                                <li class="list-inline-item"><a class="facebook" href="<?=$contactus->facebook?>"
                                        target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="twitter" href="<?=$contactus->twitter?>"
                                        target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="youtube" href="<?=$contactus->youtube?>" target="_blank"><i
                                            class="fab fa-youtube"></i></a></li>


                            </ul>
                        </div>
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="colorswap">
                                    <a href="#" id="contrast"><?=$lang=='en'?'A':'अ'?> </a>
                                </div>

                            </li>
                            <li   class="list-inline-item">
                                <?php if($_SESSION['lowbandwidth'] == 'low'){ ?>
                                    <a href="javascript:;" class="change-bandwidth" id="high"
                                       title="<?=$lang=='en'?'High bandwidth':'उच्च व्यान्डविथ'?>">

                                           <?=$lang=='en'?'High bandwidth':'उच्च व्यान्डविथ'?>

                                       </a>
                                <?php }

                                else{?>
                                    <a href="javascript:;" class="change-bandwidth" id="low"
                                       title="<?=$lang=='en'?'Low bandwidth':'न्यून व्यान्डविथ'?>">

                                           <?=$lang=='en'?'Low bandwidth':'न्यून व्यान्डविथ'?>

                                       </a>
                                <?php } ?>
                            </li>
                           
                            <li class="list-inline-item">
                                <div class="font-style">
                                <div id="rvfs-controllers" class="fontsize-controllers group"></div>
                                </div>
                            </li>
 <!--<li class="list-inline-item"><a href="<?=base_url();?>pages/screen-reader">-->
 <!--                                   <?=$lang=='en'?'Screen Reader':'स्क्रीन रीडर '?> </a></li>-->


                             

                            <li class="list-inline-item" onclick="changeLanguage()">English
                                <label class="switch">
                                    <input class="changeLocale" type="checkbox"  value="<?=$lang=='en'?'en':'np'?>" <?=$lang=='en'?'':'checked'?>>
                                    <span class="slider round"></span>
                                </label>
                                नेपाली
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navigation">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-11">
                <div id="menu_area" class="menu-area">



                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class="navbar-nav mr-auto">

                                <?php 
/*echo "<pre>";
print_r($childlist);
exit();
*/
if (!empty($menulist)) {
                  $counter = 0;
                  $counter = 'active';
              foreach ($menulist as $kl => $vl) { 

               
                      if (strpos($vl->link, 'http') !== false) {
                        $a=$vl->link;
                      } else {
                        $a=base_url().$vl->link;
                      }


                  if($vl->link){
                  ?>
                                <li class="<?=($this->uri->segment(1)==($vl->link))?'active':'';?> nav-item">
                                    <a class="nav-link" href="<?php echo $a?>"><?php echo $vl->label ?></a>
                                </li>

                                <?php }else{ ?>



                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><?php echo $vl->label ?></a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <?php foreach ($childlist as $key => $value) {
                      if($value->parent==$vl->id){ ?>
                                        <a class="dropdown-item"
                                            href="<?php echo $value->link ?>"><?php echo $value->label ?></a>
                                        <?php } } ?>
                                    </div>

                                </li>



                                <?php } } } ?>

                            </ul>

                        </div>
                    </nav>




                </div>

            </div>
            <div class="col-lg-1">
                <a href="#" class="search-s"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </div>
</div>
<form id="langfrm" name="langfrm" method="post" action="#">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
        value="<?php echo $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="previous_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
</form>
<style>

</style>