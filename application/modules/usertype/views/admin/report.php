<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">User Type Roles Management</h3>
        <span class="pull-right header-btn"><a href="<?php echo base_url(); ?>admin/usertype/record/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a></span>
    </div>
    
    <div class="clearfix"></div>
    <div class="">
		<div class="box-body table-responsive">
        	<table class="table table-bordered table-striped">
				<thead class="bg-primary">
					<tr>
						<th>SN</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody style="text-align:left;">
					<?php $i= $offset+1; if (!empty($list)) {
						foreach ($list as $value) { ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td class="left-align"><?php echo $value->Description; ?></td>
								<td>
									<a title="Edit" href = "<?=base_url()."admin/usertype/record/".$this->Encryption->encode($value->UserTypeId); ?>"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;|&nbsp;</a>
                          			<a title="Delete" onclick="return confirm('Are You Sure ???');" href="<?php echo base_url().'admin/usertype/record/deactivate/'.$this->Encryption->encode($value->UserTypeId); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
					<?php $i++; }
					} else { ?>
						<tr>
							<td colspan="6"><?php echo"No Records Avaliable" ; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php echo $pages; ?>
        </div>
    </div>
</div>