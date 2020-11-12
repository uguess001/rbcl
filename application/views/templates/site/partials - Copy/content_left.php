<section class="quote_area">
	<div class="container">
		<div class="row">
				<div class="col-12 col-md-6 ">
				<div class="ss-new">
					<div class="section_title_news "> <?php echo $this->lang->line('innder_content_update');?></div>
				<div class="new-list-latest demo5 demof">
					<ul class="list-unstyled">
						<?php if(!empty($news)) {
						foreach ($news as $value){ 

							?>
							<li class="news-item">

											<?php if(isset($value->image) && $value->image !=''){ ?>
													<img  src="<?=$value->image?>" alt="<?=$value->title;?>">
											<?php }else{ ?>
													<img src="http://rbcl.com.np/application/resources/admin/assets/source/fire%20(1).jpg" class="new-image-view">
						                    <?php } ?>            


                        <span><?php
											$createdOn= date('Y-m-d', strtotime($value->CreatedOn));
											echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
											?></span>
                        <p><?=$value->title;?></p> 
                       <a href="<?=base_url().'news/'.$value->slug?>">Read More</a>
                      </li>
						
						<?php } }?>
					</ul>
				</div>
				<span class="f-right-area">
					 <a style="padding: 5px;" href="<?=base_url().'news'?>">More Updates</a>
					<div class="list-group">
						<a href="#" class="btnUp"><i class="fa fa-angle-up"></i></a>
						<a href="#" class="btnDown"><i class="fa fa-angle-down"></i></a>
					</div>
				</span>
				</div>
				
			</div>










			<div class="col-12 col-lg-6 ">
				<div class="m-section-quote">
				<div class="section_title"> <?php echo $this->lang->line('insure_what');?> <span><?php echo $this->lang->line('get_quote');?></span> </div>
				<div class="row no-gutters">
					<!-- <div class="col-12 col-lg-3">
						<div class="box-auto_pro" data-toggle="modal" data-target="">
							<div class="top_title_autopro"> Bundle & sve 50% <span>in auto Insurance</span> </div>
							<img src="<?=RESOURCE_PATH?>img/apartment.png" alt="Auto Property">
							<div class="quote_title" >Auto Property</div>
						</div>
					</div> -->
					<div class="col-12 col-lg-12">
						<div class="row list_quote no-gutters">
							<?php
							if(isset($services) && !empty($services)){
								$a=0;
							foreach ($services as $value) {
								if($a<5){
							?>
							<div class="col-12 col-sm-6 col-lg-4 " >
								<div class="box-others"  id="<?=$value->id?>" onclick="PopModal(<?=$value->id?>)">
									<div class="image_holder_quote"> <span class="<?=$value->icon?>"></span> </div>
									<div class="quote_title"><?=$value->title?></div>
								</div>
							</div>
							<?php $a++; } } } ?>
							
							<div class="col-12 col-sm-6 col-lg-4">
								<div class="box-others" data-toggle="modal" data-target="#exampleModal1">
									<div class="image_holder_quote"> <span class="icon-tap"></span> </div>
									<div class="quote_title"><?php echo ($lang=='np')?'थप छनोटहरू':'More Choices'?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				<!--Modal starts here-->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document" style="max-width: 80%;">
						<div class="modal-content">
							<div class="modal-body custom-dropdown-s">
								<div class="modal-title-area">
									<div class="text-center">
										
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-lg-6" >
										<label id="heading"></label>
										<div id="servicesdetails"></div>
									</div>
									<div class="col-12 col-lg-6">
										<form id="modalform" method="post" action="<?=base_url()?>welcome/send_quote">
											<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
											<div class="row">
												<div class="col-12 col-lg-12">
													<label>
														<span>
															<input class="form-control" type="text" required placeholder="<?php echo ($lang=='np')?'पुरा  नाम':'Full Name';?>"" name="name">
														</span>
													</label>
												</div>
												<div class="col-12 col-lg-12">
													<label>
														<span>
															<input class="form-control" type="number"  placeholder="<?php echo ($lang=='np')?'फोन':'Phone';?>" name="phone">
														</span>
													</label>
												</div>
												<div class="col-12 col-lg-12">
													<label>
														<span>
															<input class="form-control" type="email" required placeholder="<?php echo ($lang=='np')?'इमेल':'Email';?>" name="email">
														</span>
													</label>
												</div>
												<div class="col-12 col-lg-12">
													<label>
														<span>
															<textarea name="message" rows=5 class="form-control"  placeholder="<?php echo ($lang=='np')?'सन्देश....':'Message....';?>"></textarea>
														</span>
													</label>
												</div>
												<div class="col-12 col-lg-12">
													<!--<strong><?php echo ($lang=='np')?'उद्धरण फाईल दिइएको इमेल ठेगानामा पठाइनेछ':'The quotation file will be send to the given email address' ?></strong>-->
												</div>
											</div>
											
											
											<div class="clearfix"></div>
											<div class="row">
												<div class="col">
													<div class="mar-10">
														<button type="modalform" class="btn btn-success send">
														<?php echo ($lang=='np')?'पठाउनुहोस्':'Submit' ?>
														</button>
													</div>
												</div>
											</div>
											<input type="hidden" name="insurance" value="" id="insurance">
										</form>
									</div>
								</div>
								
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo ($lang=='np')?'बन्द गर्नुहोस्':'Close' ?></button>
								
							</div>
						</div>
					</div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="section_title" style="padding-top:30px; "><span>Select a service to get a quote</span> </div>
							<div class="modal-body services_list">
								<ul class="list-unstyled">
									<?php
									if(isset($services) && !empty($services)):
										foreach ($services as $value):
									?>
									<li>
										<a id="<?=$value->id?>" onclick="PopModal(<?=$value->id?>)" data-toggle="modal" data-dismiss="modal">
											<span class="<?=$value->icon?>"></span> <?=$value->title?>
										</a>
									</li>
									<?php endforeach;
									endif;
									?>
									
								</ul>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!--End of modal-->
			</div>
		</div>
	</div>
