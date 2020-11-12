
<div class="row">

<div class="col-md-12">

<div class="box">

<div class="box-header with-border">

<h3 class="box-title">VIDEO</h3>

</div>

<div class="box-body">

<form method="POST" action ="#" enctype="multipart/form-data" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type = "hidden" name = "id" id = "id" value = "<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">

<div class="col-md-4">

<div class="form-group">

<label>Title</label><input type = "text" name = "title" id = "title" value = "<?php echo isset($_POST['title'])?$_POST['title']:(isset($record->title)?$record->title:'') ;?>" class="form-control">

<?php echo form_error('title'); ?>

</div>

<input type = "hidden" name = "process" value = "true" >

<button type = "submit" class="btn btn-primary" >Submit</button>

</div>


<div class="col-md-4">

<div class="form-group">

<label>URL</label><input type = "text" name = "url" id = "url" value = "<?php echo isset($_POST['url'])?$_POST['url']:(isset($record->url)?$record->url:'') ;?>" class="form-control">

<?php echo form_error('url'); ?>

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

</form> 

</div>

</div>

</div>

</div>