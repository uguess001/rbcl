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

 <h3 class="box-title"> Slider</h3> 

	 <span class="pull-right header-btn"><a href="<?php echo base_url(); ?>admin/slider/record/create" class="btn btn-primary add"><i class="fa fa-plus"></i> Add </a> </span> 

	  <span class="pull-right slider-btn" style="margin-right: 10px;"><a href="<?php echo base_url(); ?>admin/slider/groupHierarchy" class="btn btn-danger add"> Manage Slider Hierarchy </a> </span>
 
</div> 

 <div class="box-body table-responsive"> 

<table class="table table-hover table-bordered  table-condensed table-striped">

 <thead class="bg bg-primary"> <tr><th>SN</th>

<th>Title</th>

<!-- <th>Image</th> -->

<th>Action</th> </tr> </thead> <tbody>

<?php

$counter=1;

foreach ($records as $key => $value) { ?><tr><td><?=$counter++ ?></td>

<td><?=$value->title_en ?></td>

<!-- <td><?=$value->image ?></td> -->

<td> 

	<a href = "<?=base_url()."admin/slider/record/".$this->Encryption->encode($value->id )?>"><i class="fa fa-edit"></i></a> |

	<a onClick="return confirm('Are you sure you want to delete')" href = "<?=base_url()."admin/slider/delete/".$this->Encryption->encode($value->id )?>"><i class="fa fa-trash"></i></a>

</td><?php } ?></tbody></table>

</div>

</div>

</div>