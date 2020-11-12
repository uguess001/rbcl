<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">PAGES</h3>
            </div>

            <div class="box-body">

            <div class="row">

                <form method="POST" action ="#" enctype="multipart/form-data" onsubmit="return validateFileExtension(this.image)">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">

                <div class="col-md-9 col-lg-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>English Title</label><input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nepali Title</label><input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>English Description</label>
                                <textarea name = "description_en" id = "description_en" class="form-control tsm-editor"><?php echo isset($_POST['description_en'])?$_POST['description_en']:(isset($record->description_en)?$record->description_en:'') ;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nepali Description</label>
                                <textarea name = "description_np" id = "description_np" class="form-control tsm-editor"><?php echo isset($_POST['description_np'])?$_POST['description_np']:(isset($record->description_np)?$record->description_np:'') ;?></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="form-group">              
                        <label for="textfield" class="control-label">Image Size: 1366px×600px <p style="color: red">(Please upload gif,png,jpeg,jpg file only)</p></label>

                         <div class="col-md-12" >

                            <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&field_id=image' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Insert Image</a>
                                <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                <button class="btn btn-danger" id="img-remove" type="button"> Remove Image</button>
                                    <?php } ?>
                                    <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                <img src="<?php echo $record->image ?>" id="prev_img">
                                <?php }else{?>
                                <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" id="prev_img" alt="No-Image">
                             <?php   } ?><!-- 
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
                               

                            </div>                              

                        </div>

                            <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? $record->image: ''; ?>" />

                        </div>

                        <div class="form-group">
                            <label>status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>

                                <option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                         <input type = "hidden" name = "process" value = "true" >
                        <button type = "submit" class="btn btn-primary" >Submit</button>

                        </div>
                    </div>
                </div>
               
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