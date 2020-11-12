<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Testimonials</h3>
    </div>
    <div class="box-body">
    	<div class="row">
        <form method="POST" action ="#" enctype="multipart/form-data" onsubmit="return validateFileExtension(this.image)">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">

        	<div class="col-md-9">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="form-group">
                			<label>Name</label>
                			<input type = "text" name = "name" id = "name" value = "<?php echo isset($_POST['name'])?$_POST['name']:(isset($record->name)?$record->name:'') ;?>" class="form-control">
                			<?php echo form_error('name'); ?>
                		</div>
        			</div>
        			<div class="col-md-6">
        				<div class="form-group">
		                    <label>Status</label>
		                    <select class="form-control" name="status" id="status">
		                        <option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>

		                        <option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
		                    </select>
                		</div>
        			</div>
        			<div class="col-md-12">
		                <div class="form-group">
		                    <label>Description</label>

		                    <textarea name = "description" id = "description" class="form-control ckeditor"><?php echo isset($_POST['description'])?$_POST['description']:(isset($record->description)?$record->description:'') ;?>
		                    </textarea>
		                </div>
		                <input type = "hidden" name = "process" value = "true" >
        				<button type = "submit" class="btn btn-primary" >Submit</button>
		            </div>
        		</div>
        	</div>

        	<div class="col-md-3">
        		 <div class="form-group">              
                    <label for="textfield" class="control-label">Image Size: 600px×600px <p style="color: red">(Please upload gif,png,jpeg,jpg file only)</p></label>
                     <div class="col-md-12 text-center" >
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
	                    <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? $record->image: ''; ?>" />
                    </div>
            	</div>
        	</div>
        </form> 
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