</section>













<!-- <section class="about_section" style="background: white;">
	<div class="container">
		<div class="row">

	<div class=""> <img src="<?=RESOURCE_PATH?>img/rbclCustom.png" alt="Image with plant on Hand"> 
	</div>
	</div>
	</div>
</section> -->






<section class="about_section">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="section_title_abt">
					<?php echo $this->lang->line('whyrbcl'); ?>?
				</div>
				<div class="content_why">
					<p><?=isset($about_us)?(word_limiter($about_us->description,33,'')):''?></p>
				</div>
				<div class="btn-area">
					<a href="<?=base_url().'pages/introduction-to-rbcl'?>"><?php echo $this->lang->line('dor_data_list_view'); ?> </a>
					<!-- Read More -->
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<div class="row no-gutters">
					<div class="col-12 col-lg-4">
						<div class="box-claim">
							<div class="box-title"><?php echo ($lang=='np')?'दावी सम्मानित':'Claims Honoured';?></div>
							<div class="box-content_a">
								<div class="per_">
									90.21%
								</div>
								<p>
									<!-- <span class="stresk">**</span> -->
									<span><?=isset($honour->description)?$honour->description:''?></span>
								</p>
								
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4">
						<div class="box-trust">
							<div class="box-title"><?php echo ($lang=='np')?'ब्रान्डमा भरोसा':'Trust on Brand';?></div>
							<div class="box-content_a">
								<ul class="list-inline list-unstyled">
									<li class="list-inline-item"><img src="<?=RESOURCE_PATH?>img/nlogo.png" alt="RBCL Logo"></li>
									<li class="list-inline-item"><img src="<?=RESOURCE_PATH?>img/logo.png" alt="RBCL Logo"></li>
								</ul>
								<p>
									<span>	<?=isset($trust->description)?$trust->description:''?></span>
								</p>
								
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4">
						<div class="box-leader">
							<div class="box-title"><?php echo ($lang=='np')?'उत्तम बीमा कम्पनी':'Insurance Leader';?></div>
							<div class="box-content_a">
								<div class="per_">
									<img src="<?=RESOURCE_PATH?>img/leaders.png" alt="RBCL Logo">
								</div>
								<p>
									<!-- <span class="stresk">**</span> -->
									<?=isset($leader->description)?$leader->description:''?>
								</p>
								
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="table-border-bg"></div>
</section>



