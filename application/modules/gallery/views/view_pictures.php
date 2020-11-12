<!-- image gallery back up -->


<section class="top_innerpage" style="background: url(<?=RESOURCE_PATH?>img/slide1.jpg);background-position: 70% 0;">

  <div class="ti-content text-center">
   

    <div class="breadcrums">

      <ol class="list-unstyled list-inline">

        <li class="list-inline-item breadcrumb-item"><a href="#"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url().'gallery'?>"><?php echo $this->lang->line('label_gallery'); ?></a></li>
        <li class="list-inline-item breadcrumb-item"><a href="#"><?=$albumname->title;?></a></li>

        <!-- <li class="list-inline-item breadcrumb-item active" aria-current="page">AGM 2017</li> -->

      </ol>

    </div>

  </div>

</section>

<div class="clearfix"></div>

<section class="inner-page gallery">

  <div class="container">
  	<div class="page-title-"><?=$albumname->title;?></div>

    <div class="row thumbs">

    <?php if(isset($list) && !empty($list)) :

    		foreach ($list as $value) :

     ?>

        <div class="col-md-4 col-sm-4 col-xs-6">

			<a id="firstlink" class="venobox" data-gall="gall1" data-title="<?=$value->title;?>" href="<?=base_url().'uploads/gallery/'.$value->image?>" alt="<?=$value->title;?>"> 

				<img src="<?=base_url().'uploads/gallery/'.$value->image?>" alt="<?=$value->title;?>"> 

			</a> 

		</div>

	<?php 

		endforeach;

	endif;



	?>

<!--         <div class="col-md-4 col-sm-4 col-xs-6"> 

			<a class="venobox" data-gall="gall1" data-title="Breakfast Recipe - Basik" href="img/gallery/pinhole_wedding_08-675x450.jpg"> 

				<img src="img/gallery/pinhole_wedding_08-675x450.jpg" alt="Breakfast Recipe - Basik"> 

			</a>

		</div>

        <div class="col-md-4 col-sm-4 col-xs-6">

			<a class="venobox" data-gall="gall1" data-title="Breakfast Recipe - Basik" href="img/gallery/pinhole_kids_15-675x450.jpg"> 

				<img src="img/gallery/pinhole_kids_15-675x450.jpg" alt="Breakfast Recipe - Basik"> 

			</a>

		</div>

        <div class="col-md-4 col-sm-4 col-xs-6"> 

			<a class="venobox" data-gall="gall1" data-title="Breakfast Recipe - Basik" href="img/gallery/pinhole_kids_15-675x450.jpg"> 

				<img src="img/gallery/pinhole_kids_15-675x450.jpg" alt="Breakfast Recipe - Basik"> 

			</a>

		</div>

        <div class="col-md-4 col-sm-4 col-xs-6">

			<a class="venobox" data-gall="gall1" data-title="Breakfast Recipe - Basik" href="img/gallery/pinhole_kids_15-675x450.jpg"> 

				<img src="img/gallery/pinhole_kids_15-675x450.jpg" alt="Breakfast Recipe - Basik"> 

			</a>

		</div>

        <div class="col-md-4 col-sm-4 col-xs-6">

			<a class="venobox" data-gall="gall1" data-title="Breakfast Recipe - Basik" href="img/gallery/pinhole_kids_15-675x450.jpg"> 

				<img src="img/gallery/pinhole_kids_15-675x450.jpg" alt="Breakfast Recipe - Basik"> 

			</a>

		</div> -->

     

    </div>

  </div>

</section>







<div class="title_bar">

    <h4><?=$data->album_title?></h4>

</div>



