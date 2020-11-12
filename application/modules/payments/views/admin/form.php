<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $page_header ?></h3>
		<span class="pull-right">
			
			<a href="<?php echo base_url().'admin/payments'; ?>" class="btn btn-primary"><?php echo VIEWLIST_ICON; ?></a>
		</span>
	</div>
	<div class="box-body">
		<div class="row">
			<form method="POST" action ="#" enctype="multipart/form-data">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>English Title</label>
								<input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control" required><?php echo form_error('title_en'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nepali Title</label>
								<input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control" required><?php echo form_error('title_np'); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>English Description</label>
						<textarea name = "description_en" id = "description_en" class="form-control ckeditor" ><?php echo isset($_POST['description_en'])?$_POST['description_en']:(isset($record->description_en)?$record->description_en:'') ;?></textarea>
					</div>
					<div class="form-group">
						<label>Nepali Description</label>
						<textarea name = "description_np" id = "description_np" class="form-control ckeditor" ><?php echo isset($_POST['description_np'])?$_POST['description_np']:(isset($record->description_np)?$record->description_np:'') ;?></textarea>
					</div>
				</div>
				<div class="col-md-3">

					<div class="form-group">
								<label>Link</label>
								<input type = "url" name = "link" id = "link" value = "<?php echo isset($_POST['link'])?$_POST['link']:(isset($record->link)?$record->link:'') ;?>" class="form-control" required><?php echo form_error('link'); ?>
							</div>
					
					<div class="form-group">
                        <label for="textfield" class="control-label">Image Size: 1366px×600px</label>
                        <div class="text-center">                            
                            <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                            <img src="<?php echo $record->image ?>" id="prev_img" class="fancybox">
                            <!-- <img src="<?php echo base_url().$record->image ?>" id="prev_img" class="fancybox"> -->
                            <?php }else{?>
                            <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" id="prev_img" class="fancybox" alt="No-Image">
                            <?php } ?>                            
                            <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&field_id=image' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Insert Image</a>
                            <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                            <button class="btn btn-danger" id="btn-imgremove" type="button"> Remove Image</button>
                            <?php } ?>
                            <input type="hidden" value="<?=isset($record->image)?$record->image:''?>" class="form-control" name="image" id="image">
                            <!-- <input type="hidden" value="<?=isset($record->image)?base_url().$record->image:''?>" class="form-control" name="image" id="image"> -->
                        </div>
                        <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? $record->image: ''; ?>" />
                        <!-- <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? base_url().$record->image: ''; ?>" /> -->
                    </div>

                   
					<div class="form-group">
						<label>Published Date</label>
						<input type="text" name="published_date" id="published_date" class="form-control datepicker" value="<?php echo isset($_POST['published_date'])?$_POST['published_date']:(isset($record->published_date)?$record->published_date:date('Y-m-d')) ;?>">
						<?php echo form_error('published_date'); ?>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" id="status">
							<option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>
							<option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<input type="hidden" name="id" id="id" value="<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">
						<input type="hidden" name="process" value="true" >
						<button type="submit" class="btn btn-primary" >Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="<?=ADMIN_RESOURCE_PATH?>dropdown/style1.css" />
<!-- <link rel="stylesheet" type="text/css" href="icons/style.css" /> -->
<script src="<?=ADMIN_RESOURCE_PATH?>app_js/modernizr.custom.63321.js"></script>

<style type="text/css">
	span.glyphicon, span i.glyphicon span .glyphicon:before, span i.glyphicon:before,  span i.glyphicon:before {
font-family: 'icomoon' !important;
font-style: normal;
speak: none;
font-weight: normal;
position: absolute;
font-size: 20px;
line-height: 32px;
width: 50px;
top: 50%;
left: -4px;
margin-top: -16px;
text-align: center;
}
.filter-option.pull-left i {
float: left;
height: 30px;
width: 30px;
margin-right: 10px;
margin-left: -10px;
}
.filter-option.pull-left {
line-height: 2;
}
a[class^="icon-"]::before,  a[class*=" icon-"]::before{
	/*position: absolute;*/
font-family: 'icomoon' !important;
/*display: none;*/
width: 40px;
}
a span.glyphicon{
	display: none;
}
</style>
<script type="text/javascript">
	$( ".cd-select li:first-child" ).click(function() {
$( ".cd-select li" ).toggle();
});
</script>