<section class="news_section">
	<div class="container">
		<div class="row">
			

<div class="row">
			

					<div class="col-md-4 testimonials home_test left">
							<div class="test-sect">
							<div class="section_title_news text-center"> <?php echo $this->lang->line('label_gallery');?> </div>
							<div class="ga_content">
							<div class="sidebar-content">
								<div id="galleryslider" class="carousel slide" data-ride="carousel">
									 <ol class="carousel-indicators">
										<?php
										$slide=0;
										$counter = 0;
										$counter = 'active';
										if(isset($list) && !empty($list)) :
										foreach ($list as $value) : ?>
										
										<li data-target="#galleryslider" data-slide-to="<?=$slide++?>" class="<?=$counter++?>"></li>
										<?php
										endforeach;
										endif;
										?>
										
									</ol>  
									<div class="carousel-inner1">
										
										<?php
										$counter = 0;
										$counter = 'active';
										foreach ($list as $value) : ?>
										<div class="carousel-item <?=$counter++;?>">
											<a href="<?=base_url().'gallery/GetDetails/'.$this->Encryption->encode($value->id)?>">
												<img class="d-block w-" src="<?=$value->image?>" alt=""  >
											</a>
											
										</div>

										<?php endforeach; ?>
									</div>
									<a class="carousel-control-prev" href="#galleryslider" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#galleryslider" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
								</div>
										
							</div>
							</div>
							</div>
							<div class="text-center news_button"> <a href="<?=base_url().'gallery'?>" class="btn btn-primary btnlogn"> <?php echo $this->lang->line('label_view_all'); ?></a> </div>
					</div>

					

					<div class="col-12 col-lg-8"> 

						<div class="section_title_news text-center"> Our Product </div>
						
						<?php 
						foreach ($services as $key => $value) { 
							// echo "<pre>";
							// print_r($value);

							?>


							<div class="card" style="width: 12rem; float:right; margin: 5px;">
								<div class="card-body">
									<h5 class="card-title"><?=$value->title?></h5>
									<a href="<?=base_url().'services/'.$value->slug?>" class="btn btn-primary" style="margin-top: 5px;">View Details</a>
								</div>
							</div>

						<?php 
						}
						?> 


					</div>

