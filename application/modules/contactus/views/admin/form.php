<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Add/Edit Contact Information</h3>
        <span class="pull-right">
            <a href="<?php echo base_url(); ?>admin/contactus" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> View List</a>
        </span>
	</div>
	<div class="box-body">
		<form method="POST" action ="#">
			<div class="col-md-9">
				<h4><strong>Contact Information</strong></h4>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Address English </label>
							<input type="text" name="address_en" id="address_en" value="<?php echo isset($_POST['address_en'])?$_POST['address_en']:(isset($record->address_en)?$record->address_en:'') ;?>" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Address Nepali</label>
							<input type="text" name="address_np" id="address_np" value="<?php echo isset($_POST['address_np'])?$_POST['address_np']:(isset($record->address_np)?$record->address_np:'') ;?>" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" id="phone" value="<?php echo isset($_POST['phone'])?$_POST['phone']:(isset($record->phone)?$record->phone:'') ;?>" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Fax</label>
							<input type="text" name="fax" id="fax" value="<?php echo isset($_POST['fax'])?$_POST['fax']:(isset($record->fax)?$record->fax:'') ;?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" id="email" value="<?php echo isset($_POST['email'])?$_POST['email']:(isset($record->email)?$record->email:'') ;?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Longitude</label>
							<input type="text" name="longitude" id="longitude" value="<?php echo isset($_POST['longitude'])?$_POST['longitude']:(isset($record->longitude)?$record->longitude:'') ;?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Latitude</label>
							<input type="text" name="latitude" id="latitude" value="<?php echo isset($_POST['latitude'])?$_POST['latitude']:(isset($record->latitude)?$record->latitude:'') ;?>" class="form-control">
						</div>
					</div>
				</div>
				<?php if(isset($record->head_office) && $record->head_office == '1'){ ?>
					<h4><strong>Main Branch<strong></h4>
					<hr>
					<div class="form-group">
						<label>Location Map</label>
						<!-- <input type="text" name="map" id="map" value="<?php // echo isset($_POST['map'])?$_POST['map']:(isset($record->map)?$record->map:'') ;?>" class="form-control"> -->
						<textarea name= "map" id="map" placeholder="Place your map location here" class="form-control" rows="8"><?php echo isset($_POST['map'])?$_POST['map']:(isset($record->map)?$record->map:'') ;?></textarea>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Facebook</label>
								<input type="text" name="facebook" id="facebook" value="<?php echo isset($_POST['facebook'])?$_POST['facebook']:(isset($record->facebook)?$record->facebook:'') ;?>" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Twitter</label>
								<input type="text" name="twitter" id="twitter" value="<?php echo isset($_POST['twitter'])?$_POST['twitter']:(isset($record->twitter)?$record->twitter:'') ;?>" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Googleplus</label>
								<input type="text" name="googleplus" id="googleplus" value="<?php echo isset($_POST['googleplus'])?$_POST['googleplus']:(isset($record->googleplus)?$record->googleplus:'') ;?>" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Feed</label>
								<input type="text" name="feed" id="feed" value="<?php echo isset($_POST['feed'])?$_POST['feed']:(isset($record->feed)?$record->feed:'') ;?>" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Youtube</label>
								<input type="text" name="youtube" id="youtube" value="<?php echo isset($_POST['youtube'])?$_POST['youtube']:(isset($record->youtube)?$record->youtube:'') ;?>" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" name="instagram" id="instagram" value="<?php echo isset($_POST['instagram'])?$_POST['instagram']:(isset($record->instagram)?$record->instagram:'') ;?>" class="form-control">
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-3">
				<?php if(isset($record->head_office) && $record->head_office == '1'){ ?>
					<input type="hidden" name="head_office" value="1">
				<?php } else{ ?>
					<div class="form-group">
						<label>Select Branch Type</label>
						<select class="form-control" name="head_office">
							<?php if(!empty($branchtypelist)) {
								foreach ($branchtypelist as $k => $val) { ?>
									<option value="<?php echo $val->id ?>" 
										<?php echo (isset($record->head_office) && $record->head_office == $val->id)?'selected':'' ?>>
										<?php echo $val->name ?></option>
							<?php } } ?>
						</select>
					</div>
				<?php } ?>
				<h4><strong>Contact Person</strong></h4>
				<hr>
				<div class="form-group">
					<label>Manager's Name</label>
					<input type="text" name="manager_name" id="manager_name" value="<?php echo isset($_POST['manager_name'])?$_POST['manager_name']:(isset($record->manager_name)?$record->manager_name:'') ;?>" class="form-control">
				</div>
				<div class="form-group">
					<label>Manager's Duty(Position) </label>
					<input type="text" name="position" id="position" value="<?php echo isset($_POST['position'])?$_POST['position']:(isset($record->position)?$record->position:'') ;?>" class="form-control">
				</div>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status" id="status">
						<option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>
						<option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type="hidden" name="id" id="id" value="<?php echo (isset($record->id)?$record->id:'');?>">
					<input type="hidden" name="process" value="true">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>