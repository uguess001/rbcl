<div class="box">
    <div class="box box-header">
        <h3 class="box-title"><i class="fa fa-cog"></i> Department Wise Email  Settings</h3>
    </div>
    <div class="box-body">
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
        <form action="" method="POST" class='form-horizontal form-column form-bordered'>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Amin Email</label>
                    <input type="email" name="admin_email" id="admin_email" placeholder="" value="<?php echo isset($_POST['admin_email']) ? $_POST['admin_email'] : $settings->admin_email; ?>"  class="form-control">
                </div>
                <div class="form-group">
                    <label>Fire Insurance Email</label>
                    <input type="email" name="fire_insurance" id="fire_insurance" placeholder="" value="<?php echo isset($_POST['fire_insurance']) ? $_POST['fire_insurance'] : $settings->fire_insurance; ?>"  class="form-control">
                    <?php if (form_error('admin_email')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('admin_email')); ?></span><?php } ?>
                </div>
                <div class="form-group">
                    <label>Motor Insurance Email</label>
                    <input type="email" name="motor_insurance" id="motor_insurance" placeholder="" value="<?php echo isset($_POST['motor_insurance']) ? $_POST['motor_insurance'] : $settings->motor_insurance; ?>"  class="form-control">
                    <?php if (form_error('motor_insurance')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('motor_insurance')); ?></span><?php } ?>
                </div>
                <div class="form-group">
                    <label>Aviation Insurance Email</label>
                    <input type="email" name="aviation_insurance" id="aviation_insurance" placeholder="" value="<?php echo isset($_POST['aviation_insurance']) ? $_POST['aviation_insurance'] : $settings->aviation_insurance; ?>"  class="form-control">
                    <?php if (form_error('aviation_insurance')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('aviation_insurance')); ?></span><?php } ?>
                </div>
                <div class="form-group">
                    <label>Marine Insurance Email</label>
                    <input type="email" name="marine_insurance" id="marine_insurance" placeholder="" value="<?php echo isset($_POST['marine_insurance']) ? $_POST['marine_insurance'] : $settings->marine_insurance; ?>"  class="form-control">
                    <?php if (form_error('marine_insurance')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('marine_insurance')); ?></span><?php } ?>
                </div>
                <div class="form-group">
                    <label>Engineering Insurance Email</label>
                    <input type="email" name="engineering_insurance" id="engineering_insurance" placeholder="" value="<?php echo isset($_POST['engineering_insurance']) ? $_POST['engineering_insurance'] : $settings->engineering_insurance; ?>"  class="form-control">
                    <?php if (form_error('engineering_insurance')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('engineering_insurance')); ?></span><?php } ?>
                </div>
                <div class="form-group">
                    <label>Mediacal aid Insurance Email</label>
                    <input type="email" name="medical_insurance" id="medical_insurance" placeholder="" value="<?php echo isset($_POST['medical_insurance']) ? $_POST['medical_insurance'] : $settings->medical_insurance; ?>"  class="form-control">
                    <?php if (form_error('medical_insurance')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('medical_insurance')); ?></span><?php } ?>
                </div>
                <div class="form-group">
                    <label>Miscellaneous Insurance Email</label>
                    <input type="email" name="miscellaneous_insurance" id="miscellaneous_insurance" placeholder="" value="<?php echo isset($_POST['miscellaneous_insurance']) ? $_POST['miscellaneous_insurance'] : $settings->miscellaneous_insurance; ?>"  class="form-control">
                    <?php if (form_error('miscellaneous_insurance')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('miscellaneous_insurance')); ?></span><?php } ?>
                </div>
                <div class="form-group">
                    <label>Traveling Medical Insurance Email</label>
                    <input type="email" name="traveling_insurance" id="traveling_insurance" placeholder="" value="<?php echo isset($_POST['traveling_insurance']) ? $_POST['traveling_insurance'] : $settings->traveling_insurance; ?>"  class="form-control">
                    <?php if (form_error('traveling_insurance')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('traveling_insurance')); ?></span><?php } ?>
                </div>
                <div class="form-group">
                    <label>Professional Indemnity Email</label>
                    <input type="email" name="professional_insurance" id="professional_insurance" placeholder="" value="<?php echo isset($_POST['professional_insurance']) ? $_POST['professional_insurance'] : $settings->professional_insurance; ?>"  class="form-control">
                    <?php if (form_error('professional_insurance')) { ?><span class="input-notification error png_bg"><?php echo strip_tags(form_error('professional_insurance')); ?></span><?php } ?>
                </div>
            </div>
            <div class="col-lg-12">
                
                <input type="hidden" name="id" id="id" value="<?php echo $settings->id ?>"/>
                <input type="hidden" name="process" value="true"/>
                <input type="submit" class="btn btn-primary" value="Save changes" />
                <button type="button" class="btn">Cancel</button>
                
            </div>
        </form>
    </div>
</div>
