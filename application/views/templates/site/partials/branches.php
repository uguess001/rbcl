<div id="map"></div>

<section class="home_branches mt-30">
	<div class="container">
	<div class="section-header mt-30  mb-30 fnt-a2 section-base-color fnt-bld">
	<?php echo $this->lang->line('our_branches');?>          </div>

		
		<div class="row">
			<?php if(isset($branch_office) && !empty($branch_office)) :
				foreach ($branch_office as $key => $value) :
			?>
			<div class="col-12 col-lg-4">
				<div class="br_area-s gmimap<?=$key;?>">
					<ul class="list-unstyled">
						<!-- <li>Biratnagar</li> -->
						<li><?=$value->address;?></li>
						<li class="manager_name"> <?=$value->manager_name;?></li>
						<li class="manager_position"> <?=$value->position;?></li>
						
						<?php if(isset($value->email) && !empty($value->email)){ ?>
						<li class="email_braches"><?=$value->email?> </li>
						<?php } ?>
						
						<li class="phone_braches"> <?=$value->phone;?></li>
						<li class="fax_braches"> <?=$value->fax?> </li>
						
					</ul>
				</div>
			</div>
			<?php
				endforeach;
				endif;
			?>
		</div>
		
		
		
		
		<div class="section-header mt-30  mb-30 fnt-a2 section-base-color fnt-bld">
	<?php echo ($lang=='np')?'उप शाखाहरू':'Sub Branches';?>      </div>

		
		<div class="row">
			<?php if(isset($subbranch_office) && !empty($subbranch_office)) :
				foreach ($subbranch_office as $key => $value) :
			?>
			<div class="col-12 col-lg-4">
				<div class="br_area-s gmimap<?=$key;?>">
					<ul class="list-unstyled">
						<!-- <li>Biratnagar</li> -->
						<li><?=$value->address;?></li>
						
						<li class="manager_name"> <?=$value->manager_name;?></li>
						<li class="manager_position"> <?=$value->position;?></li>
						
						<?php if(isset($value->email) && !empty($value->email)){ ?>
						<li class="email_braches"><?=$value->email?> </li>
						<?php } ?>
						
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
