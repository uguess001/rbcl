<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="padding-left:280px; text-align:center;">
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="modal-body">
      	<img class="card-img-top img-responsive" id="image" src="" alt="Card image cap" style="width:20%;" id="modal_image"> 
 		
 		<h5 id="name" ></h5>
        <p id="post"></p>
      	<p id="Description"></p>
      
      	<br>
      	<p id="phone"></p>
      	<p id="email"></p>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<script>
$(function () {
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var name = button.data('name'); // Extract info from data-* attributes
    var description = button.data('description'); // Extract info from data-* attributes
    var image = button.data('image'); // Extract info from data-* attributes
    var post = button.data('post'); // Extract info from data-* attributes
    var phone = button.data('phone'); // Extract info from data-* attributes
    var email = button.data('email'); // Extract info from data-* attributes

   
    var modal = $(this);
    modal.find('#name').text(name);
    modal.find('#post').text(post);
    modal.find('#phone').text(phone);
    modal.find('#email').text(email);
    modal.find('#Description').html(description);
	$('#image').attr('src', image);

	$("#myModal").modal();
  });
});
</script>



<div class="container">
	<div class="clearfix"></div>
	<div class="ins-branches">
		<div class="row">
			<div class="col-12 ">
				<h2 class="title-branch"><?php echo ($lang=='np')?'व्यवस्थापन समुह':'Management Team';?></h2>
				<p style="text-align:justify;">Rastriya Beema Company Ltd. has been promoted by a young team of reputed Industrial and Business Houses of Nepal having vast experience and excellent leadership that has steered their respective companies through the years. There are seventeen individuals representing the various walks of life. They represent various diversified fields like Banking, Insurance, Trading, Manufacturing, Aviation, Tourism etc. The Company expects to achieve success under their able guidance. The below mentioned Managers are responsible for the supervision of the overall affairs of the Company.</p>
			</div>
			<div class="col-12">
				<section class="managementteam">
					
					<?php 

					foreach ($management_team as $key => $value) {
						if($key==0){ ?>

								<div class="col-lg-12">
									<div class="card">
										<a href="#" data-toggle="modal" data-target="#exampleModal" data-Name="<?=$value->name?>" data-Image="<?=$value->image?>  " data-Post="<?=$value->post?>"  data-Description="<?=$value->description?>" data-phone="<?=$value->phone?>" data-email="<?=$value->email?>">
											<img class="card-img-top img-responsive" src="<?php echo ($value->image == 'No Image')?RESOURCE_PATH.'no-image.png':$value->image ?>" alt="Card image cap">
											<div class="card-header"><span style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?= $value->name;?></span></div>
											<div class="card-body"><?= $value->post?></div>
										</a>
									</div>
								</div>
								<hr>
						<?php }else{ ?>
						<div class="col-lg-4" style="float:left;">
							<div class="card">
								<a href="#" data-toggle="modal" data-target="#exampleModal" data-Name="<?=$value->name?>" data-Image="<?=$value->image?>  " data-Post="<?=$value->post?>"  data-Description="<?=$value->description?>" data-phone="<?=$value->phone?>" data-email="<?=$value->email?>">
								<img class="card-img-top img-responsive" src="<?php echo ($value->image == 'No Image')?RESOURCE_PATH.'no-image.png':$value->image ?>" alt="Card image cap">
								<div class="card-header"><span style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?= $value->name;?></span></div>
								<div class="card-body"><?= $value->post?></div>
								</a>								
							</div>
						</div>
					<?php } }  	?>

					</div>
				</section>


			</div>
		</div>

		<hr>




		<div class="row for_branch_manager_list" style="display: none;">
			<div class="col-12">
				<h2 class="title-branch"><?php echo ($lang=='np')?'क्षेत्र प्रमुख र शाखा प्रबन्धक':'Section Chief & Branch Manager';?></h2>
			</div>
			<?php if(isset($branch_manager) && !empty($branch_manager)) :
			foreach ($branch_manager as $value) :
			?>
			<div class="col-12 col-lg-3">
				<div class="card">
					<!-- <img class="card-img-top" src="<?php // echo ($value->image == 'No Image')?RESOURCE_PATH.'no-image.png':$value->image ?>" alt="Card image cap"> -->
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