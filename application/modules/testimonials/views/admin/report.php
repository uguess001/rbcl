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
 <h3 class="box-title"> Testimonials</h3> 
 <span class="pull-right header-btn"><a href="<?php echo base_url(); ?>admin/testimonials/record/create" class="btn btn-primary add"><i class="fa fa-plus"></i> Add </a> </span>
</div>
  <div class=" box-body table-responsive"> 
 <table class="table table-hover table-bordered table-condensed table-striped dataTable"> 
 <thead class="bg bg-primary"> <tr><th>S.N</th>
<th>Name</th>
<th>Description</th>
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
	?><tr><td><?=$counter++ ?></td>
<td><?=$value->name ?></td>
<td><?=$value->description ?></td>
<td><?=$status ?></td>
<td> 
	<a href = "<?=base_url()."admin/testimonials/record/".$this->Encryption->encode($value->id )?>"><i class="fa fa-edit"></i></a> |
	<a onClick="return confirm('Are you sure you want to delete')" href = "<?=base_url()."admin/testimonials/delete/".$this->Encryption->encode($value->id )?>"><i class="fa fa-trash"></i></a>
</td><?php } ?></tbody></table>
</div>
</div>
</div>