<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">NEWS</h3>
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
                            <label>English Title</label><input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control" >
                            <?php echo form_error('title_en'); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nepali Title</label><input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control" >
                            <?php echo form_error('title_np'); ?>
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
            </div>

            <div class="col-md-3" >

                <div class="form-group">
                    <label>Type</label>
                        <select class="form-control" name="type" id="type" required >
                            <option>--Select--</option>
                            <option value="1" <?php echo ( (isset($record->type) && $record->type == '1') || ( isset($_POST['type']) && $_POST['type'] == '1' )) ? 'selected' : '' ?>>News</option>

                            <option value="2" <?php echo ( (isset($record->type) && $record->type == '2') || ( isset($_POST['type']) && $_POST['type'] == '2' )) ? 'selected' : '' ?>>Notice</option>
                        </select>
                </div>

                <div class="form-group">              
                    <label for="textfield" class="control-label">Image Size: 800 × 583 pixels
                     <p style="color: red">(Please upload png,jpeg,jpg file only)</p>
                     </label>

                    <div class="col-md-12 text-center" >
                        <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                        <button class="btn btn-danger" id="img-remove" type="button"> Remove Image</button>
                        <?php } ?>
                        <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                        <img src="<?php echo $record->image ?>" id="prev_img" class="fancybox">
                            <?php }else{?>
                        <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" id="prev_img" alt="No-Image">
                         <?php   } ?>

                          <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&field_id=image' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Insert Image</a>
                         <!-- 
                        <img src="assets/img/download.png" alt="" title="" id="prev_img" /> -->
                        <input type="hidden" value="<?=isset($record->image)?$record->image:''?>" class="form-control" name="image" id="image">
                    </div>

                    <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? $record->image: ''; ?>" />
                </div>

                   <div class="form-group" style="">
                            <label for="userfile_id" class="control-label">File 
                                <p style="color: red">
                                    (Please upload gif,png,jpeg,jpg,txt,docs,pdf file only)
                                </p>
                            </label>

                            <div class="controls">
                                <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=2&field_id=file' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Select  File  <i class="fa fa-file"></i> </a>
                                <input type="text" class="form-control" id="file" name="file" value="<?php echo isset($record->file) ? $record->file : ''; ?>" readonly>
                                <!-- <input class="text-input small-input" type="file" id="userfile_id" name="userfile" /> -->

                                <?php if (isset($record->file) && strlen($record->file)>0) { ?>
                                <div id="<?php echo $record->id;?>">   
                                     <a target="_blank" href="<?php echo $record->file; ?>" style="margin-top: 10px;" class="btn btn-info"> View  <i class="fa fa-check-circle"></i>
                                    </a> 

                                     <a onClick="return confirm('Are you sure you want to delete')" href="#" class="fa fa-remove removed_doc btn btn-danger pull-right" id="<?php echo $record->id;?>"  rel="tooltip" title="Delete File" style="margin-top: 10px;"> <i class="icon-remove"></i>  Remove</a>
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
        
            <div class="clearfix"></div>

               <!--  <div class="form-group">
                    <label>Show news in front page</label>
                    <input type="checkbox" name="shownews" value="1" <?php echo isset($record->shownews)&& !empty($record->shownews) ? 'checked' : ''; ?>><br>
                </div>
          
                <div class="form-group">
                    <label>Show news in Latest Update</label>
                    <input type="checkbox" name="new_update" value="1" <?php echo isset($record->new_update)&& !empty($record->new_update) ? 'checked' : ''; ?>><br>
                </div> -->

            </form> 
        </div>    
    </div>
</div>


<script  type="text/javascript">
$('.removed_doc').click(function () {
var remove_div =this.id; 
$.ajax({
url: '<?php echo base_url(); ?>' + 'admin/news/delete_news_file',
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