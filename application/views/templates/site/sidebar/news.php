<?php
$news = $this->db->query("SELECT id,title_$lang as title,description_$lang as description,image, slug, CreatedOn from news where status=1 order by id desc limit 2" )->result();
?>
<div class="list-s-insure">
	<div class="sidebar-title">
		<?php echo $this->lang->line('innder_content_news'); ?>
	</div>
	<div class="sidebar-content">
		<ul class="list-unstyled">
			<?php if(!empty($news)){
			foreach ($news as $value){?>
			<li>
				<a href="<?=base_url().'news/'.$value->slug?>">
					<div class="title-area" style="padding-left: 10px;">
						<?=$value->title?>
					</div>
					<div class="title-area">
						<!-- <?=$value->pu?> -->
					</div>
				</a>
			</li>
			<?php } }?>
		</ul>
	</div>
</div>