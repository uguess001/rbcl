<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Career</h3>
    </div>

    <div class="box-body">
        <div class="row">

        <form method="POST" action ="#" enctype="multipart/form-data" onsubmit="return validateFileExtension(this.image)" >
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                     <div class="form-group">
                        <label>English Title</label><input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control"><?php echo form_error('title_en'); ?>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nepali Title</label><input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control"><?php echo form_error('title_np'); ?>
                    </div>
                    
                </div>
            </div>
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
        </div>

        <div class="col-md-3">
            <div class="form-group">              
                <label for="textfield" class="control-label">Image Size: 600px×600px <p style="color: red">(Please upload gif,png,jpeg,jpg file only)</p>
                </label>
                <div class="col-md-12 text-center" >

                    

                    <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                    <button class="btn btn-danger" id="img-remove" type="button"> Remove Image</button>
                    <?php } ?>
                    <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                            <img src="<?php echo $record->image ?>" id="prev_img">
                            <?php }else{?>

                    <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" id="prev_img" alt="No-Image">
                    <?php   } ?>

                    <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&field_id=image' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Insert Image</a>
                    <!-- 
                    <img src="assets/img/download.png" alt="" title="" id="prev_img" /> -->
                    <input type="hidden" value="<?=isset($record->image)?$record->image:''?>" class="form-control" name="image" id="image">
                </div>
                <div class="fileupload fileupload-new" data-provides="fileupload" style="display: none">

                    <div class="fileupload-new thumbnail" style="width: 200px; height: 80px;">

                        <!-- <img src="<?php echo isset($record->image) ? base_url() . 'uploads/news/' . $record->image: base_url()."application/resources/admin/img/noimage.png"; ?>" /> -->
                         <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                            <img src="<?php echo base_url().'uploads/news/'.$record->image ?>" id="img_src">
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
                       
            <div class="form-group" style="">
                    <label for="userfile_id" class="control-label">File <p style="color: red">(Please upload gif,png,jpeg,jpg,txt,docs,pdf file only) & filename should be in english.</p></label>
                    <div class="controls">
                        <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=2&field_id=file' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Select  File  <i class="fa fa-file"></i></a>
                        <input type="text" class="form-control" id="file" name="file" value="<?php echo isset($record->file) ? $record->file : ''; ?>" readonly>
                        <!-- <input class="text-input small-input" type="file" id="userfile_id" name="userfile" /> -->
                        <?php if (isset($record->file) && strlen($record->file)>0) { ?>
                    <div id="<?php echo $record->id;?>">   
                     <a target="_blank" href="<?php echo $record->file; ?>" style="margin-top:10px;" class="btn btn-info">
                         View  <i class="fa fa-check-circle"></i>
                         </a>
                    <a onClick="return confirm('Are you sure you want to delete')" href="#" class="fa fa-remove removed_doc btn btn-danger" id="<?php echo $record->id;?>"  rel="tooltip" title="Delete File" style="margin-top: 10px;"><i class="icon-remove"></i></a>
                    </div>
                             <?php } else{  ?>
                           No current File
                    <?php } ?>
                            <input type="hidden" name="oldfile" id="file" value="<?php echo isset($record->file) ? $record->file : ''; ?>" />
                        </div>     
            </div>


            <div class="form-group">
                <label>Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
                <input type = "hidden" name = "process" value = "true" >
                <button type = "submit" class="btn btn-primary" >Submit</button>
                </div>
            
        </div>

        <div class="clearfix"></div>
        </form>
    </div>
</div>
<script  type="text/javascript">
$('.removed_doc').click(function () {
//alert(this.id);
var remove_div =this.id;
$.ajax({
url: '<?php echo base_url(); ?>' + 'admin/resources/delete_resources_file',
data: {file_id: this.id,
     '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
},
dataType: 'json',
type: 'post',
contentType: "application/x-www-form-urlencoded",
success: function (response) {
window.location.reload();
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