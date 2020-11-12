<?php
$gallery = $this->db->query("SELECT id, title_en,  image from tbl_gallery where status=1 order by id desc limit 0,4")->result();
?>
<div class="list-s-gallery">
	<div class="sidebar-title">
		<?php echo $this->lang->line('latest_gallery'); ?>
	</div>
	<div class="sidebar-content">
		<div class="slider responsive">
			<?php if(!empty($gallery)){
				foreach ($gallery as $value) {?>
					<div>
						<a href="<?=base_url().'gallery/GetDetails/'.$this->Encryption->encode($value->id)?>">
											<img src="<?=$value->image?>" alt="<?=$value->title_en?>"></a>
					</div>
			<?php } } ?>
		</div>
	</div>
</div>