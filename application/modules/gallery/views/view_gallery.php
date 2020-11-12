<div class="_inner_page">



<div class="title_bar">

  <h4>bcbcbcbcb<?=isset($general_site_details->TitlePhotoGallery)?$general_site_details->TitlePhotoGallery:'Photo Gallery'?></h4>

</div>

<div class="album_list">

  <div class="row">

  <?php if(!empty($data->ListThumbnails)) { foreach ($data->ListThumbnails as $key => $value) { ?> 



    <div class="col-md-4">

    <div class="_gall">

      <div class="image-holder-album">

        <img src="<?=$value->Thumbnail?>">

      </div>

      <div class="album_title">

        <a href="<?=base_url()?>gallery/<?=$value->Key?>"><h4><?=$value->Title?> </h4></a>

      </div>

    </div>

    </div>

  <?php } } ?>

  </div>

<div class="clearfix"></div>



</div>

<div class="clearfix"></div>



</div>

<style type="text/css">

  

</style>



