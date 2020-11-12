<html>

    <head>

        <title><?php echo $title; ?></title>

    </head>

    <body style='width: 99%; border: 3px solid #5f9f5f;'>

        <div style='background: #339933; height: 83px;padding: 20px;'>

            <img src='<?php echo base_url() . 'application/resources/aepc/img/logo_new.png' ?>' width="424" height="83" style='float: left; border: 0px;' />

        </div>

        <div style="margin:20px;">

        <p>
        	<?php // print_r($msg_body);exit;?>

            <?php echo ($msg_body) ? $msg_body : ''; ?>

        </p>

        <p><br/>Thank You<br/>

            <a href="<?php echo base_url(); ?>" target="_new"><?php echo base_url(); ?></a>

        </p>

        </div>

    </body>

</html>