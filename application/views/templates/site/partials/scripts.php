<script src="<?=RESOURCE_PATH?>js/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<script rel="javascript" src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
<?php if ($this->uri->segment(1) == 'gallery') {?>
<script src="https://www.cssscript.com/demo/material-inspired-nice-responsive-photo-gallery/dist/js/material-photo-gallery.js"></script>
<?php } ?>
<script
    src="https://www.jqueryscript.net/demo/Flexible-Customizable-jQuery-News-Ticker-Plugin-Easy-Ticker/jquery.easy-ticker.js">
</script>
<?php if (!$this->uri->segment(1)) {?>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <?php } ?>
<script src="https://moics.gov.np/site/js/store.min.js"></script>
<script src="https://moics.gov.np/site/js/rv-jquery-fontsize-2.0.3.min.js"></script>
<script src="https://moics.gov.np/site/js/easyview.js"></script>

<script src="<?=RESOURCE_PATH?>js/jquery.dataTables.min.js"></script>


<script>




$('.change-bandwidth').click(function(){
       var id = $(this).attr('id');
       // console.log(id);

        $.ajax({
            type: "POST",
            url:"<?php echo base_url().'welcome/changeBandwidth/' ?>" + id,
            dataType: 'json',
        }).always(function(resp){
            // console.log(resp.lowbandwidth);
            location.reload();
        });
    });




    
   $('.fiscal').click(function(){

    // alert($(this).text());
    // alert($(this).attr('data-id'));
    
    
var fiscal_year=$(this).attr('data-id');
var year = $(this).text();
                
                
    $.ajax({
    url: "<?php echo base_url().'reports/getListByFiscalYear/' ?>" + $(this).attr('data-id'),
   dataType: "json",    
    success: function(response){
        console.log(response.length);
        
         var newRowContent="";
                $(".cata-list").removeClass("hide").addClass('active');
                $('.cata-list').attr('id', 'ficial' + fiscal_year);
                $('#year').html(year);
        
            if(response.length==0){ 
               
                 $(".table tbody").html('No Record!!');
                
            }else{
       
              
                $.each(response, function( index, value ) {
                
                newRowContent='<tr>\
                        <td>\
                            <a href="'+value.file+'" target="_blank">'+value.title+'\
                            </a>\
                            <span class="date-">\
                                '+value.CreatedOn+'\
                            </span>\
                        </td>\
                        <td style="width:150px;">\
                            <a href="'+value.file+'" target="_blank" class="cs-btn" download="">\
                                <i class="fa fa-download"></i> Download\
                            </a>\
                        </td>\
                    </tr>';
                
                $(".table tbody").append(newRowContent);
                });
        

        } 
        
    }
    });
   });
</script>


<script>

    $(document).ready(function() {
    $('#myTable').DataTable();
});

    
///Premium Calculator Js Created By Yam Limbu on 2020-07-06_11.37.20//////////////////////////////////////
$(document).ready(function() {
    $('.result_div').hide();
    $('.result_div11').hide();
});

///Third Party Insurance calculation
  $('.submit_pcalculator').click(function(event) {
        if($("#pVehicleCategoryid").val()==''){alert("Please select required fields!!!"); return false;}
        var api="http://203.78.160.21:9096/api/Data/tariffdata";
        $.ajax({
            url: api,
            type: 'POST',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: JSON.stringify({ 
                pVehicleCategoryid: $("#pVehicleCategoryid").val(),
                pCC_HP_SEATS: $("#pCC_HP_SEATS").val(),
                pNo_of_Driver: $("#pNo_of_Driver").val(),
                pNo_of_Helper: $("#pNo_of_Helper").val(),
                pNo_of_Passenger: $("#pNo_of_Passenger").val(),
                pExcludePool: $("#pExcludePool").val()

            }),
            success: function (response) {

                    $('.result_div').show();
                    $('.vehicle_cat').html($("#pVehicleCategoryid option:selected").text());

                    $('.TotalPremium').html(response.data.TotalPremium);
                    $('.StampDuty').html(response.data.StampDuty);
                    $('.TotalVatable').html(response.data.TotalVatable);
                    $('.Tax').html(response.data.Tax);
                    $('.TotalPayablePrem').html(response.data.TotalPayablePrem);
                    },error:function(response) {
                           console.log(response);
                    }
        });
     

    });
