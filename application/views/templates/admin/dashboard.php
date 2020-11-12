<?php        echo $meta;        echo (isset($_scripts)) ? $_scripts : "";        echo (isset($_styles)) ? $_styles : "";        ?>
<body class="hold-transition skin-purple-light sidebar-mini" >
	<!-- Content Wrapper. Contains page content -->
	<div class="wrapper">
		<?php echo $top_nav; ?>
		<?php echo $nav; ?>
		<div class="content-wrapper">
			<?php
				echo $page_header;
							echo $breadcrumbs;
			?>
			<!-- Main content -->
			<section class="content">
				<?php
								if(isset($sub_navigation)) {
									echo $sub_navigation;
								}
								echo isset($ParamsComp2)?$ParamsComp2:'';
				echo $content;
				?>
			</div>
		</section>
		<!-- /.content -->
		<!-- /.content-wrapper -->
		<!-- FastClick -->
		<script src="<?=ADMIN_RESOURCE_PATH?>plugins/fastclick/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="<?=ADMIN_RESOURCE_PATH?>dist/js/app.min.js"></script>
		<!-- Sparkline -->
		<script src="<?=ADMIN_RESOURCE_PATH?>plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="<?=ADMIN_RESOURCE_PATH?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?=ADMIN_RESOURCE_PATH?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- SlimScroll 1.3.0 -->
		<script src="<?=ADMIN_RESOURCE_PATH?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- ChartJS 1.0.1 -->
		<script src="<?=ADMIN_RESOURCE_PATH?>plugins/chartjs/Chart.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<!-- <script src="<?=ADMIN_RESOURCE_PATH?>dist/js/pages/dashboard2.js"></script> -->
		<!-- AdminLTE for demo purposes -->
		<script src="<?=ADMIN_RESOURCE_PATH?>dist/js/demo.js"></script>
		<?php echo $footer; ?>
		<?php echo $scripts; ?>
		<script type="text/javascript">
					var options = {
		filebrowserBrowseUrl :"<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=' ?>",
		filebrowserUploadUrl :"<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=' ?>",
		filebrowserImageBrowseUrl :"<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr=' ?>",
		};
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.ckeditor').each(function(e){
			CKEDITOR.replace(this.id, options);
			});
			});
			
			
			$(document).ready(function(){
					$('.fancy').fancybox();
					
			});
			
			
			
			function responsive_filemanager_callback(field_id){
				var image = $('#' + field_id).val();
				var image_d = $('#' + field_id).val();
				// alert(image);
			    $('#prev_img').attr('src',image);
				$('#desc_image').attr('src',image_d);
				
				
			}
			
			function xxxresponsive_filemanager_callback(field_id){
				var image_d = $('#' + field_id).val();
				// 	alert(image_d);
				//$('#prev_img_description').attr('src',image_d);
			}
			
		</script>
		<style type="text/css">
			.fancybox-inner{
    		min-height: 500px !important;
		    width:100% !important;
		}
		.fancybox-wrap{
		    width: 90% !important;
		    left: 5% !important;
		}
		  #hwpwrap .menu-item-bar .menu-item-handle {
		    width: 90%;
		}
		#hwpwrap .menu-item-settings {
		    width: 90%;
		}
		#hwpwrap label {
		    width: 100%;
		}
		</style>
	</div>
	<!-- ./wrapper -->
</body>
</html>