</div>
     


			</div>
		</div>
		
	</section>







	<section style="display: none;">
		<div class="demo">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<h2 class="title-branch">Testimonials</h2>
					</div>
					<div class=" col-md-12">
						
						<div class="custom-control">
							<ul class="list-unstyled list-inlin">
								<?php
								$counter = 0;
								
								foreach ($testimonials as $value) :
									
								?>
								<li data-slide="<?=$counter?>" class="<?=($counter==0)?'active':''?> cs-control list-inline-item"><img src="<?=base_url().'uploads/testimonials/'.$value->image?>" alt=""></li>
								<?php
								$counter++;
								endforeach; ?>
							</ul>
						</div>
						<div id="owl-example" class="owl-carousel">
							<?php
							$counter = 0;
							
							foreach ($testimonials as $value) :
								$counter+=1;
							?>
							<div class="owl-slide testimonial">
								
								<div class="testimonial-content">
									<h3 class="testimonial-title"><?=$value->name?></h3>
									<p class="description">
										<?=isset($value->description)?(strip_tags($value->description)):''?>
										
									</p>
								</div>
							</div>
							<?php endforeach; ?>
							
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="news_section" style="display: none;">
		<div class="section_title_news text-center"> For the Press </div>
		<div class="container">
			<div class="row">
				<?php
							if(isset($news) && !empty($news)) :
				foreach ($news as $value) : ?>
				<div class="col-12 col-lg-4">
					<div class="card">
						<?php if(isset($value->image) && !empty($image)):?>
						<img class="card-img-top" src="<?=base_url().'uploads/news'.$value->image?>" alt="<?=$value->title;?>">
						<?php endif; ?>
						<div class="card-body"> <span class="news_date"><?=date('Y-m-d', strtotime($value->CreatedOn));?> </span>
						<h4 class="card-title"><?=$value->title;?></h4>
						<p class="card-text"><?= word_limiter($value->description, 10);?></p>
						<a href="<?=base_url().'news/GetDetails/'.$this->Encryption->encode($value->id)?>" class="achor_link"><?php echo $this->lang->line('dor_data_list_view'); ?></a> </div>
					</div>
				</div>
				<?php endforeach;
				endif;
				?>
			</div>
		</div>
		<div class="text-center news_button"> <a href="<?=base_url().'news'?>" class="btn btn-primary btnlogn"> <?php echo $this->lang->line('label_view_all'); ?></a> </div>
	</section>


	<!-- 
	<section class="home_branches">
		<div class="container">
			<div class="col-12 text-center">
				<h2 class="title-branch"><?php echo $this->lang->line('our_branches');?></h2>
			</div>
			<div class="row no-gutters">
				<?php if(isset($branch_office) && !empty($branch_office)) :
					foreach ($branch_office as $value) :
				?>
				<div class="col-12 col-lg-4">
					<div class="br_area">
						<ul class="list-unstyled">
							<li><?=isset($value->address)?$value->address:'';?></li>
							<li class="phone_braches"> <?php echo  ($lang == 'np')?changeNumberUnicode(trim($value->phone)):
							trim($value->phone);?></li>
							<li class="fax_braches"> <?php echo  ($lang == 'np')?changeNumberUnicode(trim($value->fax)):trim($value->fax);?> </li>
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
	<section class="branches_list" style="padding: 20px 0; display: none;">
		<div class="container">
			<div class="clearfix"></div>
			<div class="ins-branches">
				
				<div class="row">
					<div class="col-12 text-center">
						<h2 class="title-branch">Our Branches</h2>
					</div>
					<?php if(isset($branch_office) && !empty($branch_office)) :
					foreach ($branch_office as $value) :
					?>
					<div class="col-12 col-lg-3">
						<ul class="list-unstyled">
							<li><?=$value->address;?></li>
							<li><i class="fa fa-phone"></i> <?=$value->phone;?></li>
							<li><i class="fa fa-fax"></i> <?=$value->fax?> </li>
							<?php if(isset($value->email) && !empty($value->email)){ ?>
							<li><i class="fa fa-email"></i> <?=$value->email?> </li>
							<?php } ?>
						</ul>
						
					</div>
					<?php
					endforeach;
					endif;
					?>
				</div>
			</div>
		</div>
		
	</div>
</section> -->

<div class="section_title_news text-center">  Business Partner </div>