///Third Party Comprehensive calculation
    $('.submit_pcalculator_c').click(function(event) {
        if($("#pVehicleCategoryid_c").val()==''){alert("Please select required fields!!!"); return false;}
        var api="http://203.78.160.21:9096/api/Data/tariffdata";
        $.ajax({
            url: api,
            type: 'POST',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: JSON.stringify({ 
                pVehicleCategoryid: $("#pVehicleCategoryid_c").val(),
                pCC_HP_SEATS: $("#pCC_HP_SEATS_c").val(),
                pNo_of_Driver: $("#pNo_of_Driver_c").val(),
                pNo_of_Helper: $("#pNo_of_Helper_c").val(),
                pNo_of_Passenger: $("#pNo_of_Passenger_c").val(),
                pExcludePool: $("#pExcludePool_c").val(),

                pSuminsured: $("#pSuminsured_c").val(),
                pManufactureYr: $("#pManufactureYr_c").val(),
                pCExcess: $("#pCExcess_c").val(),
                pVehicleAge: $("#pVehicleAge_c").val(),
                pIssueDate: $("#pIssueDate_c").val(),
                pHasAgent: $("#pHasAgent_c").val(),
                pIncludetowing: $("#pIncludetowing_c").val(),

            }),
            success: function (response) {

                    $('.result_div11').show();
                    $('.vehicle_cat_c').html($("#pVehicleCategoryid_c option:selected").text());

                    $('.TotalPremium_c').html(response.data.TotalPremium);
                    $('.StampDuty_c').html(response.data.StampDuty);
                    $('.TotalVatable_c').html(response.data.TotalVatable);
                    $('.Tax_c').html(response.data.Tax);
                    $('.TotalPayablePrem_c').html(response.data.TotalPayablePrem);
                    },error:function(response) {
                           console.log(response);
                    }
        });
     

    });



















$('.dropdown-menu', this).css('margin-top', 0);
$('.dropdown').hover(function () {
    $('.dropdown-menu', this).toggleClass("show");
});


$(document).ready(function() {
        $('.show-char-list a').click(function() {
            $('.show-char-list a').removeClass('active');
            $(this).addClass('active');
            var tagid = $(this).data('tag');
            $('.classinfo').removeClass('active').addClass('hide');
            $('#' + tagid).addClass('active').removeClass('hide');
        });
    });


$.rvFontsize({
targetSection: 'body',
store: true, // store.min.js required!
controllers: {
appendTo: '#rvfs-controllers',
showResetButton: true
}
});



