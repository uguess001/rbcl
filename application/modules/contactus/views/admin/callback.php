<div class="box">
	<div class=" box-header with-border">
		<h3 class="box-title"> Request For Call Back </h3> <span class="pull-right header-btn">
			<!-- <a href="<?php echo base_url(); ?>admin/contactus/record/create" class="add btn btn-primary "><i class="fa fa-plus"></i> Add</a> -->
		</span> </div>
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped">
					<thead class="bg bg-primary">
						<tr><th>SN</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Action</th> </tr> </thead> <tbody>
						<?php
						$counter=1;
						foreach ($records as $key => $value) {
						?>
						<tr><td><?=$counter++ ?></td>
						<td><?=$value->name ?></td>
						<td><?=$value->phone ?></td>
						<td><?=$value->address ?></td>
						<td>
							<a onClick="return confirm('Are you sure you want to delete')" href = "<?=base_url()."admin/contactus/deteleCallback/".$this->Encryption->encode($value->id )?>"><i class="fa fa-trash"></i></a>
						</td><?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>