<html>
    <head>
        <title><?php echo $subject; ?></title>
    </head>
    <body style='width: 100%; border-bottom: 5px solid #033D6D;'>
        <div style='background: #033D6D; height: 60px; padding: 10px;'>
            <img src='<?php echo base_url().'application/resources/grms/img/logo-large.png' ?>' width="60" height="60" style='float: left; border: 0px; padding-right: 10px;' />
            <p style='color: #fefefe; font-size: 32px; padding-left: 10px; line-height: 0px;'>NIST Alumni</p>
        </div>
        <p style="padding: 20px 0px;">
        <?php echo ($message) ? $message : ''; ?>
        </p>
        <p><br/>Thank You<br/>
            <a href="<?php echo base_url(); ?>" target="_new"><?php echo base_url(); ?></a>
        </p>
    </body>
</html>