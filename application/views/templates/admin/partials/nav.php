<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar black-skin">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION </li>
      <?php 
      $TotalRecords = NULL;
      foreach ($menus as $key => $value) {
        $TotalRecords[]=$value->parent_id;
      }
      foreach ($menus as $key => $mvalue) {
        if(!isset($mvalue->parent_id) && strlen($mvalue->name)>0) { ?>
          <?php if (in_array($mvalue->id, $assigned_parentmenulist)){ ?>
            
          <li class="treeview <?php echo isset($_SESSION['parent_menu']) && $_SESSION['parent_menu']==$mvalue->id?'active':''?>" id="treeview_<?php echo $mvalue->id?>">
            <a href="#">
              <i class="<?php echo $mvalue->icon?>"></i> <span><?php echo $mvalue->name?></span>
              <span class="pull-right-container">
              </span>
            </a>
            <ul class="treeview-menu">
              <?php 
              foreach ($menus as $key => $mvalue0) {
                if(in_array($mvalue->id, $TotalRecords) && $mvalue->id==$mvalue0->parent_id) {
                  $required_tooptip=false;
                  if($mvalue0->name!=word_limiter($mvalue0->name,2)) {
                    $required_tooptip=true;
                  } 
                  if($_SESSION['user_type'] > 1){
                    $menu_assigned = explode(',',$assigned_menu->MenuID);
                  }else{
                    $menu_assigned = array();
                  } 
                  ?>
                  <?php if (($_SESSION['user_type'] > 1) && in_array($mvalue0->id,$menu_assigned)) { ?>
                   <li id="li_<?=$mvalue0->id?>" class="level0 <?=isset($_SESSION['child_menu']) && $_SESSION['child_menu']==$mvalue0->id?'active':''?>">
                    <a href="<?=base_url().'admin/'.$mvalue0->slug?>" <?=$required_tooptip?('data-toggle="tooltip" title="'.$mvalue0->name.'"'):''?>>
                      <i class="fa fa-circle-o"></i> <?=word_limiter($mvalue0->name,2)?>
                    </a>
                  </li>
                  <?php } elseif ($_SESSION['user_type'] <= 1) { ?>
                  <li id="li_<?php echo $mvalue0->id?>" class="level0 <?php echo isset($_SESSION['child_menu']) && $_SESSION['child_menu']==$mvalue0->id?'active':''?>">
                    <a href="<?php echo base_url().'admin/'.$mvalue0->slug?>" <?php echo $required_tooptip?('data-toggle="tooltip" title="'.$mvalue0->name.'"'):''?>><i class="fa fa-circle-o"></i> <?php echo word_limiter($mvalue0->name,2)?></a>
                  </li>
                  <?php } ?>
                <?php } //condition for mvalue0 ends here
                  } //$mvalue0 loop ends here
                 ?>
               </ul>
             </li>
          <?php } ?>

          <?php } } ?>


        <script type="text/javascript">

          $(document).ready(function(){

            //Sidebar Toggle
            var side ='<?=isset($_SESSION["sidebar"])?$_SESSION["sidebar"]:3?>';
            if(parseFloat(side)==3){
              $("body").removeClass("sidebar-collapse"); 
            }
            else
            {
              $('body').addClass("sidebar-collapse");  
            }

            $('.sidebar-toggle').click(function(){
              var bodylength = $("body")[0].classList.value.split(' ').length;
              var post_data = {
              length : bodylength,
              <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
              };
                $.ajax({
                      url:'<?=base_url()?>Admin/SessionSetSideBar',
                      type:'post',
                      data:post_data,
                      success:function(response){
                        console.log(response)
                      }
                })

            })
            //Sidebar Toggle Ends here

            
            //parent menu 
            $(".treeview").click(function(){
                if(parseFloat(this.id.split('_')[1])) {
                  var data_menu = {menu_id:this.id.split('_')[1]}
                  var post_data = {
          menu_id : this.id.split('_')[1],
          <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
                  if(this.className.split(' ').length=='2') {
                    //data_menu.menu_id=0;
                  }
                  $.ajax({
                    url:'<?=base_url()?>Admin/SessionSetParentMenu',
                    type:'post',
                    data: post_data,
                    success:function(response){
                      console.log(response);
                    }
                  })
                }
            })

            //child menu 
            $(".level0").click(function(){
                if(parseFloat(this.id.split('_')[1])) {
                  var post_data = {
          menu_id : this.id.split('_')[1],
          <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
                  var data_menu = {menu_id:this.id.split('_')[1]}
                  if(this.className.split(' ').length=='2') {
                    //data_menu.menu_id=0;
                  }
                  $.ajax({
                    url:'<?=base_url()?>Admin/SessionSetChildMenu',
                    type:'post',
                    data: post_data,
                    success:function(response){
                    }
                  })
                }
            })            

          })
        </script>
  </section>
</aside>
