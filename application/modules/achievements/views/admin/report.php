


<div class="box"> 
<div class=""> 
<div class="box-header with-border"> 
 <h3 class="box-title"> ACHIEVES</h3> 
 <span class="pull-right header-btn"><a href="<?php echo base_url(); ?>admin/achievements/record/create" class="btn btn-primary add"><i class=""></i> Add </a> </span> </div>
  <div class="box-body table-responsive"> 
 <table class="table table-hover table-bordered table-striped"> 
 <thead class="bg bg-primary"> <tr><th>S.N</th>
<th>English Title</th>
<th>Nepali Title</th>
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
<td><?=$value->title_en?></td>
<td><?=$value->title_np ?></td>
<td><?=$status ?></td>
<td> 
	<a href = "<?=base_url()."admin/achievements/record/".$this->Encryption->encode($value->id )?>"><i class="fa fa-edit"></i></a> |
	<a onClick="return confirm('Are you sure you want to delete')" href = "<?=base_url()."admin/achievements/delete/".$this->Encryption->encode($value->id )?>"><i class="fa fa-trash"></i></a>
</td><?php } ?></tbody></table>
</div>
</div>
</div>