<?php
    /**
     * Show Flash Data
     */
    $_flash_msg = $this->session->flashdata('_flash_msg');
    if (!empty($_flash_msg)) {
        ?>
        <div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
            <a class="close" data-dismiss="alert">×</a>
            <?php echo $_flash_msg['_message']; ?>
        </div>

        <?php
    }
   
    ?>
<div class="row">


<div class="col-md-12">
<div class="box">



<div class="box-header with-border" >
  <h3 class="box-title"></i>User Type Roles Management</h3>
  <span class="pull-right header-btn">
		 <a href="<?php echo base_url(); ?>admin/usertype/record/create" class="btn btn-primary"><i class="icon-plus-sign"></i> Add USERTYPE Detail</a> 
		 </span>
 
</div>
<div class="box-body">

<form method="POST" action ="#" >
<input type = "hidden" name = "UserTypeId" id = "UserTypeId" value = "<?php echo isset($_POST['UserTypeId'])?$_POST['UserTypeId']:(isset($record->UserTypeId)?$record->UserTypeId:'') ;?>" class="form-control">
<div class="col-md-12">
	
<div class="col-md-3">
	<label>Description</label><input type = "text" name = "Description" id = "Description" value = "<?php echo isset($_POST['Description'])?$_POST['Description']:(isset($record->Description)?$record->Description:'') ;?>" class="form-control">
</div>

<!-- <div class="col-md-3">
<label>Menu</label>
</div> -->
<br>
<div class="clearfix"></div>


