<style type="text/css" media="screen">
li .expander:before,li.open li .expander:before{
content: "\f07b";
font-family: "FontAwesome";
color: green;
}
li.open .expander:before,li.open li.open .expander:before{
content: "\f07c";
font-family: "FontAwesome";
color: red;
}
ul#nav-id li span.expander {
/*display: block; float: left; width: 15px; height: 15px; background: red;*/
}
/*ul#nav-id li.open span.expander { background: green; }*/
.open ul{
margin-left: 20px;
}
li.open li a {
color: #007bff;
}
li.open li a:before {
background: #007bff;
color: red;
height: 2px;
width: 16px;
position: absolute;
left: 0;
right: 0;
/* float: left; */
content: "";
margin-top: 12px;
margin-left: 15px;
}
</style>
<section class="top_innerpage" style="background: url(http://www.dryicesolutions.net/projects/rbcl/application/resources/site/img/slide1.jpg);background-position: 70% 0;">
    <div class="ti-content text-center">
        <div class="title-ti"> SiteMap </div>
        <div class="breadcrums">
            <ol class="list-unstyled list-inline">
                <!-- <li class="list-inline-item breadcrumb-item"><a href="http://www.dryicesolutions.net/projects/rbcl/">गृहपृष्ठ</a></li>
                <li class="list-inline-item breadcrumb-item"><a href="#">हाम्रो सेवाहरू</a></li>
                <li class="list-inline-item breadcrumb-item active" aria-current="page">Fire Insurance</li> -->
            </ol>
        </div>
    </div>
</section>
<section class="inner-page">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="inner-page-title">
                    <h2>Site Map</h2>
                </div>
                <div class="">
                    <ul id="nav-id" class="list-unstyled">
                        <li><a href="http://www.dryicesolutions.net/projects/rbcl/"> <?php echo $this->lang->line('label_nav_home'); ?></a></li>
                        <li class="open"><!-- will stay open -->
                        <span class="expander"></span> <?php echo $this->lang->line('label_nav_ABOUT_US');?>
                        <ul class="list-unstyled">
                            <li><a href="<?=base_url().'pages/GetDetails/introduction'?>"> <?php echo $this->lang->line('label_nav_introduction'); ?></a></li>
                            <li><a href="<?=base_url().'pages/GetDetails/profile'?>"> <?php echo $this->lang->line('label_company_profile'); ?></a></li>
                            <li><a href="<?=base_url().'staffs'?>"> <?php echo $this->lang->line('label_Board_of_Directors'); ?></a></li>
                            <li><a href="<?=base_url().'pages/GetDetails/messagefromceo'?>"> <?php echo $this->lang->line('label_message_ceo'); ?></a></li>
                        </ul>
                    </li>
                    <li >
                        <span class="expander"></span> <?php echo $this->lang->line('label_nav_SERVICES');?>
                        <ul class="list-unstyled">
                            <?php if (isset($services) && !empty($services)):
                            foreach ($services as $value):
                            ?>
                            <li><a target="_blank" href="<?=base_url().'services/GetDetails/'.$this->Encryption->encode($value->id)?>"><?=$value->title?></a></li>
                            <?php endforeach;
                            endif;
                            ?>
                        </ul>
                    </li>
                    <li><a href="<?=base_url()?>reports"> <?php echo $this->lang->line('nav_header_report');?> </a></li>
                    <li >
                        <span class="expander"></span> <?php echo $this->lang->line('label_nav_acts_DOWNLOADS');?>
                        <ul class="list-unstyled">
                            <li><a href="<?=base_url().'downloads/documents'?>"><?php echo $this->lang->line('label_nav_documents'); ?></a></li>
                            <li><a href="<?=base_url().'downloads/circulars'?>"><?php echo $this->lang->line('label_nav_circulars'); ?></a></li>
                            <li><a href="<?=base_url().'downloads/bulletins'?>"><?php echo $this->lang->line('label_nav_bulletine'); ?></a></li>
                        </ul>
                    </li>
                    <li><a href="<?=base_url()?>welcome/feedback"><?php echo $this->lang->line('label_nav_contact');?></a></li>
                </ul>
            </div>
        </div>
        <!-- <div class="col-12 col-lg-6">
            <div class="res-manager">
                <div class="res-manager-image">
                    <img src="http://www.dryicesolutions.net/projects/rbcl/application/resources/site/img/sitemap.jpg" alt="Specialist on Relations with Customers">
                </div>
            </div>
        </div> -->
    </div>
</div>
</section>