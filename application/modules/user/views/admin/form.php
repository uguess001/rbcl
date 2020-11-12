<div class="row"> 
    <div class="col-md-12"> 
        <div class="box"> 
            <div class="box-header with-border"> 
                <h3 class="box-title"> User</h3> 
                <span class="pull-right header-btn"><a href="<?php echo base_url(); ?>admin/user" class="btn btn-primary"> Back </a> </span> 
            </div> 
            <div class="box-body">
                <div class="col-md-8">
                    <form autocomplete="off" method="POST" action ="#" id="FormChangePassword" name="FormChangePassword">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type = "hidden" name = "UserId" id = "UserId" value = "<?php echo isset($_POST['UserId'])?$_POST['UserId']:(isset($record->UserId)?$record->UserId:'') ;?>" class="form-control">
                        <div class="form-group">
                            <label>User Type</label>
                            <select name="UserType" class="usertype form-control">
                                <?php if(isset($usertype) && !empty($usertype)){
                                foreach ($usertype as $value) { ?>
                                    <option value="<?=$value->UserTypeId;?>"><?=$value->Description;?></option>
                              <?php } } ?>
                          </select>
                        </div>
                        <div class="form-group" style="display:none">
                            <lable>Full Name</lable>
                            <input class="form-control" type="text" name ="fullname" id ="fullname" value = "<?php echo isset($_POST['fullname'])?$_POST['fullname']:(isset($record->FULLNAME)?$record->FULLNAME:'') ;?>" >
                        </div>
                        <div class="form-group" style="display: none">
                        <lable>Email</lable>
                        <input class="form-control" type="text" name ="email" id ="email" value = "<?php echo isset($_POST['email'])?$_POST['email']:(isset($record->Email)?$record->Email:'') ;?>" >
                        </div>
                        <div class="form-group" style="display: none">
                        <lable>Phone</lable>
                        <input class="form-control" type="text" name ="phone" id ="phone" value = "<?php echo isset($_POST['phone'])?$_POST['phone']:(isset($record->Phone)?$record->Phone:'') ;?>" >
                        </div>
                        <div class="form-group has-feedback"><label>User Name</label>
                            <input type = "text" name = "UserName" id = "UserName" value = "<?php echo isset($_POST['UserName'])?$_POST['UserName']:(isset($record->UserName)?$record->UserName:'') ;?>" class="form-control" >
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>  
                        <?php if(isset($record->UserId)) { ?>
                            <label for="change_password">Check Here to change password</label>
                            <input type="checkbox" name ="change_password" id="change_password" >
                            <br>
                        <?php } ?>
                        <div class="form-group has-feedback"><label>Password</label>
                            <input <?=isset($record->UserName)?'disabled':''?> type = "Password" name = "Password" id = "Password" value = ""  class="form-control" > <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback"><label>Confirm Password</label>
                            <input class="form-control" type="password" name ="confirmpassword" id ="confirmpassword" value = "" >
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <div class="registrationFormAlert" id="divCheckPasswordMatch">
                        </div>
                        <div class="form-group has-feedback"><label>Status</label>
                            <select name="Status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactice</option>
                            </select>
                        </div>                  
                        </br>
                        <div class="form-group">
                            <input type = "hidden" name = "process" value = "true"  >
                            <button class="btn btn-success save" value="save" onClick="validatePassword();">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>    
 $(document).ready(function() {
  $('#change_password').click(function() {
    if ($('#change_password').is(':checked')) {
      if (confirm("Are you sure you want to change user login credentials?"))
      {
        $('#Password').removeAttr('disabled');
      }
    }
    else {
      $('#Password').attr('disabled', 'disabled');
    }
  });
});         
</script> 
<script type="text/javascript" src="<?=ADMIN_RESOURCE_PATH?>plugins/jQuery/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(e){
        $("#FormChangePassword").submit(function(event){
            var validator = $("#FormChangePassword").validate({
                rules: {
                    Password :"required",
                    confirmpassword:{
                        equalTo: "#Password"
                    }
                },
                messages: {
                    Password :" Enter Password",
                    confirmpassword :" Enter Confirm Password Same as Password"
                }
            });
            if(validator.form()){
                $("#divCheckPasswordMatch").html("Passwords has matched!");
            }
            else{
                event.preventDefault()
            }
        });
    });
</script>
<!-- end of the validation of password -->
<script>
    $(document).on('change','.districtname', function () {
// var id = $(this).attr('rel');
var val = $(this).val();
//$("select[name='pa_zone_np']").val(val).focus();
$.ajax({
    url: '<?php echo base_url().'admin/user/getLocalbodies/'; ?>' + val,
//type: 'post',
//contentType: "application/x-www-form-urlencoded",
// data: {
//     bachelor_passed_country: $(this).val()
// },
success: function (data) {
    var r = $.parseJSON(data);
    console.log(r);
    $(".local_name").empty();
    $(".local_name").append("<option>Select Local Bodies</option>");
    $.each(r, function (i, v) {
        $(".local_name").append("<option value='" + v.PROJECT_CODE + "'>" + v.PROJECT_NDESC + "</option>");
    });
},error: function (s){
    console.log(s);
}
});
});
</script>
<script>
    $(document).on('change','.usertype', function () {
// var id = $(this).attr('rel');
var val = $(this).val();
if(val==2){
    $(".local_name_div").hide();
}else{
    $(".local_name_div").show();
}
});
</script>
<style type="text/css">
    .error{
        color: red;
    }
</style>
