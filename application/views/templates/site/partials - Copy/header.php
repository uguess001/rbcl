<?php
if (!empty($menulist)) {
foreach ($menulist as $k => $val) {
$childmenulist = $this->db->query("SELECT id,link,parent,sort,status,link,label_$lang as label FROM tbl_menu WHERE parent = '".$val->id."' ORDER BY sort ASC")->result();
foreach ($childmenulist as $ch => $child) {
$subchildmenulist = $this->db->query("SELECT id,link,parent,sort,status,link,label_$lang as label FROM tbl_menu WHERE parent = '".$child->id."' ORDER BY sort ASC")->result();
$childmenulist[$ch]->subchildmenulist = $subchildmenulist;
}
$menulist[$k]->childmenulist = $childmenulist;
}
}
?>
<section class="main-header">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="business-logo">
          <a href="<?=base_url();?>">
            <img src="<?=RESOURCE_PATH?>img/rbs_logo1.png" alt="RBCL Logo">
          </a>
        </div>
      </div>


      <div class="col-12 col-lg-2">
        <ul class="list-inline lang-change">
          <li class="list-inline-item  <?=$lang=='en'?'active':'lang'?>"> <a href="#" onclick="changeLanguage()">Eng</a></li><li class="list-inline-item  <?=$lang=='np'?'active':''?>"> <a href="#"  onclick="changeLanguage()">नेपाली</a></li>
        </ul>
        <div class="phone-cotact">
          <span class="fa fa-phone"></span>01-4258866
        </div>
      </div>



      <div class="col-12 col-lg-2">
        <div class="visit-nepal-logo">
          <a href="https://2020.welcomenepal.com/" target="_blank">
            <img src="<?=base_url()?>uploads/visit-nepal-2020.png" alt="" class="pull-right" style="width: 80px; padding-top: 10px;">
          </a>
        </div>
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
          <?php if (!empty($menulist)) {
          $counter = 0;
          $counter = 'active';
          foreach ($menulist as $kl => $vl) { ?>
          
          <?php if (empty($vl->childmenulist)) {
          if (strpos($vl->link, 'http') !== false) {
          $a=$vl->link;
          } else {
          $a=base_url().$vl->link;
          }
          ?>
          <li class="<?=($this->uri->segment(1)==($vl->link))?'active':'';?> nav-item"><a class="nav-link" href="<?php echo $a?>">
          <?php echo $vl->label ?></a></li>
          <?php } ?>
          <!-- top level -->
          <?php if (!empty($vl->childmenulist)) {
          if (strpos($vl->link, 'http') !== false) {
          $b=$vl->link;
          } else {
          $b=base_url().$vl->link;
          }
          ?>
          <?php //echo $vl->link;
          $datalink = $this->db->query("SELECT label_en FROM tbl_menu WHERE id IN (SELECT parent FROM tbl_menu WHERE link='".current_url()."')")->row();
          ?>
          <li class="<?=((isset($datalink->label_en) && !empty($datalink->label_en))?(($vl->label==($datalink->label_en))?'active':''):''); ?>  nav-item dropdown">
            <a href="<?php echo $b ?>" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $vl->label ?></a>
            <ul class="nav navbar-nav dropdown-menu" style="display: none">
              <?php foreach ($vl->childmenulist as $ch => $child) {
              if (strpos($child->link, 'http') !== false) {
              $ab=$child->link;
              } else {
              $ab=base_url().$child->link;
              }
              ?>
              <?php if (empty($child->subchildmenulist)) { ?>
              <li class="nav-item"><a class="dropdown-item" href="<?php echo $ab ?>"><?php echo $child->label ?></a></li>
              <?php } ?>
              <?php if (!empty($child->subchildmenulist)) { ?>
              <li class="dropdown-submenu">
                <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="<?php echo $child->link ?>" data-toggle="dropdown"><?php echo $child->label ?></a>
                <ul class="nav navbar-nav dropdown-menu" style="display: none">
                  <?php foreach ($child->subchildmenulist as $sub => $subchild) {
                  if (strpos($subchild->link, 'http') !== false) {
                  $c=$subchild->link;
                  } else {
                  $c=base_url().$subchild->link;
                  }
                  ?>
                  <li class="nav-item"><a class="dropdown-item" href="<?php echo $c ?>"><?php echo $subchild->label; ?></a></li>
                  <?php } ?>
                </ul>
              </li>
              <?php } ?>
              
              <?php } ?>
            </ul>
          </li>
          <?php } ?>
          
          <?php } } ?>
          
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" style="display: none;"><a class="nav-link" target="_blank" href="<?php echo base_url().'admin/login'; ?>"><?php echo $this->lang->line('OFFICEMAIL');?></a></li>
          <li class="nav-item" style="display: none;"><a class="nav-link" target="_blank" href="http://rbcl.com.np:2095/"><?php echo $this->lang->line('CHECKMAIL');?></a></li>
          <li class=" nav-item dropdown">
            <a href="http://www.rbcl.com.np/" class="dropdown-toggle nav-link" data-toggle="dropdown">E-SERVICES</a>
            <ul class="nav navbar-nav dropdown-menu" style="display: none;">
              <li class="nav-item"><a class="dropdown-item" href="<?php echo base_url().'admin/login'; ?>"><?php echo $this->lang->line('OFFICEMAIL');?></a></li>
              <li class="nav-item"><a class="dropdown-item" href="http://rbcl.com.np:2095/"><?php echo $this->lang->line('CHECKMAIL');?></a></li>
              
            </ul>
          </li>
          <li class="nav-item" style="display: none;"><a class="nav-link" href="<?=base_url().'welcome/sitemap'?>">site map</a></li>
          <li class="nav-item"><a  href="#" class="s-a nav-link"> <i class="fa fa-search fa-2x"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>
</section>
<div class="search-area" style="display: none;">
  <form method="post" action = "<?=base_url().'pages/search'?>" id="srch">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <input type="text" name="search" placeholder="Search Here">
    <!-- <input type="hidden" name="post" value="true"> -->
    <!-- <input type="submit" class="btn btn-default " value="Search" style="margin-left:5px"><input type="hidden" name="post" value="true"> -->
  </form>
</div>
<form id="langfrm" name="langfrm" method="post" action="#">
  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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