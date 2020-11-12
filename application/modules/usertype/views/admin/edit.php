<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">User Type Roles Management </h3>
        <span class="pull-right"><a href="<?php echo base_url(); ?>admin/usertype/record/list" class="btn btn-primary"><i class="fa fa-plus"></i> View All</a></span>
    </div>
    <div class="box-body">
       <!--  -->
            <form method="POST" action ="#" >
                <input type = "hidden" name = "UserTypeId" id = "UserTypeId" value = "<?php echo isset($_POST['UserTypeId'])?$_POST['UserTypeId']:(isset($record->UserTypeId)?$record->UserTypeId:'') ;?>" class="form-control">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label>Description</label><input type = "text" name = "Description" id = "Description" value = "<?php echo isset($_POST['Description'])?$_POST['Description']:(isset($record->Description)?$record->Description:'') ;?>" required class="form-control">
                    </div>
                  <div class="clearfix"></div>
                  <br>
                  <div class="col-md-8">
                     <div class="panel-group" id="accordion">
                        <?php  function findID($id,$assignment,$status) {
                                    switch ($status) {
                                        case 'Role':
                                            $iterator=isset($assignment->MenuID)?$assignment->MenuID:'-';
                                            break;
                                        case 'Edit':
                                            $iterator=isset($assignment->statusEdit)?$assignment->statusEdit:'-';
                                            break;
                                        case 'Delete':
                                            $iterator=isset($assignment->statusDelete)?$assignment->statusDelete:'-';
                                            break;
                                        case 'Add':
                                            $iterator=isset($assignment->statusAdd)?$assignment->statusAdd:'-';
                                            break;
                                    }                            
                                    
                                    $match = false;
                                    if($assignment) {
                                        foreach(explode(',', $iterator) as $a)    {
                                            if($a == $id) {
                                                $match = true;
                                                break;
                                            }
                                        }
                                        
                                    }
                                    return $match;
                                }                          
                           
                                $Arraycollaps=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
                           
                            foreach ($menuHeading as $key => $Menuval) {  ?>
                                <div class="panel panel-default">
                                   <div class="panel-heading">
                                      <h4 class="panel-title">
                                         <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$Arraycollaps[$key]?>"><span class="glyphicon glyphicon-th">
                                         </span> <?=$Menuval->name?></a>
                                      </h4>
                                   </div>
                                   <div id="collapse<?=$Arraycollaps[$key]?>" class="panel-collapse collapse">
                                      <div class="panel-body">
                                         <table class="table">
                                            <tbody>
                                               <tr>
                                                  <th>
                                                     <input type="checkbox" class="check_allRole_<?=$Menuval->id?>" />
                                                     <strong>Role</strong>  
                                                  </th>
                                                  <th style="display: none;">
                                                     <input type="checkbox" class="check_allAdd_<?=$Menuval->id?>"/>
                                                     <strong>Add</strong>
                                                  </th>
                                                  <th style="display: none;">
                                                     <input type="checkbox" class="check_allEdit_<?=$Menuval->id?>"/>
                                                     <strong>Edit</strong>
                                                  </th>
                                                  <th style="display: none;">
                                                     <input type="checkbox" class="check_allDelete_<?=$Menuval->id?>" />
                                                     <strong>Delete</strong>
                                                  </th>
                                                  <th><strong>Model Heading</strong></th>
                                               </tr>
                                            </tbody>
                                            <?php 
                                               foreach ($menu as $r) { 
                                                    if($r->parent_id==$Menuval->id) { ?>
                                                        <tr>
                                                           <td widt="15">
                                                              <input type="checkbox" class="Role_<?=$Menuval->id?>" name ="menu[]" <?=(isset($record->UserTypeId) &&  findID($r->id,$roles,"Role"))?'checked':''?> value="<?=$r->id?>">
                                                           <td widt="15"  style="display: none;">
                                                              <input type="checkbox" class="Add_<?=$Menuval->id?>" name ="statusAdd[]"  <?=(isset($record->UserTypeId) &&  findID($r->id,$roles,"Add"))?'checked':''?> value="<?=$r->id?>">
                                                           <td widt="15"  style="display: none;">
                                                              <input type="checkbox" class="Edit_<?=$Menuval->id?>" name ="statusEdit[]" <?=(isset($record->UserTypeId) &&  findID($r->id,$roles,"Edit"))?'checked':''?> value="<?=$r->id?>">
                                                           <td widt="15"  style="display: none;">
                                                              <input type="checkbox" class="Delete_<?=$Menuval->id?>" name ="statusDelete[]" <?=(isset($record->UserTypeId) &&  findID($r->id,$roles,"Delete"))?'checked':''?> value="<?=$r->id?>">
                                                           <td style="text-align:left;"> <?=$r->name?></td>
                                                        </tr>
                                                <?php   } 
                                               } ?>
                                         </table>
                                      </div>
                                   </div>
                                </div>
                            <?php } ?>
                    </div>
                    <br>
                    <div class="clearfix"></div>
                    <div class="span12">
                        <div class="form-actions">
                          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
                            <button type="submit" class="btn btn-primary">Save changes</button> 
                            <input type="hidden" name="process" value="true">
                            <input type="hidden" name="UserTypeRolesID" value="<?php echo (isset($record->UserTypeRolesID) ? $record->UserTypeRolesID : ''); ?>">
                            <button type="button" class="btn" onclick="history.go(-1)">Cancel</button>
                        </div>
                    </div>
                  </div>
            </form>        
        </div>
       <!--  -->
    </div>
</div>

<script type="text/javascript">
   $(":checkbox").change(function(){
           var input_string =$(this)[0].className;
           //console.log(input_string.split("_"));
           //processing starts here
           if(input_string.split("_").length==3) {
               var check_flag=false
                   switch (input_string.split("_")[1]){
                       case 'allRole' :        
                          // console.log($(input_string))
                           if($(this)[0].checked) { check_flag=true }
                           $.each($('.Role_'+input_string.split("_")[2]),function(i,item){
                                   $(item)[0].checked=check_flag
                           }) 
                           break;
                       case 'allAdd' :         
                            if($(this)[0].checked) { check_flag=true }
                            $.each($('.Add_'+input_string.split("_")[2]),function(i,item){
                                $(item)[0].checked=check_flag
                            }) 
                            break;  
                       case 'allEdit' :        
                            if($(this)[0].checked) { check_flag=true }
                            $.each($('.Edit_'+input_string.split("_")[2]),function(i,item){
                                   $(item)[0].checked=check_flag
                            }) 
                            break; 
                       case 'allDelete' :      
                            if($(this)[0].checked){ check_flag=true }
                            $.each($('.Delete_'+input_string.split("_")[2]),function(i,item){
                                   $(item)[0].checked=check_flag
                            }) 
                            break;
                       default:
                       break;
                   }
           }
   });
</script>