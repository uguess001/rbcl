<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
            <?=$list[0]->title?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                    <li class="list-inline-item breadcrumb-item active" aria-current="page">
                    <?=$list[0]->title?>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>

   
   
   <div class="clearfix"></div>
   <div class="content-section">
    <div class="container-custom mt-30 mb-30">

  <div class="row">

    <div class="col-12 col-lg-12">

      <!-- <div class="inner-page-title">

        <h2><?=$list[0]->title?></h2>

      </div> -->

      <div class="inner-page-content">

        <p>

           <?=$list[0]->description;?>

        </p>

        

      </div>

     <?php if (($this->uri->segment(3)=='claim')) {?>

      <div class="insurance-downloads">

         <ul class="list-unstyled">

            <li>

               <div class="i-d-contents">

                  <div class="i-d-icon-holder">

                     <span class="fa fa-file-pdf-o"></span>

                  </div>

                  <div class="i-d-content">

                     <a href="#">Motor Claim Information</a>

                     <span class="small">Document size: 34kb</span>

                  </div>

               </div>

            </li>

            <li>

               <div class="i-d-contents">

                  <div class="i-d-icon-holder">

                     <span class="fa fa-file-word-o"></span>

                  </div>

                  <div class="i-d-content">

                     <a href="#">Motor Claim Information</a>

                     <span class="small">Document size: 34kb</span>

                  </div>

               </div>

            </li>

         </ul>

      </div>

      <?php } ?>

    </div>

    <div class="col-12 col-lg-6" style="display:none">

      <div class="res-manager">

         <div class="res-manager-image">

            <img src="<?=RESOURCE_PATH?>img/rem.jpg" alt="Specialist on Relations with Customers">

         </div>

         <div class="res-manager-info">

            Martha Jones

            <span>

               Specialist on Relations with Customers

            </span>

            

         </div>

      </div>

   </div>

  </div>

      </div>

     </div>