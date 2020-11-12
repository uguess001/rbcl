<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">STAFFS</h3>
            </div>
            <div class="box-body">
                <form method="POST" action ="#" enctype="multipart/form-data" onsubmit="return validateFileExtension(this.image)">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">
                    <div class="col-md-9">
                    	<div class="row">
                    		<div class="col-md-6">
                    			<div class="form-group">
	                                <label>Name</label><input type = "text" name = "name_en" id = "name_en" value = "<?php echo isset($_POST['name_en'])?$_POST['name_en']:(isset($record->name_en)?$record->name_en:'') ;?>" class="form-control">
	                                <?php echo form_error('name_en'); ?>
                            	</div>

                            	<div class="form-group">
	                                <label>Post</label><input type = "text" name = "post_en" id = "post_en" value = "<?php echo isset($_POST['post_en'])?$_POST['post_en']:(isset($record->post_en)?$record->post_en:'') ;?>" class="form-control">
	                            </div>

	                            <div class="form-group">
                                	<label>Designation</label>
	                                <select name = "designation_en" id = "designation_en" class="form-control">
	                                    <option value="0" <?php echo ( (isset($record->designation_en) && $record->designation_en == '0') || ( isset($_POST['designation_en']) && $_POST['designation_en'] == '0' )) ? 'selected' : '' ?>>Please Select Position</option>
	                                    <option value="1" <?php echo ( (isset($record->designation_en) && $record->designation_en == '1') || ( isset($_POST['designation_en']) && $_POST['designation_en'] == '1' )) ? 'selected' : '' ?>>Chairman</option>
	                                    <option value="2" <?php echo ( (isset($record->designation_en) && $record->designation_en == '2') || ( isset($_POST['designation_en']) && $_POST['designation_en'] == '2' )) ? 'selected' : '' ?>>Board Member</option>
	                                    <option value="3" <?php echo ( (isset($record->designation_en) && $record->designation_en == '3') || ( isset($_POST['designation_en']) && $_POST['designation_en'] == '3' )) ? 'selected' : '' ?>>Management Team</option>
	                                    <option value="4" <?php echo ( (isset($record->designation_en) && $record->designation_en == '4') || ( isset($_POST['designation_en']) && $_POST['designation_en'] == '4' )) ? 'selected' : '' ?>>Section Chief & Branch Manager</option>
	                                </select>
                            	</div>

                            	 <div class="form-group">
	                                <label>Phone</label><input type = "text" name = "phone" id = "phone" value = "<?php echo isset($_POST['phone'])?$_POST['phone']:(isset($record->phone)?$record->phone:'') ;?>" class="form-control">
	                            </div>

	                            <div class="form-group">
	                                <label>Status</label>
	                                <select class="form-control" name="status" id="status">
	                                    <option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>
	                                    <option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
	                                </select>
	                            </div>
                    			
                    		</div>

                    		<div class="col-md-6">
                    			<div class="form-group">
                                	<label>Name Nepali</label><input type = "text" name = "name_np" id = "name_np" value = "<?php echo isset($_POST['name_np'])?$_POST['name_np']:(isset($record->name_np)?$record->name_np:'') ;?>" class="form-control">
                                	<?php echo form_error('name_np'); ?>
                            	</div>

                            	<div class="form-group">
                               		 <label>Post nepali</label><input type = "text" name = "post_np" id = "post_np" value = "<?php echo isset($_POST['post_np'])?$_POST['post_np']:(isset($record->post_np)?$record->post_np:'') ;?>" class="form-control">
                            	</div>

                            	<div class="form-group">
	                                <label>Designation Nepali</label>
	                                <select name = "designation_np" id = "designation_np" class="form-control">
	                                    <option value="0" <?php echo ( (isset($record->designation_np) && $record->designation_np == '0') || ( isset($_POST['designation_np']) && $_POST['designation_np'] == '0' )) ? 'selected' : '' ?>>Please Select Position</option>
	                                    <option value="1" <?php echo ( (isset($record->designation_np) && $record->designation_np == '1') || ( isset($_POST['designation_np']) && $_POST['designation_np'] == '1' )) ? 'selected' : '' ?>>अध्यक्ष</option>
	                                    <option value="2" <?php echo ( (isset($record->designation_np) && $record->designation_np == '2') || ( isset($_POST['designation_np']) && $_POST['designation_np'] == '2' )) ? 'selected' : '' ?>>कार्यसमिति सदस्य</option>
	                                    <option value="3" <?php echo ( (isset($record->designation_np) && $record->designation_np == '3') || ( isset($_POST['designation_np']) && $_POST['designation_np'] == '3' )) ? 'selected' : '' ?>>प्रबंधन टोली</option>
	                                    <option value="4" <?php echo ( (isset($record->designation_np) && $record->designation_np == '4') || ( isset($_POST['designation_np']) && $_POST['designation_np'] == '4' )) ? 'selected' : '' ?>>सेक्शन प्रमुख र शाखा व्यवस्थापक</option>
	                                </select>
                            	</div>

                            	<div class="form-group">
	                                <label>Email</label><input type = "text" name = "email" id = "email" value = "<?php echo isset($_POST['email'])?$_POST['email']:(isset($record->email)?$record->email:'') ;?>" class="form-control">
	                            </div>
                    			
                    		</div>
                    	</div>
                    </div>


                    <div class="col-md-3">
                    	<div class="form-group">
                            <label for="textfield" class="control-label">Image Size: 600px×600px <p style="color: red">(Please upload gif,png,jpeg,jpg file only)</p>
                            </label>

                            <div class="col-md-12" >
                            	   <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&field_id=image' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Insert Image</a>
                            

                                <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                <img src="<?php echo $record->image ?>" id="prev_img">
                                <?php }else{?>
                                <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" id="prev_img" alt="No-Image">
                                <?php   } ?>


                                <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                <button class="btn btn-danger" id="img-remove" type="button"> Remove Image</button>
                                <?php } ?><!--
                                <img src="assets/img/download.png" alt="" title="" id="prev_img" /> -->
                                <input type="hidden" value="<?=isset($record->image)?$record->image:''?>" class="form-control" name="image" id="image">
                            </div>

                            <div class="fileupload fileupload-new" data-provides="fileupload" style="display: none">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 80px;">
                                    <!-- <img src="<?php echo isset($record->image) ? base_url() . 'uploads/news/' . $record->image: base_url()."application/resources/admin/img/noimage.png"; ?>" /> -->
                                    <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                    <img src="<?php echo $record->image ?>" id="img_src">
                                    <!-- <img src="<?php echo base_url().'uploads/news/'.$record->image ?>" id="img_src"> -->
                                    <?php } else { ?>
                                    <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" alt="No-Image">
                                    <?php } ?>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                </div>
                                <div>
                                    
                                    <!--  <span class="btn btn-file"><span class="fileupload-new btn btn-primary">Select image</span> -->
                                    <!-- <span class="fileupload-exists btn btn-primary">Change</span> <input class="text-input small-input" type="file" id="image_id" name="image" /></span>
                                    <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                    <a href="#" class="btn btn-danger" id="img-remove">Delete Image</a>
                                    <?php } ?> -->
                                    <!-- <a href="#" class="btn fileupload-exists btn btn-danger" data-dismiss="fileupload">Remove</a> -->
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? $record->image: ''; ?>" />
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name = "description_en" id = "description_en" class="form-control ckeditor"><?php echo isset($_POST['description_en'])?$_POST['description_en']:(isset($record->description_en)?$record->description_en:'') ;?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description Nepali</label>
                            <textarea name = "description_np" id = "description_np" class="form-control ckeditor"><?php echo isset($_POST['description_np'])?$_POST['description_np']:(isset($record->description_np)?$record->description_np:'') ;?></textarea>
                        </div>
                        <input type = "hidden" name = "process" value = "true" >
                	 	<button type = "submit" class="btn btn-primary" >Submit</button>
                    </div>
                        <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function validateFileExtension(image) {
if(image.value){
if(!/(\.gif|\.jpg|\.jpeg|\.png)$/i.test(image.value)) {
alert("Invalid image file type.");
image.form.reset();
image.focus();
return false;
}
}
return true;
} </script>
<script type="text/javascript">
$(document).ready(function() {
var noimagepath = "<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png'; ?>";
$('#img-remove').click(function(event) {
$('#old_document1').val('');
$('#img-remove').hide();
$('#img_src').prop('src', noimagepath);
});
$('.fileupload-new').click(function(event) {
$('#img-remove').hide();
});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
var noimagepath = "<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png'; ?>";
$('#img-remove').click(function(event) {
$('#image').val('');
$('#img-remove').hide();
$('#prev_img').prop('src', noimagepath);
});
$('.fileupload-new').click(function(event) {
$('#img-remove').hide();
});
});
</script>
<style>
.top{
margin: 100px;
}
img{
margin: 20px 0;
border: 8px double #CCC;
width: 100%;
}
.fancybox-inner{
min-height: 500px !important;
}
</style>