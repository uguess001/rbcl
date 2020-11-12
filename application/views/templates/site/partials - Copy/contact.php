
<section class="inner-page contact">
	<div class="container">
		<div class="contact-form">
			<div class="row">
				<div class="contact-top text-center">
					<div class="contact-top-area">
						<?php echo ($lang=='np')?'सम्पर्कमा रहनुहोस्':'Get In Touch!';?>
					</div>
				</div>
				<div class="col-12 col-lg-5">
					<div class="map">
						<iframe src="<?=$contactus->map?>" width="100%" height="255" frameborder="1" style="border:0">
						</iframe>
					</div>
					<div class="insurance-contact">
						<ul class="list-unstyled">
							<li>
								<div class="i-d-contents">
									<div class="i-d-icon-holder">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="i-d-content">
										<?php echo $this->lang->line('visit_us');?>
										<span><?php echo $this->lang->line('come_visit');?>
											<a href=""><?=isset($contactus->address)?$contactus->address:'';?></a>
										,</span>
										<span><?php echo ($lang=='np')?'काठमाडौं':'Kathmandu';?></span>
									</div>
								</div>
							</li>
							<li>
								<div class="i-d-contents">
									<div class="i-d-icon-holder">
										<span class="fa fa-phone"></span>
									</div>
									<div class="i-d-content">
										<?php echo $this->lang->line('call_us');?>
										<span><?php echo $this->lang->line('feel_free'); ?> <a href="tel:<?=$contactus->phone?>"><?php echo ($lang=='np')?changeNumberUnicode($contactus->phone):$contactus->phone?></a>,</span>
										<span><?php echo $this->lang->line('sunday');?></span>
										<span><?php echo $this->lang->line('friday');?></span>
									</div>
								</div>
							</li>
							<li>
								<div class="i-d-contents">
									<div class="i-d-icon-holder">
										<span class="fa fa-envelope-o"></span>
									</div>
									<div class="i-d-content">
										<?php echo $this->lang->line('send_feedback');?>
										<span><?php echo $this->lang->line('drop_email'); ?><a href="mailto:<?=$contactus->email?>"><?=$contactus->email?></a>,</span>
										<span><?php echo $this->lang->line('get_back'); ?>.</span>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-lg-7">
					<form id="modalform" method="post" action="#">
						<div class="form-row form-group">
							<div class="col" >
								<select name="department" class="form-control selectoption" required>
									<option value=""><?php echo ($lang=='np')?'विभाग चयन गर्नुहोस्':'Select Services';?></option>
									<?php if(!empty($services)) {
										foreach ($services as $val) { ?>
											<option value="<?= $val->id; ?>"><?=$val->title?></option>
									<?php } } ?>
								</select>
								<span class="text-danger" id="department-error"></span>
							</div>
						</div>
						<div class="form-row form-group">
							<div class="col">
								<input type="text" class="form-control"  placeholder="<?php echo ($lang=='np')?'पहिलो नाम':'First Name';?>" name="firstname">
								<span class="text-danger" id="firstname-error"></span>
							</div>
							<div class="col">
								<input type="text" class="form-control"  placeholder="<?php echo ($lang=='np')?'थर':'Last Name';?>" name="lastname">
								<span class="text-danger" id="lastname-error"></span>
							</div>
						</div>
						<div class="form-row form-group">
							<div class="col">
								<input type="email" class="form-control"  placeholder="<?php echo ($lang=='np')?'इमेल':'Email';?>" name="email">
								<span class="text-danger" id="email-error"></span>
							</div>
							<div class="col">
								<input type="text" class="form-control" placeholder="<?php echo ($lang=='np')?'फोन':'Phone';?>" name="phone">
								<span class="text-danger" id="phone-error"></span>
							</div>
						</div>
						<div class="form-row form-group">
							<div class="col">
								<textarea class="form-control" rows="6" placeholder="<?php echo ($lang=='np')?'सन्देश....':'Message....';?>" name="message"></textarea>
								<span class="text-danger" id="message-error"></span>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="checkprocess" value="true">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<button type="button" class="btn btn-primary btn-lg btn-sendre" id="btn-contactus">
								<?php echo ($lang=='np')?'पठाउनुहोस्':'Send Request';?>
							</button>
							<h6 class="loading-ajax d-none">Loading...</h6>
							<h4 id="message-area" class="text-success"></h4>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>










