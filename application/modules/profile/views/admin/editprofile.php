<?php
/**  Show Flash Data  */
$_flash_msg = $this->session->flashdata('_flash_msg');
if (!empty($_flash_msg)) { ?>
    <div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo $_flash_msg['_message']; ?>
    </div>
<?php  }  ?>

<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title"><?php echo $page_header; ?>
            <span class="pull-right">
                <?php echo anchor( base_url().'admin/'.$url.'/record/view' , '<i class="fa fa-chevron-left"></i> Profile', array('title' => ' Profile', 'class'=>'btn btn-primary')); ?>
            </span>
        </h4>
    </div>
    <div class="box-body">
        <form action="#" method="POST" class='form-validate' id="frmprofile" name="frmprofile" enctype="multipart/form-data">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="username" class="control-label" >UserName</label>
                    <input class="small-input valid form-control" type="text" name="username" id="username" value="<?php echo $record->UserName; ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group pull-right">
                    <input type="checkbox" name="changepwd" id="changepwd" value="false"> Change Password</input>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="oldpassword" class="control-label" >Old Password </label>
                    <input class="small-input valid form-control" type="password" name="oldpassword" id="oldpassword" value="<?php echo isset($record->oldpassword) ? $record->oldpassword : ''; ?>">
                    <span class="error text-danger" id="oldpassword-error"></span>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="newpassword" class="control-label" >New Password </label>
                    <input class="small-input valid form-control" type="password" name="newpassword" id="newpassword" value="<?php echo isset($record->newpassword) ? $record->newpassword : ''; ?>">
                    <span class="error text-danger" id="newpassword-error"></span>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="confpassword" class="control-label" >Confirm Password </label>
                    <input class="small-input valid form-control" type="password" name="confpassword" id="confpassword" value="<?php echo isset($record->confpassword) ? $record->confpassword : ''; ?>">
                    <span class="error text-danger" id="confpassword-error"></span>
                </div>
            </div>
            <div class="clearfix"></div>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="form-actions">
                    <button type="button" id="submit-btn" onclick="doSubmit();" class="btn btn-primary">Save Changes</button>
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
        $('#changepwd').val('false');
        $('#oldpassword').attr('disabled', true);
        $('#newpassword').attr('disabled', true);
        $('#confpassword').attr('disabled', true);
        $('#username').attr('readonly', true);
    });

    $('#changepwd').change(function() {
        if ($(this).is(':checked')) {
            $('#changepwd').val('true');
            $('#oldpassword').attr('disabled', false);
            $('#newpassword').attr('disabled', false);
            $('#confpassword').attr('disabled', false);
        } else {
            $('#changepwd').val('false');

            $('#oldpassword').val('');
            $('#newpassword').val('');
            $('#confpassword').val('');

            $('#oldpassword').attr('disabled', true);
            $('#newpassword').attr('disabled', true);
            $('#confpassword').attr('disabled', true);
        }
    });

    function clearfrm(){
        $('#oldpassword-error').html('');
        $('#newpassword-error').html('');
        $('#confpassword-error').html('');
    }

    function doSubmit(){
        clearfrm();
        var changepwd = $('#changepwd').val();
        var oldpassword = $('#oldpassword').val();
        var newpassword = $('#newpassword').val();
        var confpassword = $('#confpassword').val();
        
        if (changepwd == 'true') {
            if (oldpassword == '') {
                $('#oldpassword-error').html('This Feild is Required');
            } else {
                if (newpassword == '') {
                    $('#newpassword-error').html('This Feild is Required');
                }
                if (confpassword == '') {
                    $('#confpassword-error').html('This Feild is Required');
                }
                if (newpassword != '' && confpassword != '') {
                    if (newpassword == confpassword) {
                        $('#frmprofile').submit();
                        return true;
                    } else {
                        $('#confpassword-error').html("Password doesn't match.");
                        return false;
                    }
                }
            }
        } else {
            $('#frmprofile').submit();
            return true;
        }
    }
</script>