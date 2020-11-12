<section class="main-header">
  <div class="container">
    <div class="row">
      <div class="col-10">
        <div class="business-logo">
          <a href="<?=base_url();?>">
            <img src="<?=RESOURCE_PATH?>img/rbs_logo1.png" alt="RBCL Logo">
          </a>
        </div>
      </div>
      <div class="col-2">
        <ul class="list-inline lang-change">
          <li class="list-inline-item  <?=$lang=='en'?'active':'lang'?>"> <a href="#" onclick="changeLanguage()">Eng</a></li><li class="list-inline-item  <?=$lang=='np'?'active':''?>"> <a href="#"  onclick="changeLanguage()">नेपा</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="main-navigation cust_back">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand d-block d-sm-none" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?=($this->uri->segment(1)=='')?'active':''?>"> <a class="nav-link" href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?> <span class="sr-only">(current)</span></a> </li>
          <li class="nav-item dropdown <?=($this->uri->segment(1)=='aboutus' || $this->uri->segment(1)=='companyprofile' || $this->uri->segment(1)=='boardmembers' || $this->uri->segment(1)=='managementteam' || $this->uri->segment(1)=='messagefromceo' || $this->uri->segment(1)=='staffs')?'active':''?>" >
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $this->lang->line('label_nav_about');?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?=base_url().'aboutus'?>"><?php echo $this->lang->line('label_nav_introduction'); ?></a>
              <a class="dropdown-item" href="<?=base_url().'companyprofile'?>"><?php echo $this->lang->line('label_company_profile'); ?></a>
              <a class="dropdown-item" href="<?=base_url().'boardmembers'?>"><?php echo $this->lang->line('label_Board_of_Directors'); ?></a>
              <a class="dropdown-item" href="<?=base_url().'managementteam'?>"><?php echo $this->lang->line('label_management_manager'); ?></a>
              <a class="dropdown-item" href="<?=base_url().'messagefromceo'?>"><?php echo $this->lang->line('label_message_ceo'); ?></a>
            </div>
          </li>
          <li class="nav-item dropdown <?=($this->uri->segment(1)=='services')?'active':''?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $this->lang->line('label_nav_SERVICES');?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach ($services as $value) :?>
              <a class="dropdown-item" href="<?=base_url().'services/'.$value->slug?>"><?=$value->title?></a>
              <?php endforeach ?>
</div>
          </li>
          <li class="nav-item <?=($this->uri->segment(1)=='reports')?'active':''?>"> <a class="nav-link" href="<?=base_url()?>reports"><?php echo $this->lang->line('nav_header_report');?></a> </li>
          <!-- <li class="nav-item"> <a class="nav-link" href="<?=base_url()?>downloads"><?php echo $this->lang->line('label_nav_media'); ?></a> </li> -->
          <li class="nav-item dropdown <?=($this->uri->segment(1)=='downloads' ||$this->uri->segment(1)=='resources')?'active':''?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $this->lang->line('right_sidebar_download'); ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?=base_url().'downloads/documents'?>"> <?php echo $this->lang->line('label_nav_documents'); ?></a>
              <a class="dropdown-item" href="<?=base_url().'downloads/circulars'?>"><?php echo $this->lang->line('label_nav_circulars'); ?></a>
              <a class="dropdown-item" href="<?=base_url().'downloads/bulletins'?>"><?php echo $this->lang->line('label_nav_bulletine'); ?></a>
              <a class="dropdown-item" href="<?=base_url().'resources'?>"><?php echo $this->lang->line('label_resources'); ?></a>
            </div>
          </li>
          <li class="nav-item <?=($this->uri->segment(1)=='news')?'active':''?>"> <a class="nav-link" href="<?=base_url()?>news"><?php echo $this->lang->line('innder_content_news');?></a> </li>
          <li class="nav-item <?=($this->uri->segment(1)=='contact')?'active':''?>"> <a class="nav-link" href="<?=base_url()?>contact"><?php echo $this->lang->line('label_nav_contact');?></a> </li>
          
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" target="_blank" href="http://rbcl.com.np:2095/"><?php echo $this->lang->line('CHECKMAIL');?></a></li>
          <li class="nav-item" style="display: none;"><a class="nav-link" href="<?=base_url().'welcome/sitemap'?>">site map</a></li>
          <li class="nav-item"><a  href="#" class="s-a nav-link"> <i class="fa fa-search fa-2x"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>
</section>
<div class="search-area" style="display: none;">
  <form method="post" action = "<?=base_url().'pages/search'?>" id="srch">
    <input type="text" name="search" placeholder="Search Here">
    <!-- <input type="hidden" name="post" value="true"> -->
    <!-- <input type="submit" class="btn btn-default " value="Search" style="margin-left:5px"><input type="hidden" name="post" value="true"> -->
  </form>
</div>
<form id="langfrm" name="langfrm" method="post" action="#">
  <input type="hidden" name="previous_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
</form>
<script>
function changeLanguage() {
$("#langfrm").attr("action", "<?php echo base_url() . 'language'; ?>");
$('#langfrm').submit();
}
</script>
<script>
$(document).ready(function(){
    $(".s-a").click(function(){
        $(".search-area").toggle();
    });
});
</script>