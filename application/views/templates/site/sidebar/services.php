<?php
$services = $this->db->query("SELECT id,image,title_$lang as title, description_$lang as description, slug,icon from services where status='1'")->result();
?>
<div class="list-s-insure">
	<div class="sidebar-title">
		<?php echo $this->lang->line('label_nav_SERVICES'); ?>
	</div>
	<div class="sidebar-content">
		<ul class="list-unstyled">
			<?php if(!empty($services)) {
			foreach ($services as $value) {?>
			<li class="nav-item <?=($this->uri->segment(2)==$value->slug)?'active':''?>">
				<a href="<?=base_url().'services/'.$value->slug?>">
					<div class="icon_area">
						<span class="<?=$value->icon?>"></span>
					</div>
					<div class="title-area">
						<?=$value->title?>
					</div>
				</a>
			</li>
			<?php } }?>
		</ul>
	</div>
</div>