<div class="clearfix"></div>
<section class="footer-top1" style="height: 100px;">
	<div class="container">
		<div class="row">
			<div class="container_bissnuss">
			<div class="marquee">
			<div class="img1"><a href="https://www.nepalairlines.com.np" target="_blank"><img src="<?=base_url().'uploads/partner/NepalAirline.png'?>"     style="height: 55px;"></a> </div> 
			<div class="img1"><a href="http://noc.org.np" target="_blank"><img src="<?=base_url().'uploads/partner/noc.png'?>" style="height: 55px;"></a>  </div> 
			<div class="img1"><a href="https://www.nrb.org.np" target="_blank"><img src="<?=base_url().'uploads/partner/nrb.png'?>" style="height: 55px;"></a>  </div> 
			<div class="img1"><a href="http://www.sipradi.com.np" target="_blank"><img src="<?=base_url().'uploads/partner/sipradi.png'?>" style="height: 55px;"></a>  </div> 
			<div class="img1"><a href="https://www.nrcs.org" target="_blank"><img src="<?=base_url().'uploads/partner/NepalRedCross.png'?>" style="height: 55px;"></a>  </div> 
			<div class="img1"><a href="https://www.ntc.net.np" target="_blank"><img src="<?=base_url().'uploads/partner/NepalTelecom.png'?>" style="height: 55px;"></a>  </div> 
			<div class="img1"><a href="http://site.epfnepal.com.np" target="_blank"><img src="<?=base_url().'uploads/partner/EmployeesPF.png'?>" style="height: 55px;"></a>  </div> 
			
			</div>
			</div>

		</div>
	</div>
</section>





<div class="clearfix"></div>
<section class="footer-top">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 cc_small"> <a href="<?=base_url().'tender'?>"> <img src="<?=RESOURCE_PATH?>img/tasks.png" alt="Tenders"> <span><?php echo $this->lang->line('label_nav_TENDER');?> </span></a>  </div>
			<div class="col-12 col-lg-4"> <a href="<?=base_url().'testimonials'?>"> <img src="<?=RESOURCE_PATH?>img/testi.png" alt="Testimonials"> <span> <?php echo $this->lang->line('label_testimonials');?> </span> </a> </div>
			<div class="col-12 col-lg-4" data-toggle="modal" data-target="#callback"> <a href="#"> <img src="<?=RESOURCE_PATH?>img/request call back.png" alt="Request a Call Back"> <span> <?php echo $this->lang->line('request_call');?> </span> </a> </div>
		</div>
	</div>
</section>




<style>
.container_bissnuss {
padding:3px;
width:100%;
overflow:hidden;
}
.marquee{
display:block;
position:relative;
width:100%;
height:160px;
animation:scroll 30s linear infinite;
padding:3px;
}

.marquee:hover {
animation-play-state: paused
}

.img1 {
max-width:150px;
margin:3px;
float:left;
padding-left: 15px;
}

/* Make it move */
@keyframes scroll{
0% {left:800px;}
100% {left:-800px;}
}
</style>













<!--Modal starts here-->
<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body custom-dropdown-s">
				<div class="modal-title-area">
					<div class="text-center">
						<label><?php echo $this->lang->line('request_call');?></label>
					</div>
				</div>
				<form id="callbackform" method="post" action="<?=base_url()?>welcome/callback">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<div class="row">
						<div class="col-12 col-lg-12">
							<label>
								<span>
									<input class="form-control" type="text" required placeholder="<?php echo ($lang=='np')?'पुरा  नाम':'Full Name';?>" name="name">
								</span>
							</label>
						</div>
						<div class="col-12 col-lg-12">
							<label>
								<span>
									<input class="form-control" type="number" required  placeholder="<?php echo ($lang=='np')?'फोन':'Phone';?>" name="phone">
								</span>
							</label>
						</div>
						<div class="col-12 col-lg-12">
							<label>
								<span>
									<input class="form-control" type="text"  placeholder="<?php echo ($lang=='np')?'ठेगाना':'Address';?>" name="address">
								</span>
							</label>
						</div>
						
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col">
							<div class=" mar-10">
								<button type="submit" class="btn btn-success send">
								<?php echo ($lang=='np')?'पठाउनुहोस्':'Send Request';?>
								</button>
							</div>
						</div>
					</div>
				</form>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo ($lang=='np')?'बन्द':'Close';?></button>
				
			</div>
		</div>
	</div>
