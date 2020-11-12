<h4>Dear <b>Sir/Madam</b></h4>
<p>Message has been send by <b><?php echo $name;  ?></b> from contact Us/Feedback form</p>
<ul>
	<li>Name : <?php echo $name ?></li>
	<li>Email : <?php echo $emailfrom ?></li>
	<li>Phone Number : <?php echo $phone ?></li>
	<li>IP Address : <?php echo $ipaddress ?></li>
	<li>Message : <?php echo $messagedetail; ?></li>
</ul>
<br>
<p>
	Regards,<br>
	<?php echo $company_name ?><br>
	<?php echo base_url() ?>
</p>