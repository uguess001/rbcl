<h4>Dear <b>Sir/Madam</b></h4>
<p>Message has been send by <b><?php echo $name;  ?></b> for Insurance Quotation of <?php echo $filename ?></p>
<p>Detail Information of user:</p>
<ul>
	<li>Name : <?php echo $name ?></li>
	<li>Email : <?php echo $emailfrom ?></li>
	<li>Contact Number : <?php echo $phone ?></li>
	<li>Message : <?php echo $messagedetail ?></li>
</ul>
<br>
<p>
	Regards,<br>
	<?php echo $company_name ?><br>
	<?php echo base_url() ?>
</p>