<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Links</h3>
    </div>
    <div class="box-body">
        <form method="POST" action ="#" enctype="multipart/form-data" onsubmit="return validateFileExtension(this.image)">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">
            
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label>English Title</label><input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control" required><?php echo form_error('title_en'); ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                <label>Nepali Title</label><input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control" required><?php echo form_error('title_np'); ?>
                </div>
            </div>

            <div class="col-md-4" style="display: block">
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" required >
                        <!-- <option value="0">Select Category </option> -->
                        <option value="1" <?=$record->category==1?'selected':''?>>Important Links</option>
                        <option value="2" <?=$record->category==2?'selected':''?>>Quick Links </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label>URL</label><input type = "text" name = "url" id = "url" value = "<?php echo isset($_POST['url'])?$_POST['url']:(isset($record->url)?$record->url:'') ;?>" class="form-control" required>
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