<div class="col-md-8">
            <div class="panel-group" id="accordion">


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-th">
                            </span>Componenet 1</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                            <tbody>
                            	<tr>
                            	<th>Role</th>
                            	<th>Add</th>
                            	<th>Edit</th>
                            	<th>Delete</th>
                            	<th>Model Heading</th>
                            	</tr>
                            </tbody>

                            <?php 
                           
                            foreach ($com1 as $r) { 

									if(isset($record->UserTypeId) &&  findID($r->id,$roles)) { ?>
									<tr> 
										<td widt="15"><input type="checkbox" name ="menu[]" checked = checked value="<?=$r->id?>">
										<td widt="15"><input type="checkbox" name ="statusAdd[]" checked = checked value="1">
										<td widt="15"><input type="checkbox" name ="statusEdit[]" checked = checked value="1">
										<td widt="15"><input type="checkbox" name ="stausDelete[]" checked = checked value="1">
										<td style="text-align:left;"> <?=$r->name?></td>
									</tr>
									<?php } else { ?>
									<tr> 
									<td widt="15"><input type="checkbox" name ="menu[]"   value="<?=$r->id?>">
										<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="1">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="1">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="1">
									<td  style="text-align:left;"> <label for="menu[]" ><?=$r->name?></label><br>
									<?php
									}  } 
									?>
                               
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span>Component 2</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                             <tbody>
                            	<tr>
                            	<th>Role</th>
                            	<th>Add</th>
                            	<th>Edit</th>
                            	<th>Delete</th>
                            	<th>Model Heading</th>
                            	</tr>
                            </tbody>
                                 <?php 
                            foreach ($com2 as $r) { 

									if(isset($record->UserTypeId) &&  findID($r->id,$roles)) { ?>
									<tr> 
										<td widt="15"><input type="checkbox" name ="menu[]" checked = checked value="<?=$r->id?>">
										<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="">
										<td > <?=$r->name?></td>
									</tr>
									<?php } else { ?>
									<tr> 
									<td widt="15"><input type="checkbox" name ="menu[]"   value="<?=$r->id?>">
									<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="1">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="1">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="1">
								
									<td  style="text-align:left;"> <label for="menu[]" ><?=$r->name?></label><br>
									<?php
									}  } 

									?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-th">
                            </span>Component 3</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse"> 
                        <div class="panel-body">
                            <table class="table">
                              <tbody>
                            	<tr>
                            	<th>Role</th>
                            	<th>Add</th>
                            	<th>Edit</th>
                            	<th>Delete</th>
                            	<th>Model Heading</th>
                            	</tr>
                            </tbody>
                                 <?php 
                            foreach ($com3 as $r) { 

									if(isset($record->UserTypeId) &&  findID($r->id,$roles)) { ?>
									<tr> 
										<td widt="15"><input type="checkbox" name ="menu[]" checked = checked value="<?=$r->id?>">
										<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="">
										<td > <?=$r->name?></td>
									</tr>
									<?php } else { ?>
									<tr> 
									<td widt="15"><input type="checkbox" name ="menu[]"   value="<?=$r->id?>">
									<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="1">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="1">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="1">
									<td  style="text-align:left;"> <label for="menu[]" ><?=$r->name?></label><br>
									<?php
									}  } 

									?>
                            </table>
                        </div>
                    </div>
                </div>




                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#Grantee"><span class="glyphicon glyphicon-th">
                            </span>Grantee Registration</a>
                        </h4>
                    </div>
                    <div id="Grantee" class="panel-collapse collapse"> 
                        <div class="panel-body">
                            <table class="table">
                              <tbody>
                            	<tr>
                            	<th>Role</th>
                            	<th>Add</th>
                            	<th>Edit</th>
                            	<th>Delete</th>
                            	<th>Model Heading</th>
                            	</tr>
                            </tbody>
                                 <?php 
                            foreach ($GranteeReg as $r) { 

									if(isset($record->UserTypeId) &&  findID($r->id,$roles)) { ?>
									<tr> 
										<td widt="15"><input type="checkbox" name ="menu[]" checked = checked value="<?=$r->id?>">
										<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="">
										<td > <?=$r->name?></td>
									</tr>
									<?php } else { ?>
									<tr> 
									<td widt="15"><input type="checkbox" name ="menu[]"   value="<?=$r->id?>">
									<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="1">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="1">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="1">
									<td  style="text-align:left;"> <label for="menu[]" ><?=$r->name?></label><br>
									<?php
									}  } 

									?>
                            </table>
                        </div>
                    </div>
                </div>










                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#Monitoring"><span class="glyphicon glyphicon-file">
                            </span>Monitoring Reports</a>
                        </h4>
                    </div>
                    <div id="Monitoring" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                              <tbody>
                            	<tr>
                            	<th>Role</th>
                            	<th>Add</th>
                            	<th>Edit</th>
                            	<th>Delete</th>
                            	<th>Model Heading</th>
                            	</tr>
                            </tbody>
                                 <?php 
                            foreach ($MonitoringReport as $r) { 

									if(isset($record->UserTypeId) &&  findID($r->id,$roles)) { ?>
									<tr> 
										<td widt="15"><input type="checkbox" name ="menu[]" checked = checked value="<?=$r->id?>">
										<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="">
										<td > <?=$r->name?></td>
									</tr>
									<?php } else { ?>
									<tr> 
									<td widt="15"><input type="checkbox" name ="menu[]"   value="<?=$r->id?>">
									<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="1">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="1">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="1">
									<td  style="text-align:left;"> <label for="menu[]" ><?=$r->name?></label><br>
									<?php
									}  } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#User"><span class="glyphicon glyphicon-user">
                            </span>User Management</a>
                        </h4>
                    </div>
                    <div id="User" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                              <tbody>
                            	<tr>
                            	<th>Role</th>
                            	<th>Add</th>
                            	<th>Edit</th>
                            	<th>Delete</th>
                            	<th>Model Heading</th>
                            	</tr>
                            </tbody>
                                 <?php 
                            foreach ($UserMgnt as $r) { 

									if(isset($record->UserTypeId) &&  findID($r->id,$roles)) { ?>
									<tr> 
										<td widt="15"><input type="checkbox" name ="menu[]" checked = checked value="<?=$r->id?>">
										<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="">
										<td > <?=$r->name?></td>
									</tr>
									<?php } else { ?>
									<tr> 
									<td widt="15"><input type="checkbox" name ="menu[]"   value="<?=$r->id?>">
									<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="1">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="1">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="1">
									<td  style="text-align:left;"> <label for="menu[]" ><?=$r->name?></label><br>
									<?php
									}  } ?>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span>Activities Log</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">

                              <tbody>
                            	<tr>
                            	<th>Role</th>
                            	<th>Add</th>
                            	<th>Edit</th>
                            	<th>Delete</th>
                            	<th>Model Heading</th>
                            	</tr>
                            </tbody>
                                 <?php 
                            foreach ($ActiveLog as $r) { 
                            	//print_r($r); 

									if(isset($record->UserTypeId) &&  findID($r->id,$roles)) { ?>
									<tr> 
										<td widt="15"><input type="checkbox" name ="menu[]" checked = checked value="<?=$r->id?>">
										<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="">
										<td > <?=$r->name?></td>
									</tr>
									<?php } else { ?>
									<tr> 
									<td widt="15"><input type="checkbox" name ="menu[]"   value="<?=$r->id?>">
									<td widt="15"><input type="checkbox" name ="statusAdd[]"  value="1">
										<td widt="15"><input type="checkbox" name ="statusEdit[]"  value="1">
										<td widt="15"><input type="checkbox" name ="stausDelete[]"  value="1">
									<td  style="text-align:left;"> <label for="menu[]" ><?=$r->name?></label><br>
									<?php
									}  } ?>
                            </table>
                        </div>
                    </div>
                </div>







            </div>
       
