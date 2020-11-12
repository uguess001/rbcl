<div class="container-fluid" id="content">
    <div class="row-fluid">
        <?php
        /**
         * Show Flash Data
         */
        $_flash_msg = $this->session->flashdata('_flash_msg');
        if (!empty($_flash_msg)) {
            ?>
            <div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
                <a class="close" data-dismiss="alert">×</a>
                <?php echo $_flash_msg['_message']; ?>
            </div>
            <?php
        }
        ?>
        <div class="span12">
            <div class="box">
                <div class="box-content">
                    <form action="" method="post" class='form-horizontal form-validate' id="grievance_reminder_frm">

                        <div class="box-title">
                            <h3 style="margin:15px 0px 0px 0px;"><i class="icon-exchange"></i>New Password</h3>
                        </div><br/>
                        <div class="control-group">
                            <label for="user_password" class="control-label"> <span style="color: #ff0000;"> *</span>New Password</label>
                            <div class="controls" style="padding: 5px 0px 5px 0px;">
                                <input type="password" name="user_password" id="user_password" class="input-xlarge" data-rule-required="true" data-rule-maxlength="100" >
                            </div>                                                                                
                        </div>
                        <div class="control-group">
                            <label for="" class="control-label"> <span style="color: #ff0000;"> *</span>Confirm Password</label>
                            <div class="controls" style="padding: 5px 0px 14px 0px;">
                                <input type="password" name="user_cpassword" id="user_cpassword" class="input-xlarge" data-rule-maxlength="100" data-rule-equalto="#user_password">
                            </div>                                                                                
                        </div>
                        <div class="form-actions">
                            <input type="hidden" name="username" value="<?php echo(isset($username) ? $username : ''); ?>">
                            <input type="submit" class="btn btn-primary" id="submit_frm" value="Submit">
                            <input type="hidden" name="process" value="true"/>
                            <button type="button" class="btn cancle">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