</div>
<!--End of modal-->
<script src="<?=RESOURCE_PATH?>js/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<!-- <script type="text/javascript" src="http://kenwheeler.github.io/slick/slick/slick.js"></script> -->
<!-- <script type="text/javascript" src="http://kenwheeler.github.io/slick/js/scripts.js"></script> -->
<!-- <script>
function PopModal(ele)
{
	var id = ele.id;
	if(id==1)
	{
		$("#heading").text("Auto Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
	else if(id==2)
	{
		$("#heading").text("Aviation Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
	else if(id==3)
	{
		$("#heading").text("Fire Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
	else if(id==4)
	{
		$("#heading").text("Marine Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
	else if(id==5)
	{
		$("#heading").text("Medical Aid Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
	else if(id==6)
	{
		$("#heading").text("Miscellaneous Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
	else if(id==7)
	{
		$("#heading").text("Engineering  Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
	else if(id==8)
	{
		$("#heading").text("Traveling Medical Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
	else{
		$("#heading").text("Professional Indemnity Insurance");
		$("#exampleModal").modal('show');
		$("#insurance").val(id);
	}
}
</script> -->
<script>
	function PopModal($id){
		$.ajax({
type:'GET',
url:"http://rbcl.com.np/welcome/getQuoteModal/"+$id,
beforeSend: function() {
$('#detail').html('');
},
success: function(response){
	var r = $.parseJSON(response);
$('#exampleModal').modal('show');
$('#heading').html(r.title);
$('#servicesdetails').html(r.description);
$('#insurance').val(r.id);
}
});
	}
</script>
<script>
	$("#modalform").validate({
			rules: {
			name: "required",
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
name: "<?php echo ($lang=='np')?'कृपया आफ्नो नाम भर्नुहोस्':'Please specify your name' ;?>",
phone: {
minlength: "<?php echo ($lang=='np')?'नम्बर 10 अंक हुनुपर्छ':'Number Should Be 10 Digit' ;?>"
},
email: {
required: "<?php echo ($lang=='np')?'हामीलाई तपाईंलाई सम्पर्क गर्न तपाईको इमेल ठेगाना चाहिन्छ':'We need your email address to contact you' ;?>",
email: "<?php echo ($lang=='np')?'तपाईंको इमेल ठेगाना नाम@domain.com को ढाँचामा हुनु पर्छ':'Your email address must be in the format of name@domain.com' ;?>"
}
}
});
</script>
<script>
	$("#callbackform").validate({
		rules: {
		name: "required",
		email: {
		required: true,
		email: true
		},
		phone: {
		required: true,
		minlength: 10,
		maxlength:10,
		}
		},
		messages: {
name: "<?php echo ($lang=='np')?'कृपया आफ्नो नाम भर्नुहोस्':'Please specify your name' ;?>",
phone: {
required: "<?php echo ($lang=='np')?'कृपया आफ्नो फोन नम्बर भर्नुहोस्':'Please enter your phone number' ;?>",
minlength: "<?php echo ($lang=='np')?'नम्बर 10 अंक हुनुपर्छ':'Number Should Be 10 Digit' ;?>"
},
}
});
</script>
<style type="text/css">
	.ss-new{
		background: white;
		border: 1px solid #ccc;
		border-top-right-radius: 10px;
		float: left;
		width: 100%;
	}
	.ss-new .section_title_news {
    background: #3e4098;
    color: white;
    margin: 0;
    padding: 15px;
    line-height: 1;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    margin-bottom: 3px;
    font-size: 16px;
}
.ss-new  p{
	font-size: 11px;
	margin-bottom: 0;
}
	.demo5 ul{
		width: 100%;
		padding: 0 10px;
	}
	.demo5 li{clear:both; background: #fff; padding: 10px 0; overflow: hidden;}
.demo5 li img{width: 80px !important; float: left; clear:both; margin-right: 10px;}
.demo5 li a{color: #8C0404; font-size:14px; }
span.f-right-area {
    float: left;
    width: 100%;
    border-top: 1px solid #ccc;
    margin-top: 7px;
}
.list-group {
    display: block;
    padding: 10px;
    float: right;
}
.list-group a {float: left;font-size: 1rem;padding: 2px 15px;border: 1px solid #333;color: red;margin: 0 5px;}




</style>
