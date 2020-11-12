<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $page_header ?></h3>
		<span class="pull-right">
			<?php if (isset($record->id)) { ?>
			<a href="<?php echo base_url().'services/'.$record->slug; ?>" target="_blank" class="btn btn-warning"><?php echo LINK_ICON_NAME; ?></a>
			<?php } ?>
			<a href="<?php echo base_url().'admin/services'; ?>" class="btn btn-primary"><?php echo VIEWLIST_ICON; ?></a>
		</span>
	</div>
	<div class="box-body">
		<div class="row">
			<form method="POST" action ="#" enctype="multipart/form-data">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>English Title</label>
								<input type = "text" name = "title_en" id = "title_en" value = "<?php echo isset($_POST['title_en'])?$_POST['title_en']:(isset($record->title_en)?$record->title_en:'') ;?>" class="form-control" required><?php echo form_error('title_en'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nepali Title</label>
								<input type = "text" name = "title_np" id = "title_np" value = "<?php echo isset($_POST['title_np'])?$_POST['title_np']:(isset($record->title_np)?$record->title_np:'') ;?>" class="form-control" required><?php echo form_error('title_np'); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>English Description</label>
						<textarea name = "description_en" id = "description_en" class="form-control ckeditor" ><?php echo isset($_POST['description_en'])?$_POST['description_en']:(isset($record->description_en)?$record->description_en:'') ;?></textarea>
					</div>
					<div class="form-group">
						<label>Nepali Description</label>
						<textarea name = "description_np" id = "description_np" class="form-control ckeditor" ><?php echo isset($_POST['description_np'])?$_POST['description_np']:(isset($record->description_np)?$record->description_np:'') ;?></textarea>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select class="selectpicker" name="cd-dropdown" id="" data-live-search="true" required>
							<option  selected>Choose your Icon</option>
							<option value="icon-guide" data-icon="icon-guide" class="icon-guide">Guide</option>
							<option value="icon-package-6" data-icon="icon-package-6" class="icon-package-6">Package</option>
							<option value="icon-padlock" data-icon="icon-padlock " class="icon-padlock">Lock</option>
							<option value="icon-pen" data-icon="icon-pen" class=" icon-pen">Pen</option>
							<option value="icon-pic-chart22" data-icon="icon-pie-chart22" class="icon-pie-chart22">Pie Chart</option>
							<option value="icon-technical-support-1" data-icon="icon-technical-support-1" class="icon-technical-support-1">Technical Support</option>
							<option value="icon-trophy" data-icon="icon-trophy" class="icon-trophy">Trophy</option>
							<option value="icon-target" data-icon="icon-target" class="icon-target">Target Chart</option>
							<option value="icon-puzzle" data-icon="icon-puzzle" class="icon-puzzle">Puzzle</option>
							<option value="icon-server" data-icon="icon-server" class="icon-server">Server</option>
							<option value="icon-settings-3" data-icon="icon-settings-3" class="icon-settings-3">Settings</option>
							<option value="icon-money-exchange" data-icon="icon-money-exchange" class="icon-money-exchange">Money Exchange</option>
							<option value="icon-headphones" data-icon="icon-headphones" class="icon-headphones">Headphones</option>
							<option value="icon-meeting" data-icon="icon-meeting" class="icon-meeting">Meeting</option>
							<option value="icon-calendar" data-icon="icon-calendar" class="icon-calendar">Calendar</option>
							<option value="icon-charts" data-icon="icon-charts" class="icon-charts">Charts</option>
							<option value="icon-api" data-icon="icon-api" class="icon-api">Api</option>
							<option value="icon-coins-2" data-icon="icon-coins-2" class="icon-coins-2">Coins-2</option>
							<option value="icon-brain" data-icon="icon-brain" class="icon-brain">Brain</option>
							<option value="icon-technical-support" data-icon="icon-technical-support" class="icon-technical-support">Technical Support</option>
							<option value="icon-browser-chat" data-icon="icon-browser-chat" class="icon-browser-chat">Browser Chat</option>
							<option value="icon-flow-chart" data-icon="icon-flow-chart" class="icon-flow-chart">Flow Chart</option>
							<option value="icon-email" data-icon="icon-email" class="icon-email">Email</option>
							<option value="icon-goal" data-icon="icon-goal" class="icon-goal">Goal</option>
							<option value="icon-earth" data-icon="icon-earth" class="icon-earth">Earth</option>
							<option value="icon-help" data-icon="icon-help" class="icon-help">Help</option>
							<option value="icon-browser-cmd" data-icon="icon-browser-cmd" class="icon-browser-cmd">Browser 6</option>
							<option value="icon-document" data-icon="icon-document" class="icon-document">Document</option>
							<option value="icon-deadline" data-icon="icon-deadline" class="icon-deadline">Deadline</option>
							<option value="icon-network" data-icon="icon-network" class="icon-network">Network</option>
							<option value="icon-coffee" data-icon="icon-coffee" class="icon-coffee">Coffee</option>
							<option value="icon-toolbox" data-icon="icon-toolbox" class="icon-toolbox">Toolbox</option>
							<option value="icon-browsers" data-icon="icon-browsers" class="icon-browsers">Browsers</option>
							<option value="icon-presentation" data-icon="icon-presentation" class="icon-presentation">Presentation</option>
							<option value="icon-cloud-computing" data-icon="icon-cloud-computing" class="icon-cloud-computing">Cloud Computing</option>
							<option value="icon-office-chair" data-icon="icon-office-chair" class="icon-office-chair">Office Chair</option>
							<option value="icon-browser-5" data-icon="icon-browser-5" class="icon-browser-5">Browser 5</option>
							<option value="icon-coinstwo" data-icon="icon-coinstwo" class="icon-coinstwo">Coins-1</option>
							<option value="icon-browser-error" data-icon="icon-browser-error" class="icon-browser-error">Browser Error</option>
							<option value="icon-coins" data-icon="icon-coins" class="icon-coins">Coins</option>
							<option value="icon-calendar22" data-icon="icon-calendar22" class="icon-calendar22">Calendar22</option>
							<option value="ocon-browsert-2" data-icon="icon-browser-2" class="icon-browser-2">Browser 2</option>
							<option value="icon-planning-strategy" data-icon="icon-planning-strategy" class="icon-planning-strategy">Planning Strategy</option>
							<option value="icon-businesswoman" data-icon="icon-businesswoman" class="icon-businesswoman">Businesswoman</option>
							<option value="icon-conversation" data-icon="icon-conversation" class="icon-conversation">Conversation</option>
							<option value="icon-boss" data-icon="icon-boss" class="icon-boss">Boss</option>
							<option value="icon-laptop-cog" data-icon="icon-laptop-cog" class="icon-laptop-cog">Laptop Cog</option>
							<option value="icon-businessman" data-icon="icon-businessman" class="icon-businessman">Businessman</option>
							<option value="icon-laptop-sequrity" data-icon="icon-laptop-sequrity" class="icon-laptop-sequrity">Laptop Sequrity</option>
							<option value="icon-brain-process" data-icon="icon-brain-process" class="icon-brain-process">Brain Process</option>
							<option value="icon-repair" data-icon="icon-repair" class="icon-repair">Repair</option>
							<option value="icon-bars" data-icon="icon-bars" class="icon-bars">Bars</option>
							<option value="icon-browser-solved" data-icon="icon-browser-solved" class="icon-browser-solved">Browser Solved</option>
							<option value="icon-browser-view" data-icon="icon-browser-view" class="icon-browser-view">Browser View</option>
							<option value="icon-money" data-icon="icon-money" class="icon-money">Money</option>
							<option value="icon-bank-1" data-icon="icon-bank-1" class="icon-bank-1">Bank-1</option>
							<option value="icon-bug-2" data-icon="icon-bug-2" class="icon-bug-2">Bug-2</option>
							<option value="icon-briefcase" data-icon="icon-briefcase" class="icon-briefcase">Briefcase</option>
							<option value="icon-settings-code" data-icon="icon-settings-code" class="icon-settings-code">Settings-1</option>
							<option value="icon-bank" data-icon="icon-bank" class="icon-bank">Bank</option>
							<option value="icon-online-support-boy" data-icon="icon-online-support-boy" class="icon-online-support-boy">Online Support Boy</option>
							<option value="icon-folder" data-icon="icon-folder" class="icon-folder">Folder</option>
							<option value="icon-online-support" data-icon="icon-online-support" class="icon-online-support">Online Support Girl</option>
							<option value="icon-handshake" data-icon="icon-handshake" class="icon-handshake">Handshake</option>
							<option value="icon-laptop-5" data-icon="icon-laptop-5" class="icon-laptop-5">Laptop-5</option>
							<option value="icon-megaphone" data-icon="icon-megaphone" class="icon-megaphone">Megaphone</option>
							<option value="icon-customer-support-1" data-icon="icon-customer-support-1" class="icon-customer-support-1">Customer Support-1</option>
							<option value="icon-laptop-4" data-icon="icon-laptop-4" class="icon-laptop-4">Laptop-4</option>
							<option value="icon-bug" data-icon="icon-bug" class="icon-bug">Bug</option>
							<option value="icon-24-hours" data-icon="icon-24-hours" class="icon-24-hours">24 Hours</option>
							<option value="icon-rating" data-icon="icon-rating" class="icon-rating">Rating</option>
							<option value="icon-settings" data-icon="icon-settings" class="icon-settings">Settings</option>
							<option value="icon-chat-1" data-icon="icon-chat-1" class="icon-chat-1">Chat</option>
							<option value="icon-customer-support" data-icon="icon-customer-support" class="icon-customer-support">Customer Support</option>
							<option value="icon-laptop-3" data-icon="icon-laptop-3" class="icon-laptop-3">Laptop-3</option>
							<option value="icon-badge" data-icon="icon-badge" class="icon-badge">Badge</option>
							<option value="icon-bill" data-icon="icon-bill" class="icon-bill">Bill</option>
							<option value="icon-box" data-icon="icon-box" class="icon-box">Box</option>
							<option value="icon-cash" data-icon="icon-cash" class="icon-cash">Cash</option>
							<option value="icon-coin" data-icon="icon-coin" class="icon-coin">Coin</option>
							<option value="icon-credit-card" data-icon="icon-credit-card" class="icon-credit-card">Credit Card</option>
							<option value="icon-delivery" data-icon="icon-delivery" class="icon-delivery">Delivery</option>
							<option value="icon-dislike" data-icon="icon-dislike" class="icon-dislike">Dislike</option>
							<option value="icon-dollar-symbol" data-icon="icon-dollar-symbol" class="icon-dollar-symbol">Symbol</option>
							<option value="icon-headphones22" data-icon="icon-headphones22" class="icon-headphones22">Headphones 2</option>
							<option value="icon-id-card" data-icon="icon-id-card" class="icon-id-card">Id Card</option>
							<option value="icon-invoice" data-icon="icon-invoice" class="icon-invoice">Invoice</option>
							<option value="icon-like" data-icon="icon-like" class="icon-like">Like</option>
							<option value="icon-mathematics" data-icon="icon-mathematics" class="icon-mathematics">Mathematics</option>
							<option value="icon-money22" data-icon="icon-money22" class="icon-money22">Money 2</option>
							<option value="icon-money-bag" data-icon="icon-money-bag" class="icon-money-bag">Money Bag</option>
							<option value="icon-monitor" data-icon="icon-monitor" class="icon-monitor">Monitor</option>
							<option value="icon-newspaper" data-icon="icon-newspaper" class="icon-newspaper">Newspaper</option>
							<option value="icon-package" data-icon="icon-package" class="icon-package">Package</option>
							<option value="icon-payment-method" data-icon="icon-payment-method" class="icon-payment-method">Payment Method</option>
							<option value="icon-pen" data-icon="icon-pen" class="icon-pen">Pen</option>
							<option value="icon-percentage" data-icon="icon-percentage" class="icon-percentage">Percentage</option>
							<option value="icon-piggy-bank" data-icon="icon-piggy-bank" class="icon-piggy-bank">Piggy Bank</option>
						
							<option value="icon-price-tag" data-icon="icon-price-tag" class="icon-price-tag">Price Tag</option>
							<option value="icon-profits" data-icon="icon-profits" class="icon-profits">Profits</option>
							<option value="icon-settings22" data-icon="icon-settings22" class="icon-settings22">Settings2</option>
							<option value="icon-shield" data-icon="icon-shield" class="icon-shield">Shield</option>
							<option value="icon-shop" data-icon="icon-shop" class="icon-shop">Shop</option>
							<option value="icon-shopping-bag" data-icon="icon-shopping-bag" class="icon-shopping-bag">Shopping Bag</option>
							
							<option value="icon-shopping-basket" data-icon="icon-shopping-basket" class="icon-shopping-basket">Shopping Basket</option>
							<option value="icon-shopping-cart" data-icon="icon-shopping-cart" class="icon-shopping-cart">Shopping Cart</option>
							
							<option value="icon-speech-bubble" data-icon="icon-speech-bubble" class="icon-speech-bubble">Speech Bubble</option>
							<option value="icon-speech-bubble-1" data-icon="icon-speech-bubble-1" class="icon-speech-bubble-1">Speech Bubble 1</option>
							<option value="icon-tag" data-icon="icon-tag" class="icon-tag">Tag</option>
							<option value="icon-telephone" data-icon="icon-telephone" class="icon-telephone">Telephone</option>
							<option value="icon-telephone-1" data-icon="icon-telephone-1" class="icon-telephone-1">Telephone 1</option>
							<option value="icon-trolley" data-icon="icon-trolley" class="icon-trolley">Trolley</option>
							<option value="icon-truck" data-icon="icon-truck" class="icon-truck">Truck</option>
							<option value="icon-truck-1" data-icon="icon-truck-1" class="icon-truck-1">Truck 1</option>
							<option value="icon-wallet" data-icon="icon-wallet" class="icon-wallet">Wallet</option>
							<option value="icon-care" data-icon="icon-care" class="icon-care">Care</option>
							<option value="icon-aeroplane" data-icon="icon-aeroplane" class="icon-aeroplane">Aeroplane</option>
							<option value="icon-tap" data-icon="icon-tap" class="icon-tap">Tap</option>
							<option value="icon-yatch" data-icon="icon-yatch" class="icon-yatch">Yatch</option>
							<option value="icon-fire" data-icon="icon-fire" class="icon-fire">Fire</option>
							<option value="icon-car" data-icon="icon-car" class="icon-car">Car</option>
							<option value="icon-headphones" data-icon="icon-headphones" class="icon-headphones">Headphones</option>
						</select>
					</div>
                    
                    
					<div class="form-group">
                        <label for="textfield" class="control-label">Image Size: 1366px×600px</label>
                        <div class="text-center">                            
                            <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                            <img src="<?php echo $record->image ?>" id="prev_img" class="fancybox">
                            
                            <?php }else{?>
                            <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" id="prev_img" class="fancybox" alt="No-Image">
                            <?php } ?>                            
                            <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&field_id=image' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Insert Image</a>
                            <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                            <button class="btn btn-danger" id="btn-imgremove" type="button"> Remove Image</button>
                            <?php } ?>
                            <input type="hidden" value="<?=isset($record->image)?$record->image:''?>" class="form-control" name="image" id="image">
                            <!-- <input type="hidden" value="<?=isset($record->image)?base_url().$record->image:''?>" class="form-control" name="image" id="image"> -->
                        </div>
                        <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? $record->image: ''; ?>" />
                        <!-- <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? base_url().$record->image: ''; ?>" /> -->
                    </div>
                    
                    
                 <!--	<div class="form-group">
                        <label for="textfield" class="control-label">Image Size: 1366px×600px</label>
                        <div class="text-center">                            
                            <?php if (isset($record->desc_image) && strlen($record->desc_image)>0) { ?>
                            <img src="<?php echo $record->desc_image ?>" id="desc_image" class="fancybox">
                          
                            <?php }else{?>
                            <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" id="desc_image" class="fancybox" alt="No-Image">
                            <?php } ?>                            
                            <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&field_id=desc_image' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Insert Image for Description</a>
                            <?php if (isset($record->desc_image) && strlen($record->desc_image)>0) { ?>
                            <button class="btn btn-danger" id="btn-imgremove" type="button"> Remove Image</button>
                            <?php } ?>
                            <input type="hidden" value="<?=isset($record->desc_image)?$record->desc_image:''?>" class="form-control" name="desc_image" id="desc_image">
                        
                        </div>
                        <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->desc_image) ? $record->desc_image: ''; ?>" />
                       
                    </div>   -->
                    
                  
                  
                  <div class="form-group">
						<label>Show on Footer ? </label>
						<input type="checkbox" name="showonfooter" value="1" style="margin-left: 15px;"
						<?php echo ( (isset($record->showonfooter) && $record->showonfooter == '1') || ( isset($_POST['showonfooter']) && $_POST['showonfooter'] == '1' )) ? 'checked' : '' ?>>
					</div>
                  
                  
                    
					<div class="form-group">
						<label>Published Date</label>
						<input type="text" name="published_date" id="published_date" class="form-control datepicker" value="<?php echo isset($_POST['published_date'])?$_POST['published_date']:(isset($record->published_date)?$record->published_date:date('Y-m-d')) ;?>">
						<?php echo form_error('published_date'); ?>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" id="status">
							<option value="1" <?php echo ( (isset($record->status) && $record->status == '1') || ( isset($_POST['status']) && $_POST['status'] == '1' )) ? 'selected' : '' ?>>Active</option>
							<option value="0" <?php echo ( (isset($record->status) && $record->status == '0') || ( isset($_POST['status']) && $_POST['status'] == '0' )) ? 'selected' : '' ?>>Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<input type="hidden" name="id" id="id" value="<?php echo isset($_POST['id'])?$_POST['id']:(isset($record->id)?$record->id:'') ;?>" class="form-control">
						<input type="hidden" name="process" value="true" >
						<button type="submit" class="btn btn-primary" >Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="<?=ADMIN_RESOURCE_PATH?>dropdown/style1.css" />
