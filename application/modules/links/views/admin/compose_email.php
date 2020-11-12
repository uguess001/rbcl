<div class="row">
<div class="col-md-12">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Send Email</h3>
<label style="color: red;">
<?php
echo $this->session->flashdata('email_sent');
?>
</label>
</div>
<div class="box-body">
<form method="POST" action ="#" enctype="multipart/form-data" >
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>Email:-</label><input type = "email" name = "email_to_send[]" id = "email_to_send" value = "" class="form-control" required>
<a id="add_more_file" href="javascript:;" class="btn btn-primary" style="margin-top: 10px;" >Add More Email</a>

</div>
</div>

<div class="clearfix"></div>


<script type="text/javascript">
     $('#add_more_file').click(function() {
            $('.file-control').append('<div><input type="email" class="form-control" name="email_to_send[]" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="remove_file" style="color: #ff0000;">Remove This</a><br/></div>');
        });        

        $(document).on('click', '.remove_file', function() {
            $(this).parent().remove();
        });
</script>



<div class="clearfix"></div>
<div class="col-md-8">
<div class="form-group">
<label>Message:-</label>
        <textarea name = "messages"  id = "messages" rows="10" cols="80" class="form-control" required><?php echo isset($_POST['messages'])?$_POST['messages']:(isset($record->messages)?$record->messages:'') ;?></textarea>
</div>
</div>
<div class="clearfix"></div>


</div>
<div class="clearfix"></div>
<input type = "hidden" name = "process" value = "true" >
<button type = "submit" class="btn btn-primary" >Submit</button>
</form> 
</div>
</div>
</div>
</div>

