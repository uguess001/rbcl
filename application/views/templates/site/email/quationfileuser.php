<h4>Dear <b><?php echo $name; ?></b></h4>
<p>Thank you for asking the quotation of <b><?php echo $filename;  ?></b>.</p>
<p>Our Representative will call back to you soon!!!</p>
<ul>
	<li>Name : <?php echo $filename ?></li>
	<li>File Download Link : <a href="<?php echo $file ?>"><?php echo $file ?></a></li>
</ul>
<br>
<p>
	Regards,<br>
	<?php echo $company_name ?><br>
	<?php echo $company_phoneno?><br>
	<?php echo base_url() ?>
</p>