<!-- <link rel="stylesheet" type="text/css" href="icons/style.css" /> -->
<script src="<?=ADMIN_RESOURCE_PATH?>app_js/modernizr.custom.63321.js"></script>
<script type="text/javascript" src="<?=ADMIN_RESOURCE_PATH?>app_js/jquery.dropdown.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
	$( function() {
		var a=<?php echo json_encode(isset($record->icon)?$record->icon:''); ?>;
		$(".selectpicker").val(a);
		$( ".selectpicker" ).append( "selected" );
	});
	$('.selectpicker').selectpicker({
		style: 'btn-primary',
		size: 10,
	});
</script>
<style type="text/css">
	span.glyphicon, span i.glyphicon span .glyphicon:before, span i.glyphicon:before,  span i.glyphicon:before {
font-family: 'icomoon' !important;
font-style: normal;
speak: none;
font-weight: normal;
position: absolute;
font-size: 20px;
line-height: 32px;
width: 50px;
top: 50%;
left: -4px;
margin-top: -16px;
text-align: center;
}
.filter-option.pull-left i {
float: left;
height: 30px;
width: 30px;
margin-right: 10px;
margin-left: -10px;
}
.filter-option.pull-left {
line-height: 2;
}
a[class^="icon-"]::before,  a[class*=" icon-"]::before{
	/*position: absolute;*/
font-family: 'icomoon' !important;
/*display: none;*/
width: 40px;
}
a span.glyphicon{
	display: none;
}
</style>
<script type="text/javascript">
	$( ".cd-select li:first-child" ).click(function() {
$( ".cd-select li" ).toggle();
});
</script>