<div class="image_gallery">

	 <div class="">



		<?php if(!empty($data->picturelist)) { 

		          //foreach ($data->picturelist as $key => $value) {

		    for ($i=1; $i <= count($data->picturelist); $i++) {  ?>

				  <div class="column">

				    <img src="<?=$data->filepath.$data->picturelist[$i-1]->Name?>" onclick="openModal();currentSlide(<?=$i?>)" class="hover-shadow" alt="<?=$data->picturelist[$i-1]->Title?>">

				  </div>

			<?php }

		} ?>



	<!--   <div class="column">

	    <img src="<?=base_url();?>uploads/news/ABZ7fzaGwK170419042822.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow">

	  </div>

	  <div class="column">

	    <img src="<?=base_url();?>uploads/news/vQTqUBH54C170402042324.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow">

	  </div>

	  <div class="column">

	    <img src="<?=base_url();?>uploads/news/iTA3T3RrCR170406014807.jpg" onclick="openModal();currentSlide(4)" class="hover-shadow">

	  </div> -->

	</div>





	<div id="myModal" class="modal">

	  <span class="close cursor" onclick="closeModal()"> <i class="fa fa-times"></i> </span>

	  <div class="modal-content">

	    <?php if(!empty($data->picturelist)) { foreach ($data->picturelist as $key => $value) {?>

		    <div class="mySlides">

		      <div class="numbertext">1 / 4</div>

		        <img class="demo" src="<?=$data->filepath.$value->Name?>" alt="<?=$data->filepath.$value->Name?>" style="width:100%">

		    </div>

	    <?php } } ?>



	<!--     <div class="mySlides">

	      <div class="numbertext">2 / 4</div>

	        <img src="<?=base_url();?>uploads/news/ABZ7fzaGwK170419042822.jpg" style="width:100%">

	    </div>



	    <div class="mySlides">

	      <div class="numbertext">3 / 4</div>

	        <img src="<?=base_url();?>uploads/news/vQTqUBH54C170402042324.jpg" style="width:100%">

	    </div>



	    <div class="mySlides">

	      <div class="numbertext">4 / 4</div>

	        <img src="<?=base_url();?>uploads/news/iTA3T3RrCR170406014807.jpg" style="width:100%">

	    </div> -->



		    <a class="prev" onclick="plusSlides(-1)"><i class="fa fa-angle-left fa-2x"></i> </a>

		    <a class="next" onclick="plusSlides(1)"><i class="fa fa-angle-right fa-2x"></i></a>



		    <div class="caption-container">

		      <p id="caption"></p>

		    </div>



	    <!-- <div class="column">

	      <img class="demo" src="<?=base_url();?>application/resources/site/img/map_2.jpg" onclick="currentSlide(1)" alt="Nature">

	    </div>



	    <div class="column">

	      <img class="demo" src="<?=base_url();?>uploads/news/ABZ7fzaGwK170419042822.jpg" onclick="currentSlide(2)" alt="Trolltunga">

	    </div>



	    <div class="column">

	      <img class="demo" src="<?=base_url();?>application/resources/site/img/map_2.jpg" onclick="currentSlide(3)" alt="Mountains">

	    </div>



	    <div class="column">

	      <img class="demo" src="<?=base_url();?>application/resources/site/img/map_2.jpg" onclick="currentSlide(4)" alt="Lights">

	    </div> -->

	  </div>

	</div>





</div>



<script>

function openModal() {

  document.getElementById('myModal').style.display = "block";

}



function closeModal() {

  document.getElementById('myModal').style.display = "none";

}



var slideIndex = 1;

showSlides(slideIndex);



function plusSlides(n) {

  showSlides(slideIndex += n);

}



function currentSlide(n) {

  showSlides(slideIndex = n);

}



function showSlides(n) {

  var i;

  var slides = document.getElementsByClassName("mySlides");

  var dots = document.getElementsByClassName("demo");

  var captionText = document.getElementById("caption");

  if (n > slides.length) {slideIndex = 1}

  if (n < 1) {slideIndex = slides.length}

  for (i = 0; i < slides.length; i++) {

    slides[i].style.display = "none";

  }

  for (i = 0; i < dots.length; i++) {

    dots[i].className = dots[i].className.replace(" active", "");

  }

  slides[slideIndex-1].style.display = "block";

  dots[slideIndex-1].className += " active";

  captionText.innerHTML = dots[slideIndex-1].alt;

}

</script>