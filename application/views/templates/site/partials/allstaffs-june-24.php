<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">
	<div class="ti-content text-center">
		<!--<div class="title-ti"><?php echo $this->lang->line('label_management_manager'); ?></div>-->
		<div class="breadcrums">
			<ol class="list-unstyled list-inline">
				<li class="list-inline-item breadcrumb-item"><a href="#"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
				<!--        <li class="list-inline-item breadcrumb-item"><a href="#">Claims</a></li>-->
				<li class="list-inline-item breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('label_management_manager'); ?></li>
			</ol>
		</div>
	</div>
</section>
<div class="clearfix"></div>
<div class="container">
	
	<div class="clearfix"></div>
	<div class="ins-branches">
		
		
		<div class="row">
			<div class="col-12 ">
				<h2 class="title-branch"><?php echo ($lang=='np')?'व्यवस्थापन टोली':'Management Team';?></h2>
			</div>
			<div class="col-12">
				<?php if(isset($management_team) && !empty($management_team)) :
				foreach ($management_team as $value) :
				?>
				
				<div class="management_title">
					<?=$value->post; ?>
					<span style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?= $value->name; ?></span>
				</div>
				<?php
				endforeach;
				endif;
				?>
			</div>
		</div>
		<hr>
		<div class="row for_branch_manager_list">
			<div class="col-12">
				<h2 class="title-branch"><?php echo ($lang=='np')?'क्षेत्र प्रमुख र शाखा प्रबन्धक':'Section Chief & Branch Manager';?></h2>
			</div>
			<?php if(isset($branch_manager) && !empty($branch_manager)) :
			foreach ($branch_manager as $value) :
			?>
			<div class="col-12 col-lg-3">
				<div class="card">
					<div class="card-header"><span style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?=$value->name;?></span></div>
					<div class="card-body"><?=$value->post?></div>
				</div>
				<!-- <ul class="list-unstyled"> -->
				<!-- <li>Biratnagar</li> -->
				<!-- <li>//$value->address;?></li> -->
				<!-- <li>//$value->name;?></li> -->
				<!-- <li>//$value->post?> </li> -->
				<!-- </ul> -->
				
			</div>
			<?php
			endforeach;
			endif;
			?>
		</div>
	</div>
	
</div>
<section class="inner-page contact" style="display: none;">
	<div class="container">
		
		<div class="clearfix"></div>
		<div class="ins-branches">
			
			<div class="row">
				<div class="col-12">
					<h2 class="title-branch">Branch Offices</h2>
				</div>
				<?php if(isset($branch_office) && !empty($branch_office)) :
				foreach ($branch_office as $value) :
				?>
				<div class="col-12 col-lg-3">
					<ul class="list-unstyled">
						<!-- <li>Biratnagar</li> -->
						<li><?=$value->address;?></li>
						<li><i class="fa fa-phone"></i> <?=$value->phone;?></li>
						<li><i class="fa fa-fax"></i> <?=$value->fax?> </li>
					</ul>
					
				</div>
				<?php
				endforeach;
				endif;
				?>
			</div>
		</div>
		
	</div>
</section>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
async defer>
</script>