<style>
	
	body{margin-top:50px;}
.glyphicon { margin-right:10px; }
.panel-body { padding:0px; }
.panel-body table tr td { padding-left: 15px }
.panel-body .table {margin-bottom: 0px; }
</style>





<br>
<div class="col-md-6">
	<table class="table table-bordered table-striped">
<?php 
  

function findRespectiveMenuByParentID ($menu,$paren_id){
	
	$data=array();
	
	foreach ($menu as $key => $ValueM) {
		
			if($ValueM->parent_id==$paren_id){

				$data['name'][]=$ValueM->name;
				$data['id'][]=$ValueM->id;
			}
		
	}
	return $data; 

}

//echo "<pre>"; print_r(findRespectiveMenuByParentID ($menu,95)); 

foreach (findRespectiveMenuByParentID ($menu,95) as $key => $ddddd) {
	//print_r($ddddd[1]); exit(); 
}


//exit();

	/*1 com1 7 com2 8 GranteeReg  9 UserMgnt  32 com3  95 ActiveLog  203 MonitoringReport*/
/*print_r(findRespectiveMenuByParentID(1)); exit(); 
function findRespectiveMenuByParentID ($paren_id){
	$parent_id=array(1,8,7,9,32,95,203);
	$data=array();
	$MenuData=$this->db->query("select * from menu")->result();
	foreach ($menu as $key => $value) {
		if($value->parent_id==$parent_id){
			$data['name']=$value->name;
			$data['id']=$value->id;
		}
	}
	return $data; 

}*/


function findID($id,$assignment) {

	$match = false;
	if($assignment) {
	foreach(explode(',', $assignment->MenuID) as $a)	{
		if($a == $id) {
			$match = true;
			break;
		}
	}
}
	return $match;
}


/*//echo "<pre>"; print_r($menu); exit(); 

foreach ($menu as $r) { 


	if(isset($record->UserTypeId) &&  findID($r->id,$roles)) {

	?>
<tr> 
<td widt="15"><input type="checkbox" name ="menu[]" checked = checked value="<?=$r->id?>">
<!-- <td><?=$r->id?> --><br>
<td  > <?=$r->name?>



<?php } else {

 ?>
<tr> 
<td widt="15"><input type="checkbox" name ="menu[]"   value="<?=$r->id?>">
	
<!-- <td><?=$r->id?> -->
<td  style="text-align:left;"> <label for="menu[]" ><?=$r->name?></label><br>

	<?php
	} } */

	?>
	

</table>
<input type = "hidden" name = "process" value = "true" >
<button type="submit" class="btn btn-primary">Submit</button>

</div>




</div>
</form>
<div class="clearfix"></div>
<div class="gap"></div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>