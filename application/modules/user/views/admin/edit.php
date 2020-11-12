<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Edit User</h3>
      </div>

        <div class="box-body">

          <div class="col-md-4">
              <div class="register-logox">
                <h3><b>Edit User Profile</b></h3>
              </div>
              <div class="register-box-body">
                  
                <form autocomplete="off"  onSubmit="return validate()" method="POST"  id="loginForm" name="loginForm" action ="#">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <input type = "hidden" name = "UserId" id = "UserId" value = "<?php echo isset($_POST['UserId'])?$_POST['UserId']:(isset($record->UserId)?$record->UserId:'') ;?>" class="form-control">
                  <div class="form-group"><label>User Type</label>
                    <?=GetSelectUserType($this->Musertype->PickRecord(),'UserType',isset($_POST['UserType'])?$_POST['UserType']:(isset($record->UserType)?$record->UserType:''))?>
                  </div>
                  <div class="form-group has-feedback"><label>User Name</label>
                    <?php
                    if(isset($record->UserId)){
                      echo $record->UserName;
                    } else {
                      ?>
                      <input type = "text" name = "UserName" id = "UserName" value = "" class="form-control" >
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      <?php
                    }
                    ?>
                  </div>
                  <div class="form-group has-feedback"><label>Status</label>
                    <select class="form-control" name="Status" id="Status">
                      <option value="1" <?php echo ( (isset($record->Status) && $record->Status == '1') || ( isset($_POST['Status']) && $_POST['Status'] == '1' )) ? 'selected' : '' ?>>Active</option>
                      <option value="0" <?php echo ( (isset($record->Status) && $record->Status == '0') || ( isset($_POST['Status']) && $_POST['Status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
                    </select>
                  </div>
              

              <div class="form-group">
                <input type = "hidden" name = "process" value = "true" >
                <button class="btn btn-success save" id="save" value="save" >Save Changes</button>
              </div>
            </form>
          </div>

        </div>
        <!-- new extra form -->
      <div class="col-md-4">
          
        <div class="register-box-body" >
          <div class="register-logox">
              <h3><b>Change Password</b></h3>
          </div>
            
          <form autocomplete="off"  method="POST"  id="FormChangePassword" name="FormChangePassword" action ="#">
            <input type = "hidden" name = "UserId" id = "UserId" value = "<?php echo isset($_POST['UserId'])?$_POST['UserId']:(isset($record->UserId)?$record->UserId:'') ;?>" class="form-control">
            <div class="form-group has-feedback">
              <input type="hidden" name="Status" value="<?=$record->Status?>">
            </div>
            <div class="form-group has-feedback">
              <input type="hidden" name="UserType" value="<?=$record->UserType?>">
            </div>
            <input type = "hidden" name = "UserId" id = "UserId" value = "<?php echo isset($_POST['UserId'])?$_POST['UserId']:(isset($record->UserId)?$record->UserId:'') ;?>" class="form-control">
            <div class="form-group has-feedback"><label>Password</label>
              <input type = "Password" name = "Password" id = "Password" class="form-control"> <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback"><label>Confirm Password</label>
              <input class="form-control" type="password" name ="change_password" id ="confirmpassword" >
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="registrationFormAlert" id="divCheckPasswordMatch">
            </div>
         

            <div class="form-group">
              <input type = "hidden" name = "process" value = "true" >
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <input type="hidden" value="true" name="process">
              <button class="btn btn-primary save" id="save" value="save" >Change Password</button>
            </div>
        </form>
      </div>
        
      </div>
        
    </div>
  </div>
</div>
</div>

 <style type="text/css">
   .register-box-body {
    background: #fff;
    border-top: 0;
    color: #666;
}
</style>
<!-- user password and conform password validation -->
<script type="text/javascript" src="<?=ADMIN_RESOURCE_PATH?>plugins/jQuery/jquery.validate.min.js"></script>
<script>
  $(document).ready(function(e){
    $("#FormChangePassword").submit(function(event){
       // alert("submitting the foerm");
       event.preventDefault()
       var validator = $("#FormChangePassword").validate({
        rules: {
         Password :"required",
         change_password:{
          equalTo: "#Password"
        }
      },
      messages: {
        Password :" Enter Password",
        change_password :" Enter Confirm Password Same as Password"
      }
    });
       if(validator.form()){
        $(document).ready(function(){
          var form_data = $("#FormChangePassword").serialize();
          $.ajax({
            data: form_data,
            type: "post",
            url: '<?=base_url()?>admin/user/record/<?=$this->Encryption->encode($record->UserId)?>',
            success: function(response){
              //console.log(response)
              $("#divCheckPasswordMatch").html("Passwords changed!");
              $( "#divCheckPasswordMatch" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
              $( "#FormChangePassword")[0].reset();
            },
            error: function(){
                 // console.log('hello')
               }
             })
        })
   //return false;
 }
})
  });
</script>
<!-- end of the validation of password -->