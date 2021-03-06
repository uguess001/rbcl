<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">FAQs</h3>
            </div>

            <div class="box-body">
                <div class="row">
                <form method="POST" action ="#" enctype="multipart/form-data" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>English Title</label><input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control">
                                <?php echo form_error('title_en'); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nepali Title</label><input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control">
                            <?php echo form_error('title_np'); ?>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-4" style="display: none;">

                <div class="form-group">              

                        <label for="textfield" class="control-label">Image Size: 600px×600px</label>

                        <div class="fileupload fileupload-new" data-provides="fileupload">

                            <div class="fileupload-new thumbnail" style="width: 200px; height: 80px;">

                            <img src="<?php echo isset($record->image) ? base_url() . 'uploads/services/' . $record->image: base_url()."application/resources/admin/img/noimage.PNG"; ?>" />

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


                <div class="col-md-12">
                    <div class="form-group">
                        <label>English Description</label>
                        <textarea name = "description_en" id = "description_en" class="form-control ckeditor"><?php echo isset($_POST['description_en'])?$_POST['description_en']:(isset($record->description_en)?$record->description_en:'') ;?></textarea>
                        <?php echo form_error('description_en'); ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nepali Description</label>
                        <textarea name = "description_np" id = "description_np" class="form-control ckeditor"><?php echo isset($_POST['description_np'])?$_POST['description_np']:(isset($record->description_np)?$record->description_np:'') ;?></textarea>
                        <?php echo form_error('description_np'); ?>
                    </div>
                    <input type = "hidden" name = "process" value = "true" >
                    <button type = "submit" class="btn btn-primary" >Submit</button>
                </div>
            </div>
            </form> 
            </div>
        </div>
    </div>
</div>