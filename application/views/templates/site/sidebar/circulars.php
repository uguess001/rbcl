<?php
$list = $this->db->query("SELECT id,file,status,CreatedOn,title_$lang as title, description_$lang as description, status from downloads where status='1' and category='2' order by id desc limit 5")->result();
?>
<?php if (!empty($list)) { ?>
<div class="list-s-insure">
	<div class="sidebar-title">
		<?php echo $this->lang->line('label_nav_circulars'); ?>
	</div>
	<div class="sidebar-content">
		<ul class="list-unstyled">
			<?php foreach ($list as $value) { ?>
			<li><a target="_blank" href="<?=$value->file?>">
				<div class="title-area" style="padding-left: 10px;">
					<?=$value->title?>
				</div>
			</a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php } ?>