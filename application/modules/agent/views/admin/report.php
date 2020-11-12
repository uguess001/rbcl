<?php
/**  Show Flash Data  */
$_flash_msg = $this->session->flashdata('_flash_msg');
if (!empty($_flash_msg)) { ?>
    <div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo $_flash_msg['_message']; ?>
    </div>
<?php  }  ?>
<div class="box"> 
<div class=""> 
<div class="box-header with-border"> 
 <h3 class="box-title"> Agents</h3> 
 <span class="pull-right header-btn"><a href="<?php echo base_url(); ?>admin/agent/record/create" class="btn btn-primary add"><i class="fa fa-plus"></i> Add </a> </span> </div>







<div class="row container-fluid">

    <form action="agent/uploadExcel" method="POST" enctype="multipart/form-data">
        <div class="col-lg-9">
            <div class="offset-lg-6 pull-right">
             <span class="text-bold text-danger">
             Sample Excel Format <a href="<?php echo base_url().'/application/resources/admin/img/surveyor.png' ?>" target="_blank">here</a>
             <p>Please name your Excel sheet as Sheet1</p>
         </span>
         </div>
        </div>
      <div class=" col-lg-3 form-group pull-right">
        <label for="file">Select Excel File</label>
        <input type="file" accept=".xls,.xlsx"  name="userfile" class="form-control-file" id="file" onchange="return fileValidation()" required><br>
         <button type="submit" class="btn btn-primary">Upload</button>

        
      </div>
      <div class="clearfix"></div>
    </form>
</div>



 
  <div class=" box-body table-responsive"> 
 <table class="table table-hover table-bordered table-striped"> 
 <thead class="bg bg-primary"> <tr><th>S.N</th>
<th>English Title</th>
<th>Nepali Title</th>
<th>Agent Code</th>
<th>Status</th>
<th>Action</th> </tr> </thead> <tbody>
<?php
$counter=1;
foreach ($records as $key => $value) { 

    $status = $value->status;
    switch ($status):
        case(1):
            $status_style = 'label-success';
            $status       = 'Active';
            break;
        default :
            $status_style = 'label-danger';
            $status       = 'Inactive';
            break;
    endswitch;
	?>
    <tr>
        <td><?=$counter++ ?></td>
        <td><?=$value->title_en ?></td>
        <td><?=$value->title_np ?></td>
        <td><?=$value->code ?></td>
        <td><?=$status ?></td>
        <td> 
        	<a href = "<?=base_url()."admin/agent/record/".$this->Encryption->encode($value->id )?>"><i class="fa fa-edit"></i></a> |
        	<a  onClick="return confirm('Are you sure you want to delete')" href = "<?=base_url()."admin/agent/delete/".$this->Encryption->encode($value->id )?>"><i class="fa fa-trash"></i></a>
        </td><?php } ?>
    </tbody>
</table>
</div>
</div>
</div>