<section class="home_branches" style="background: #f2f2f2;">
	<div class="container">
		<div class="col-12 text-center">
			<h2 class="title-branch"><?php echo $this->lang->line('our_branches');?></h2>
		</div>
		<div class="row">
			<?php if(isset($branch_office) && !empty($branch_office)) :
				foreach ($branch_office as $value) :
			?>
			<div class="col-12 col-lg-4">
				<div class="br_area">
					<ul class="list-unstyled">
						<!-- <li>Biratnagar</li> -->
						<li><?=$value->address;?></li>
						<li class="phone_braches"> <?=$value->phone;?></li>
						<li class="fax_braches"> <?=$value->fax?> </li>
						<?php if(isset($value->email) && !empty($value->email)){ ?>
						<li class="email_braches"><?=$value->email?> </li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php
				endforeach;
				endif;
			?>
		</div>
	</div>
</section>
<section class="home_branches">
	<div class="container">
		<div class="col-12 text-center">
			<h2 class="title-branch"><?php echo ($lang=='np')?'उप शाखाहरू':'Sub Branches';?></h2>
		</div>
		<div class="row no-gutters">
			<?php if(!empty($subbranch_office)){
			foreach ($subbranch_office as $val){ ?>
			<div class="col-12 col-lg-4">
				<div class="br_area">
					<ul class="list-unstyled">
						<!-- <li>Biratnagar</li> -->
						<li><?=isset($val->address)?$val->address:'';?></li>
						<li class="phone_braches"> <?php echo  ($lang == 'np')?changeNumberUnicode(trim($val->phone)):
						trim($val->phone);?></li>
						<li class="fax_braches"> <?php echo  ($lang == 'np')?changeNumberUnicode(trim($val->fax)):trim($val->fax);?> </li>
						<?php if(isset($val->email) && !empty($val->email)){ ?>
						<li class="email_braches"><?=$val->email?> </li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>

<!-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
async defer>
</script> -->

<script src="<?=RESOURCE_PATH?>js/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<!-- </script>
-->
<!-- <script>
	$("#modalform").validate({
rules: {
firstname: "required",
lastname: "required",
email: {
required: true,
email: true
},
phone: {
minlength: 10,
maxlength:10,
}
},
messages: {
firstname: "Please specify your firstname",
lastname: "Please specify your lastname",
phone: {
minlength: "Number Should Be 10 Digit"
},
email: {
required: "We need your email address to contact you",
email: "Your email address must be in the format of name@domain.com"
}
}
});
</script> -->
<script>

$('#btn-contactus').click(function(event) {

	

		$('.loading-ajax').removeClass('d-none');
		event.preventDefault();
		$("#department-error").html('');
	    $("#firstname-error").html('');
	    $("#lastname-error").html('');
	    $("#message-error").html('');
	    $("#phone-error").html('');
	    $("#email-error").html('');
	    $('#message-area').html('');
        var formData = $("#modalform").serialize();

        // var baseurl="http://rbcl.com.np/insertfeedback";

        var baseurl='<?=base_url()?>'

        $.ajax({
            url: baseurl+"insertfeedback",
            type: 'POST',
            data: formData,
        })
        .fail(function(resp){
        	console.log(resp);
        })
		.always(function(resp) {
			$('.loading-ajax').addClass('d-none');
			response = jQuery.parseJSON(resp);
			console.log(resp)

	        if(response.error==true){
	          if(response.message.department){
	          $('#department-error').html(response.message.department);
	          }
	          if(response.message.firstname){
	          $('#firstname-error').html(response.message.firstname);
	          }
	          if(response.message.lastname){
	          $('#lastname-error').html(response.message.lastname);
	          }
	          if(response.message.message){
	          $('#message-error').html(response.message.message);
	          }
	          if(response.message.phone){
	          $('#phone-error').html(response.message.phone);
	          }
	          if(response.message.email){
	          $('#email-error').html(response.message.email);
	          }
	        }
	        if (response.error == false) {
	        	$("#modalform")[0].reset();
	        	$('#message-area').html(response.message);
	        }
	        
		});

	});





	$("#modalform_").validate({
rules: {
firstname: "required",
lastname: "required",
email: {
required: true,
email: true
},
phone: {
minlength: 10,
maxlength:10,
},
message: {
required: true
}
},
messages: {
firstname: "Please specify your firstname",
lastname: "Please specify your lastname",
phone: {
minlength: "Number Should Be 10 Digit"
},
email: {
required: "We need your email address to contact you",
email: "Your email address must be in the format of name@domain.com"
},
message:{
	required: "Please leave your message !!",
},
}
});
</script>