</script>
 <?php if (!$this->uri->segment(1)) {?>
 
  <!--  <?php foreach ($chart as $key => $value) {
        ?>
        {
            name: "<?=$value->portfolio?>",
            data: [<?=$value->shrawan?>, <?=$value->bhadra?>, <?=$value->ashoj?>, <?=$value->kartik?>, <?=$value->mangsir?>, <?=$value->poush?>, <?=$value->magh?>,<?=$value->falgun?>,<?=$value->chaitra?>,<?=$value->baisakh?>,<?=$value->jestha?>,<?=$value->ashar?>]
          }
   <?php }?> -->
<script>



/////////////////////////////////////////////////////////servicewise Pie Chart/////////////////////////////////




/////////////////////////////////////////////////////////BranchWise Pie Chart/////////////////////////////////

        var jsArray = <?=$chart; ?>;
        var jsArrayName = <?=$chart_name; ?>;
        
        console.log(jsArrayName);
        var options = {
          series: [{
            name: "Premium",
          data:jsArray
        }],
          chart: {
          type: 'area',
          height: 350
        },
        stroke: {
          curve: 'straight'
        },
        
        plotOptions: {
          bar: {
            horizontal: false,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: jsArrayName,
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();







</script>
<?php } ?>
<script>
$('.slide-m').click(function() {

    $('.slide-m').removeClass('slide-active-center');
    $('.slide-m').removeClass('prev_slide');
    $('.slide-m').removeClass('next_slide');
    $(this).addClass('slide-active-center');
    $('.gal-slider').find('.slide-m.slide-active-center').prev().addClass('prev_slide');
    $('.gal-slider').find('.slide-m.slide-active-center').next().addClass('next_slide');
});
$(document).ready(function() {
    $('.ser-list a').click(function() {
        $('.ser-list a').removeClass('active');
        $(this).addClass('active');
        var tagid = $(this).data('tag');
        $('.serives-info').removeClass('active').addClass('hide');
        $('.' + tagid).addClass('active').removeClass('hide');
    });
    $('#slect-s').change(function() {
         $(".table tbody").html('');
          // console.log($('#slect-s :selected').val())
        var sel = document.getElementById('slect-s');
        // var tagid = $(this).data('tag');
        // alert(sel.value );
        
        $('#slect-s option').removeClass('active');
        // $(this).addClass('active');
        // var tagid = $(this).data('tag');.back-button
        $('.back-button').addClass('active');
        $('.fis-ls').removeClass('active').addClass('hide');
        // $('.cata-list').removeClass('active').addClass('hide');
        $('#' + sel.value).toggleClass('active');
        
                               
        

var fiscal_year=$('#slect-s option:selected').val();
var year = $('#slect-s option:selected').text();


                    $.ajax({
                            url: "<?php echo base_url().'reports/getListByFiscalYear/' ?>" + fiscal_year,
                            dataType: "json",    
                            success: function(response){
                            console.log(response.length);
                            
                            var newRowContent="";
                            $(".cata-list").removeClass("hide").addClass('active');
                            $('.cata-list').attr('id', 'ficial' + fiscal_year);
                            $('#year').html(year);
                            
                            if(response.length==0){ 
                            
                                         $(".table tbody").html('No Record!!');
                            
                            }else{
                            
                            
                            $.each(response, function( index, value ) {
                            
                            newRowContent='<tr>\
                            <td>\
                            <a href="'+value.file+'" target="_blank">'+value.title+'\
                            </a>\
                            <span class="date-">\
                            '+value.CreatedOn+'\
                            </span>\
                            </td>\
                            <td style="width:150px;">\
                            <a href="'+value.file+'" target="_blank" class="cs-btn" download="">\
                            <i class="fa fa-download"></i> Download\
                            </a>\
                            </td>\
                            </tr>';
                            
                           
                                
                            $(".table tbody").append(newRowContent);
                            
                            });
                            
                            
                            } 
                            
                            }
                    });
        
        
      
    });


// display value property of select list (from selected option)
        
    $('.demo').easyTicker({

        // or 'down'
        direction: 'up',

        // easing function
        easing: 'swing',

        // animation speed
        speed: 'slow',

        // animation delay
        interval: 5000,

        // height
        height: 'auto',

        // the number of visible elements of the list
        visible: 3,

        // enables pause on hover
        mousePause: 1,

        // custom controls
        controls: {
            up: '.btnUp-slide',
            down: '.btnDwn-slide',
            toggle: '',
            playText: 'Play',
            stopText: 'Stop'
        },

        // callbacks
        callbacks: {
            before: function(ul, li) {
                // do something
            },
            after: function(ul, li) {
                // do something
            }
        }

    });

});

function changeLanguage() {
    $("#langfrm").attr("action", "<?php echo base_url() . 'language'; ?>");
    $('#langfrm').submit();
}
$('.s-list-s-s').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 2,
    slidesToScroll: 1,
    prevArrow: $('.prev-pro1'),
    nextArrow: $('.next-pro1'),
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

$('.s-list-s').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: $('.prev-pro'),
    nextArrow: $('.next-pro'),
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$('.slic-slider').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1,
    prevArrow: $('.prev'),
    nextArrow: $('.next'),
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$(function() {
    $('.demo').easyTicker();
});

</script>
<script>
        $(document).ready(function () {
            $('.s-btn').click(function () {
                $(".tab").removeClass('tab-active');
                $(".tab[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");
                $(".s-btn").removeClass('s-active');
                $(this).parent().find(".s-btn").addClass('s-active');
            });
        });
    </script>

<?php if ($this->uri->segment(1) == 'gallery') {?>
<script>
   var elem = document.querySelector('.m-p-g');

document.addEventListener('DOMContentLoaded', function() {
    var gallery = new MaterialPhotoGallery(elem);
});
</script>
<?php } ?>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".s-data-s").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
$(document).ready(function(){
    $('.fs-list a').click(function(){
        $('.fis-ls').removeClass('onclicked');
        $('.fis-ls').addClass('onclicked');
        $('.back-button').addClass('active');
        var tagid = $(this).data('tag');
        $('.cata-list').removeClass('active').addClass('hide');
        $('#'+tagid).addClass('active').removeClass('hide');
    });
    $(".back-button").click(function(){
         $(".table tbody").html('');
        //   $("#slect-s").html('');
         
        // $(".fis-ls").toggleClass("onclicked");
        $('.fis-ls').removeClass('onclicked');
        $('.fis-ls').removeClass('hide');

        $('.back-button').toggleClass('active');
        $(".cata-list").removeClass("active").addClass('hide');
});
$(".s-drop").click(function(){
        $(".official-use").toggleClass("drop-down");
       
});
});
</script>
<?php if ($this->uri->segment(1) == 'branches') {?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6xiZa9UcSy2YlfTZyeLXuc1beOr544Ak&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    
    <script>
      (function(exports) {
        "use strict";

        // The following example creates complex markers to indicate branches near
        // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
        // to the base of the flagpole.
        function initMap() {
          var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: {
              lat: 28.3983131,
              lng: 83.6548459
            }
          });
          setMarkers(map);
        } // Data for the markers consisting of a name, a LatLng and a zIndex for the
        // order in which these markers should display on top of each other.




        var branches = [
        <?php if(count($flagmap) > 0){
            foreach($flagmap as $k => $flag){ 
            if(!empty($flag->latitude)){
                ?>

                 ["<?php echo $flag->address ?>", <?php echo $flag->latitude ?>, <?php echo $flag->longitude ?>, <?=$k+99?>],
            
        
        <?php
    }
            }
        } 
        ?>

          /*["Kathmandu", 27.717245, 85.323959, 999],
          ["Biratnagar", 26.452475, 87.271782, 999],
          ["Malpot", 27.6745294, 85.4478625, 999],*/
         
        ];

        function setMarkers(map) {
          // Adds markers to the map.
          // Marker sizes are expressed as a Size of X,Y where the origin of the image
          // (0,0) is located in the top left of the image.
          // Origins, anchor positions and coordinates of the marker increase in the X
          // direction to the right and in the Y direction down.
          var image = {
            url:
              "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
            // This marker is 20 pixels wide by 32 pixels high.
            size: new google.maps.Size(20, 32),
            // The origin for this image is (0, 0).
            origin: new google.maps.Point(0, 0),
            // The anchor for this image is the base of the flagpole at (0, 32).
            anchor: new google.maps.Point(0, 32)
          }; // Shapes define the clickable region of the icon. The type defines an HTML
          // <area> element 'poly' which traces out a polygon as a series of X,Y points.
          // The final coordinate closes the poly by connecting to the first coordinate.

          var shape = {
            coords: [1, 1, 1, 20, 18, 20, 18, 1],
            type: "poly"
          };

          for (var i = 0; i < branches.length; i++) {
            var branch = branches[i];
            var marker = new google.maps.Marker({
              position: {
                lat: branch[1],
                lng: branch[2]
              },
              map: map,
              icon: image,
              shape: shape,
              title: branch[0],
              zIndex: branch[3]
            });
          }
        }
        
        exports.branches = branches;
        exports.initMap = initMap;
        exports.setMarkers = setMarkers;
      })((this.window = this.window || {}));
    </script>
    <script>
      var buttons = document.querySelectorAll('gmimap');
        for(var i = 0; i < buttons.length; i++){
          buttons[i].addEventListener('click', function(e){
                console.log(e.target.id);
            });
        }
    </script>
    <script>
        $("#gmimap1").click(function(){
            $(".gmimap1").addClass("intro");
            });
    </script>
 <?php } ?>
 <?php if ($this->uri->segment(1) == 'contact') {?>
 <script>

$('#btn-contactus').click(function(event) {

    

        $('.loading-ajax').removeClass('d-none');
        event.preventDefault();
        $("#department-error").html('');
        $("#firstname-error").html('');
        $("#lastname-error").html('');
        $("#message-error").html('');
        $("#phone-error").html('');
        $("#email-error").html('');
        $('#message-area').html('');
        var formData = $("#modalform").serialize();

        // var baseurl="http://rbcl.com.np/insertfeedback";

        var baseurl='<?=base_url()?>'

        $.ajax({
            url: baseurl+"insertfeedback",
            type: 'POST',
            data: formData,
        })
        .fail(function(resp){
            console.log(resp);
        })
        .always(function(resp) {
            $('.loading-ajax').addClass('d-none');
            response = jQuery.parseJSON(resp);
            console.log(resp)

            if(response.error==true){
              if(response.message.department){
              $('#department-error').html(response.message.department);
              }
              if(response.message.firstname){
              $('#firstname-error').html(response.message.firstname);
              }
              if(response.message.lastname){
              $('#lastname-error').html(response.message.lastname);
              }
              if(response.message.message){
              $('#message-error').html(response.message.message);
              }
              if(response.message.phone){
              $('#phone-error').html(response.message.phone);
              }
              if(response.message.email){
              $('#email-error').html(response.message.email);
              }
            }
            if (response.error == false) {
                $("#modalform")[0].reset();
                $('#message-area').html(response.message);
            }
            
        });

    });





    $("#modalform_").validate({
rules: {
firstname: "required",
lastname: "required",
email: {
required: true,
email: true
},
phone: {
minlength: 10,
maxlength:10,
},
message: {
required: true
}
},
messages: {
firstname: "Please specify your firstname",
lastname: "Please specify your lastname",
phone: {
minlength: "Number Should Be 10 Digit"
},
email: {
required: "We need your email address to contact you",
email: "Your email address must be in the format of name@domain.com"
},
message:{
    required: "Please leave your message !!",
},
}
});
</script>
<?php } ?>

