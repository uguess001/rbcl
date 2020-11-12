<section class="top_innerpage" style="background: url(<?=base_url()?>/application/resources/site/img/slide1.jpg);background-position: 70% 0;">
  <div class="ti-content text-center">
    <!-- <div class="title-ti">
      Search
    </div> -->
    <div class="breadcrums">
      <ol class="list-unstyled list-inline">
        <li class="list-inline-item breadcrumb-item"><a href="#">Search Result</a></li>
        <!-- <li class="list-inline-item breadcrumb-item"> GALLERY</a></li> -->
        <li class="list-inline-item breadcrumb-item"><a href="#"><?=$what?></a></li>
        <!-- <li class="list-inline-item breadcrumb-item active" aria-current="page">AGM 2017</li> -->
      </ol>
    </div>
  </div>
</section>
<section class="inner-page" style="display: none">
  <div class="container">
    <div class="row">
      <div class="inner-page-title">
        <h2>Search Results for <i>RBCL</i></h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <hr>
    <div class="row">
      <div class="search-result">
        <ul class="list-unstyled">
          <?php if(!empty($listservices))
          {
          foreach($listservices as $sl)
          {
          ?>
          <li>
            <div class="row">
              <div class="col-12">
                <div class="news-list-title">
                  <h3><a href="<?php echo base_url().'pages/GetDetails/'.$sl->uri;?>" title="<?php echo $sl->page_title_en;?>"><?php echo $sl->title;?></a> </h3>
                </div>
                <div class="news-list-content">
                  <?php $detial=preg_replace('/<[^>]*>/', '', htmlspecialchars_decode($sl->description));
                  echo word_limiter($detial, 35);
                  ?>
                </div>
                <div class="button-area-readmore">
                  <a class="btn btn-primary hvr-bounce-to-right" href="<?php echo base_url().'pages/GetDetails/'.$sl->uri;?>" title="<?php echo $sl->page_title_en;?>">Read More <i class="fa fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </li>
          <?php
          }
          } else {echo "Couldnot found records.";}
          ?>
        </ul>
      </div>
    </div>
    
  </div>
</section>
<section>
  <div class="container">
    <div class="title_bar search_bar_title">
      <h4>Search Results<span>KEYWORD <i class="fa fa-caret-right"></i> <?=$what?></span>
      </h4>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="search_key_title">
          <h3>Services Results
          <span style="float:right;">
            <a id="PrevNews" class="btn btn-default btn-xs ">&#8249;</a>
            <a id="NextNews" class="btn btn-default btn-xs">&#8250;</a>
          </span>
          </h3>
        </div>
        <div class="content_search_body" id="displayservices">
          <!-- CONTENT GOES HERE -->
        </div>
      </div>
      <div class="col-md-4">
        <div class="search_key_title">
          <h3>News Results
          <span style="float:right;">
            <a id="PrevMaps" class="btn btn-default btn-xs ">&#8249;</a>
            <a id="NextMaps" class="btn btn-default btn-xs">&#8250;</a>
          </span>
          </h3>
        </div>
        <div class="content_search_body" id="displaynews">
          <!-- CONTENT GOES HERE -->
        </div>
      </div>
      <div class="col-md-4" style="display:none">
        <div class="search_key_title">
          <h3>Pages Results
          <span style="float:right;">
            <a id="PrevFiles" class="btn btn-default btn-xs ">&#8249;</a>
            <a id="NextFiles" class="btn btn-default btn-xs">&#8250;</a>
          </span>
          </h3>
        </div>
        <div class="content_search_body" id="displaypages">
          <!-- CONTENT GOES HERE -->
        </div>
      </div>
      <div class="col-md-4">
        <div class="search_key_title">
          <h3>Others
          <span style="float:right;">
            <a id="PrevPages" class="btn btn-default btn-xs ">&#8249;</a>
            <a id="NextPages" class="btn btn-default btn-xs">&#8250;</a>
          </span>
          </h3>
        </div>
        <div class="content_search_body" id="displayreports">
          <!-- CONTENT GOES HERE -->
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div style="height: 30px;float: left;"></div>
  <div class="clearfix"></div>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
// PREV-NEXT JQUERY PAGINATION
// REFERENCE: https://stackoverflow.com/questions/8518885/how-to-create-pagination-like-behavior-for-an-array-in-javascript
var listservices = <?php echo json_encode($listservices)?>;
var listnews = <?php echo json_encode($listnews)?>;
var listpages = <?php echo json_encode($listpages)?>;
var listreports = <?php echo json_encode($listreports)?>;
//INITIALIZE DEFAULT RESULTS (1st Page)
displayNext(listservices, 'displayservices');
displayNext(listnews, 'displaynews');
displayNext(listpages, 'displaypages');
displayNext(listreports, 'displayreports');
//ADD LISTENERS TO BUTTONS
$("#NextNews").click(function() {
displayNext(listservices, 'displayservices');
});
$("#NextMaps").click(function() {
displayNext(listnews, 'displaynews');
});
$("#NextPages").click(function() {
displayNext(listpages, 'displaypages');
});
$("#NextFiles").click(function() {
displayNext(listreports, 'displayreports');
});
$("#PrevNews").click(function() {
displayPrev(listservices, 'displayservices');
});
$("#PrevMaps").click(function() {
displayPrev(listnews, 'displaynews');
});
$("#PrevPages").click(function() {
displayPrev(listpages, 'displaypages');
});
$("#PrevFiles").click(function() {
displayPrev(listreports, 'displayreports');
});
function displayNext(arr, placeInDOM) {
var list = $("#"+placeInDOM);
var index = list.data('index') % arr.length || 0;
list.data('index', index + 5);
list.html($.map(arr.slice(index, index + 5), function(val) {
if (val.created_on == 'undefined' || val.created_on == null ){
val.created_on = '';
}
return '<div class="list_search_content"><div class="icon_"><i class="fa fa-map-o"></i></div><div class="main_content_seach"> <a href="'+val.href+'">'+val.title+'</a></div> </div>';
}).join(''));
}
function displayPrev(arr, placeInDOM) {
var list = $("#"+placeInDOM);
var index = list.data('index') % arr.length || (arr.length);
list.data('index', index - 5);
list.html($.map(arr.slice(index - 5,index ), function(val) {
if (val.created_on == 'undefined' || val.created_on == null ){
val.created_on = '';
}
return '<div class="list_search_content"><div class="icon_"><i class="fa fa-map-o"></i></div><div class="main_content_seach"> <a href="'+val.href+'">'+val.title+'</a><div class="date"><i class="fa fa-clock-o"></i></i> '+val.created_on+'</div></div> </div>';
}).join(''));
}
</script>
<div class="clearfix"></div>