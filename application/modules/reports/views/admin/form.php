<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Reports</h3>
            </div>
            <div class="box-body">
                <div class="row">
                <form method="POST" action ="#" enctype="multipart/form-data" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">

                    <div class="col-md-9 col-lg-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>English Title</label><input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control" required>
                                    <?php echo form_error('title_en'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Nepali Title</label><input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control" required>
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

                    <div class="col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>Fiscal Year</label>
                            <select class="form-control" name="fiscal_year">
                                <?php
                                    foreach($fiscal as $k => $item){
                                        ?>
                                        <option value="<?php echo $item->id ?>" class="form-control" 
                                            <?php echo ( (isset($record->fiscal_year) && $record->fiscal_year == $item->id) ) ? 'selected' : '' ?>  >
                                            <?php
                                                 echo $item->year
                                            ?>
                                        </option>
                                        <?php
                                }
                                ?>
                            </select>   
                        </div>

                        <div class="form-group" style="display: none">
                            <label for="userfile_id" class="control-label">File <p style="color: red">(Please upload gif,png,jpeg,jpg,txt,docs,pdf file only)</p></label>

                            <div class="controls">
                                <input class="text-input small-input file" type="file" id="userfile_id" name="userfile" 
                                <?php if (isset($record->file) && strlen($record->file)>0) { ?>
                                <div id="<?php echo $record->id;?>">
                                    <a href="<?php echo base_url() . 'uploads/reports/' . $record->file; ?>" style="margin-left: 100px;">
                                        Current File <?php echo '<strong/>' . $record->file; ?></a> |

                                        <a href="#" class="fa fa-remove removed_docs" id="<?php echo $record->id;?>"  rel="tooltip" title="Delete File" style="top:0px !important; left: 5px; color: red"><i class="icon-remove"></i></a>
                                    </div>
                                    <?php } else{  ?>
                                    No current File
                                    <?php } ?>
                                    <input type="hidden" name="userfile" id="userfile" value="<?php echo isset($record->file) ? $record->file : ''; ?>" />
                            </div>
                        </div>

                        <div class="form-group" style="">
                            <label for="userfile_id" class="control-label">File <p style="color: red">(Please upload gif,png,jpeg,jpg,txt,docs,pdf file only)& filename should be in english.</p></label>

                            <div class="controls">
                                <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=2&field_id=file' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Select File  <i class="fa fa-file"></i></a>
                                <input type="text" class="form-control" id="file" name="file" value="<?php echo isset($record->file) ? $record->file : ''; ?>" readonly>
                                <!-- <input class="text-input small-input" type="file" id="userfile_id" name="userfile" /> -->
                                <?php if (isset($record->file) && strlen($record->file)>0) { ?>
                                <div id="<?php echo $record->id;?>">   
                                 <a target="_blank" href="<?php echo $record->file; ?>" style="margin-top: 10px;" class="btn btn-info">
                                    View <i class="fa fa-check-circle"></i>
                                    </a> 
                                <a onClick="return confirm('Are you sure you want to delete')" href="#" class="fa fa-remove removed_doc btn btn-danger pull-right" id="<?php echo $record->id;?>"  rel="tooltip" title="Delete File" style="margin-top: 10px;"><i class="icon-remove"></i></a>
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
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label>Quarter</label>
                                <select class="form-control" name="quarter">
                                    <option value="1">1st Quarter</option>
                                    <option value="2">2nd Quarter</option>
                                    <option value="3">3rd Quarter</option>
                                </select>   
                                <input type = "text" name = "fiscal_year" id = "fiscal_year" value = "<?php echo isset($_POST['fiscal_year'])?$_POST['fiscal_year']:(isset($record->fiscal_year)?$record->fiscal_year:'') ;?>" class="form-control" required>
                                <?php echo form_error('fiscal_year'); ?>
                            </div>
                        </div> -->
                        </div>
                        <div class="clearfix"></div>
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
    url: '<?php echo base_url(); ?>' + 'admin/reports/delete_reports_file',
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
<script>
      $(document).ready(function(){
    $('.file').change(function(e){
var check=false;
var ext = $(this).prop('files')[0].name.match(/\.([^\.]+)$/)[1];

    switch(ext)
     {
         case 'jpg':
         case 'JPG':
         case 'jpeg':
         case 'JPEG':
         case 'png':
         case 'PNG':
         case 'pdf':
         case 'docx':
         case 'txt':
         case 'gif':
                  
             break;
          default:
          check=true;
            
            
     }
     
     if(check){
        alert('Please attach only jpg, png, jpeg, pdf, docx, text, gif Files.');
        ("#userfile_id").text("");
      return; 
         
     }
});
});
</script>