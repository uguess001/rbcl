<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
                <?php echo ($lang=='np')?'व्यवस्थापन समुह':'Management Team';?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                    <li class="list-inline-item breadcrumb-item active" aria-current="page">
                        <?php echo ($lang=='np')?'व्यवस्थापन समुह':'Management Team';?></li>
                </ol>
            </div>
        </div>
    </div>

</section>


<div class="content-section pt15 pb15 mt-15 mb-15">
    <div class="container-custom">
        <div class="clearfix"></div>
        <div class="ins-branches">
            <div class="row">
                <div class="col-12 ">
                     <div class="section-header  mb-30 section-secon-color">
			<?php echo ($lang=='np')?'व्यवस्थापन समुह':'Management Team';?>
                </div> 
                    <div class="clearfix"></div>

                    <p style="text-align:justify;">Rastriya Beema Company Ltd. has been promoted by a young team of
                        reputed Industrial and Business Houses of Nepal having vast experience and excellent leadership
                        that has steered their respective companies through the years. There are seventeen individuals
                        representing the various walks of life. They represent various diversified fields like Banking,
                        Insurance, Trading, Manufacturing, Aviation, Tourism etc. The Company expects to achieve success
                        under their able guidance. The below mentioned Managers are responsible for the supervision of
                        the overall affairs of the Company.</p>
                </div>
                <div class="col-12">
                    <section class="managementteam">
                        <div class="row">
                            <?php 

					foreach ($management_team as $key => $value) {
						if($key==0){ ?>

                            <div class="single-view">
                                <div class="card-view">
                                   
                                        <div class="img-container">
                                            <img class=""
                                                src="<?php echo ($value->image == 'No Image')?RESOURCE_PATH.'no-image.png':$value->image ?>"
                                                alt="Card image cap">

                                        </div>
                                        <div class="staff-de">
                                            <div class="staff-header"><span
                                                    style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?= $value->name;?></span>
                                            </div>
											<div class="staff-position mb-15"><?= $value->post?></div>
											<a href="<?=base_url().'staffs/staffdetails/'.$value->id?>">View Information</a>
                                        </div>
                                   
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <?php }else{ ?>
                            <div class="col-lg-4">
                                <div class="card-view">

                                    <div class="img-container">
                                        <img class=""
                                            src="<?php echo ($value->image == 'No Image')?RESOURCE_PATH.'no-image.png':$value->image ?>"
                                            alt="Card image cap">

                                    </div>
                                    <div class="staff-de">
                                        <div class="staff-header"><span
                                                style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?= $value->name;?></span>
                                        </div>
                                        <div class="staff-position mb-15"><?= $value->post?></div>
                                        <a href="<?=base_url().'staffs/staffdetails/'.$value->id?>">View Information</a>
                                    </div>



                                </div>
                            </div>
                            <?php } }  	?>

                        </div>
                </div>
                </section>


            </div>
        </div>




        <div class="row for_branch_manager_list" style="display: none;">
            <div class="col-12">
                <h2 class="title-branch">
                    <?php echo ($lang=='np')?'क्षेत्र प्रमुख र शाखा प्रबन्धक':'Section Chief & Branch Manager';?></h2>
            </div>
            <?php if(isset($branch_manager) && !empty($branch_manager)) :
			foreach ($branch_manager as $value) :
			?>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <!-- <img class="card-img-top" src="<?php // echo ($value->image == 'No Image')?RESOURCE_PATH.'no-image.png':$value->image ?>" alt="Card image cap"> -->
                    <div class="card-header"><span
                            style="font-weight: bold; font-family: Nexa; color: #3E4098;"><?=$value->name;?></span>
                    </div>
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
    </div>
</section>

<style>
.single-view {
    float: left;
    width: 100%;
    margin: 30px 0;
}

.single-view .card-view {
    width: 31%;
    margin: 0 auto;
    display: block;
    margin-left: 34.4%;
}

.img-container {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    float: left;
}

.staff-de {
    float: left;
    width: calc(100% - 100px);
    padding-left: 10px;
    font-size: 13px;
    margin-top: 16px;
}

.card-view {
    float: left;
    width: 100%;
    background: white;
    margin-top: 18px;
    padding: 9px;
    border-radius: 4px;
    box-shadow: 0 0 6px -4px #333;
}

.card-view a {
    float: left;
    width: 100%;
}
</style>