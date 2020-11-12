<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $page_header; ?></h3>
        <?php echo $this->session->flashdata('response'); ?>
            <span class="pull-right header-btn">
                <?php echo anchor( base_url().'admin/'.$url.'/record/list' , '<i class="fa fa-chevron-left"></i> View All', array('title' => 'View All', 'class'=>'btn btn-primary')); ?>
            </span>
        
    </div>
    <div class="box-body">
        <form action="#" method="POST" class='form-validate' id="officefrm" name="officefrm" enctype="multipart/form-data">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="title" class="control-label" >Subject </label>                    
                    <input class="form-control" type="text" name="title" id="title"  value="<?php echo (isset($record->title)?$record->title : ''); ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Description </label>
                    <div class="controls">
                        <textarea name="description" id="description" rows="10" cols="150" class="ckeditor input-block-level"><?php echo isset($record->description) ? $record->description : ''; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="published_date" class="control-label" >Published Date</label>
                    <input class="small-input valid form-control datepicker" type="text" required name="published_date" id="published_date"  value="<?php echo (isset($record->published_date)?$record->published_date : $date); ?>">
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="form-group" style="">
                    <div class="controls">
                        <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=2&field_id=file' ?>" data-fancybox-type="iframe" class="btn btn-info fancy">Attachment</a>
                        <br>
                        <input type="text" class="form-control" id="file" name="file" value="<?php echo isset($record->file)?base_url().$record->file : ''; ?>" readonly>
                        <?php if (isset($record->file) && strlen($record->file)>0) { ?>
                        <div id="<?php echo $record->id;?>">
                            <a target="_blank" href="<?php echo $record->file; ?>" style="margin-left: 100px;">
                                View File <i class="fa fa-file"></i>
                            </a> |
                            <a onClick="return confirm('Are you sure you want to delete')" href="#" class="fa fa-remove removed_doc" id="<?php echo $record->id;?>"  rel="tooltip" title="Delete File" style="top:0px !important; left: 5px; color: red"><i class="icon-remove"></i></a>
                        </div>
                        <?php } else{  ?>
                        No current Attachment
                        <?php } ?>
                        <input type="hidden" name="oldfile" id="file" value="<?php echo isset($record->file) ? $record->file : ''; ?>" />
                    </div>
                </div>
                <br><hr>
                <div class="form-group">
                    <label class="control-label">Message Send To</label>
                    <div class="controls">
                        <ul class="list-unstyled">
                        <?php if (!empty($userlist)) {
                            foreach ($userlist as $k => $val) { ?>
                                <li><input type="checkbox" name="userlist[]" value="<?php echo $val->UserId; ?>" 
                                    <?php if (!empty($userchecked)) {
                                        foreach ($userchecked as $v) {
                                    if($v->user_id == $val->UserId) { echo 'checked'; } } } ?>
                                > <?php echo $val->UserName.' ('.$val->Description.')'; ?></li>
                        <?php } } ?>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <select class="small-input valid form-control" name="status" id="status_id">
                            <option value="1" <?php echo ((isset($record->status) && $record->status == '1') ? 'selected' : ''); ?>>Active</option>
                            <option value="0" <?php echo ((isset($record->status) && $record->status == '0') ? 'selected' : '') ?>>InActive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button type="submit" class="btn btn-primary">Send</button>
                    <input type="hidden" name="process" value="true">
                    <input type="hidden" name="id" value="<?php echo (isset($record->id) ? $record->id : ''); ?>">
                    <button type="button" class="btn" onclick="history.go(-1)">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#document-remove').click(function(event) {
            $('#documentfiletext').hide();
            $('#document_file').val('');
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        var noimagepath = "<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png'; ?>";
        $('#img-remove').click(function(event) {
            $('#image_file').val('');
            $('#img-remove').hide();
            $('#img_src').prop('src', noimagepath);
        });

        $('.fileinput-new').click(function(event) {
            $('#img-remove').hide();
        });
    });
</script>