
<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">ACHIEVEMENTS</h3>
</div>
<div class="box-body">
<form method="POST" action ="#" enctype="multipart/form-data" onsubmit="return validateFileExtension(this.image)">
<input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>English Title</label><input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control" >
<?php echo form_error('title_en'); ?>
</div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
<div class="form-group">
<label>Nepali Title</label><input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control" >
<?php echo form_error('title_np'); ?>
</div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
<div class="form-group">              
        <label for="textfield" class="control-label">Image Size: 600px×600px <p style="color: red">(Please upload gif,png,jpeg,jpg file only)</p></label>
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 80px;">
            <img src="<?php echo isset($record->image) ? base_url() . 'uploads/achievements/' . $record->image: base_url()."application/resources/admin/img/noimage.PNG"; ?>" />
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">         
            </div>             
            <div>
                <span class="btn btn-file"><span class="fileupload-new btn btn-primary">Select image</span>
                <span class="fileupload-exists btn btn-primary">Change</span> <input class="text-input small-input" type="file" id="image_id" name="image" /></span>
                <a href="#" class="btn fileupload-exists btn btn-danger" data-dismiss="fileupload">Remove</a>
            </div>                              
        </div>
            <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? $record->image: 'No Image'; ?>" />
        </div>
</div>
<div class="clearfix"></div>

<div class="form-group">
    <div class="col-md-4">
    <label for="userfile_id" class="control-label">File <p style="color: red">(Please upload gif,png,jpeg,jpg,txt,docs,pdf file only)</p></label>
    <div class="controls">
        <input class="text-input small-input" type="file" id="userfile_id" name="userfile" />
        <?php if (isset($record->file) && strlen($record->file)>0) { ?>
<div id="<?php echo $record->id;?>">   
 <a href="<?php echo base_url() . 'uploads/achievements/' . $record->file; ?>" style="margin-left: 100px;">
     Current File  <?php echo '<strong/>' . $record->file; ?></a> |

<a href="#" class="fa fa-remove removed_doc" id="<?php echo $record->id;?>"  rel="tooltip" title="Delete File" style="top:0px !important; left: 5px; color: red"><i class="icon-remove"></i></a>
</div>
         <?php } else{  ?>
       No current File

<?php } ?>
        <input type="hidden" name="old_document" id="old_document" value="<?php echo isset($record->file) ? $record->file : ''; ?>" />
        
    </div>     
    </div>                                                                           
</div>
<div class="clearfix"></div>
<div class="col-md-12">
<div class="form-group">
<label>English Description</label>
<textarea name = "description_en" id = "description_en" class="form-control ckeditor"><?php echo isset($_POST['description_en'])?$_POST['description_en']:(isset($record->description_en)?$record->description_en:'') ;?></textarea>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label>Nepali Description</label>
<textarea name = "description_np" id = "description_np" class="form-control ckeditor"><?php echo isset($_POST['description_np'])?$_POST['description_np']:(isset($record->description_np)?$record->description_np:'') ;?></textarea>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status" id="status">
    <option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>
    <option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
</select>
</div>
</div>
</div>
<div class="clearfix"></div>
<input type = "hidden" name = "process" value = "true" >
<button type = "submit" class="btn btn-primary" >Submit</button>
</form> 
</div>
</div>
</div>
</div>


<script  type="text/javascript">
$('.removed_doc').click(function () {
//alert(this.id);
var remove_div =this.id; 
$.ajax({

url: '<?php echo base_url(); ?>' + 'admin/achievements/delete_achievements_file',

data: {file_id: this.id}, 

dataType: 'json',

type: 'post',

contentType: "application/x-www-form-urlencoded",

success: function (response) {

    //alert(remove_div); 

//document.getElementById(remove_div).remove();

document.getElementById(remove_div).remove();

}

});

});

</script>

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