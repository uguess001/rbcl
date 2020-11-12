<!--javascrits--> 



<script src="<?=RESOURCE_PATH?>js/popper.min.js"></script> 

<script rel="javascript" src="<?=RESOURCE_PATH?>js/bootstrap.min.js"></script>

<script rel="javascript" src="<?=RESOURCE_PATH?>js/animatedModal.js"></script>


<script type="text/javascript" src="<?=RESOURCE_PATH?>js/venobox.min.js"></script>
<script type="text/javascript" src="<?=RESOURCE_PATH?>js/dropdown.js"></script>
<script type="text/javascript" src="<?=RESOURCE_PATH?>js/breakingnews.js"></script>
<script type="text/javascript" src="<?=RESOURCE_PATH?>js/owl.carousel.min.js"></script>

<!-- Gallery Next and Pre Js -->
<script type="text/javascript" src="<?=RESOURCE_PATH?>js/slick.min.js"></script>
 
<script>
  $(document).ready(function() {
 
  $("#owl-example").owlCarousel({
      navigation : false, 
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      pagination: false,
      rewindSpeed: 500,
      afterMove: moved,
      autoplay:true
  });
  
    $('.custom-control').on('click', '.cs-control', function() {
    var $this = $(this);
    var slideNum = $(this).data('slide');
    $("#owl-example").trigger('owl.goTo', slideNum);
});

  function moved() {
     var owl = $("#owl-example").data('owlCarousel');
     var $buttons = $('.custom-control .cs-control');
     $buttons.removeClass('active').removeAttr('disabled');
     $('.custom-control').find('[data-slide="'+owl.currentItem +'"]').addClass('active').attr('disabled', 'disabled');
   }
 
});
//   $(document).ready(function(){

//     $("#testimonial-slider").owlCarousel({
//         items:1,
//         itemsDesktop:[1000,1],
//         itemsDesktopSmall:[979,1],
//         itemsTablet:[768,1],
//         pagination: true,
//         slideSpeed:1000,
//         singleItem:true,
//         // transitionStyle:"slideup",
//         autoPlay:false
//     });

//     $('.custom-control').on('click', 'button', function() {
//     var $this = $(this);
//     var slideNum = $(this).data('testimonial');
//     $("#testimonial-slider").trigger('owl.goTo', slideNum);
// });

//   function moved() {
//      var owl = $("#testimonial-slider").data('owlCarousel');
//      var $buttons = $('.custom-control button');
//      $buttons.removeClass('active').removeAttr('disabled');
//      $('.custom-control').find('[data-slide="'+owl.currentItem +'"]').addClass('active').attr('disabled', 'disabled');
//    }
// });

        $(document).ready(function(){
            $(".box-others").click(function(){
                $(".test").addClass("dis");
            });
});
        $(document).ready(function(){
            $(".close").click(function(){
                $(".test").removeClass("dis");
            });
});

        $(document).ready(function(){



	/* default settings */

	$('.venobox').venobox(); 




	/* auto-open #firstlink on page load */

//	$("#firstlink").venobox().trigger('click');

});

</script>



<script type="text/javascript">
 /*


   $(function() {

  $("#callbackform").validate({
    rules: {
      name: {
        required: true,
        minlength: 8
      },
      action: "required"
    },
    messages: {
      name: {
        required: "Please enter some data",
        minlength: "Your data must be at least 8 characters"
      },
      action: "Please provide some data"
    }
  });
});


 */
</script>

<script type="text/javascript" charset="utf-8">


  $(document).ready(function() {
    $('.single-item').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    $('.multiple-items').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 2,
        slidesToScroll: 1
    });
   
    $('.responsive').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 166) {
            $('.fixed-header').show();
        } else {
            $('.fixed-header').hide();
        }
    });

    $('ul.nav a').on('click', function(event) {
      if ($(this).attr('href')[0] === "#") {
        event.preventDefault();
          var targetID = $(this).attr('href');
          var targetST = $(targetID).offset().top - 48;
          $('body, html').animate({
              scrollTop: targetST + 'px'
          }, 300);
      }
    });

    $('.single-item-rtl').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        rtl: true
    });
    $('.multiple-items-rtl').slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        speed: 500,
        slidesToScroll: 3,
        rtl: true
    });

});





  // //////////////////////////////////////////////////////////////////////////////////////////////

    $(document).ready(function(){
      $('#nav-id').treelist({
         speed: 'fast'
       });
     });

      tl = {
        opts : {'expander' : '.expander', 'speed' : 'dev'},
        treelist : function(opts) {
          tl._setup(opts);
          tl.$tree = this;
          jQuery('li:not(.open) ul', tl.$tree).hide();
          jQuery(tl.opts.expander, tl.$tree).click(tl._expand);
        },
        _expand : function() {
          var $li = jQuery(this).closest('li');
          var $li_ul = jQuery('ul:first', $li)
          $li_ul.slideToggle(tl.opts.speed)
          $li.toggleClass('open');
          return false;
        },
        _setup : function(opts) {
          if (typeof opts == 'undefined') { return; }
          for (prop in opts) { tl.opts[prop] = opts[prop]; }
        }
      }
    jQuery.fn.extend(tl);
    </script>
    <script type="text/javascript">
  $("#bn7").breakingNews({
      effect    :"slide-v",
      autoplay  :true,
      timer   :15000,
      color   :'darkred'
    });
      // Dropdown navbar menu on hover
$('.dropdown-menu', this).css('margin-top', 0);
$('.dropdown').hover(function () {
    $('.dropdown-menu', this).toggleClass("show");
});

// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 300) {
        $("header").addClass("darkHeader");
    } else {
        $("header").removeClass("darkHeader");
    }
});
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 700) {
        $("body").addClass("fixed-tab");
    } else {
        $("body").removeClass("fixed-tab");
    }
});

(function(){
    // Back to Top - by CodyHouse.co
  var backTop = document.getElementsByClassName('js-cd-top')[0],
    // browser window scroll (in pixels) after which the "back to top" link is shown
    offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offsetOpacity = 1200,
    scrollDuration = 700,
    scrolling = false;
  if( backTop ) {
    //update back to top visibility on scrolling
    window.addEventListener("scroll", function(event) {
      if( !scrolling ) {
        scrolling = true;
        (!window.requestAnimationFrame) ? setTimeout(checkBackToTop, 250) : window.requestAnimationFrame(checkBackToTop);
      }
    });
    //smooth scroll to top
    backTop.addEventListener('click', function(event) {
      event.preventDefault();
      (!window.requestAnimationFrame) ? window.scrollTo(0, 0) : scrollTop(scrollDuration);
    });
  }

  function checkBackToTop() {
    var windowTop = window.scrollY || document.documentElement.scrollTop;
    ( windowTop > offset ) ? addClass(backTop, 'cd-top--show') : removeClass(backTop, 'cd-top--show', 'cd-top--fade-out');
    ( windowTop > offsetOpacity ) && addClass(backTop, 'cd-top--fade-out');
    scrolling = false;
  }

  function scrollTop(duration) {
      var start = window.scrollY || document.documentElement.scrollTop,
          currentTime = null;

      var animateScroll = function(timestamp){
        if (!currentTime) currentTime = timestamp;
          var progress = timestamp - currentTime;
          var val = Math.max(Math.easeInOutQuad(progress, start, -start, duration), 0);
          window.scrollTo(0, val);
          if(progress < duration) {
              window.requestAnimationFrame(animateScroll);
          }
      };

      window.requestAnimationFrame(animateScroll);
  }

  Math.easeInOutQuad = function (t, b, c, d) {
    t /= d/2;
    if (t < 1) return c/2*t*t + b;
    t--;
    return -c/2 * (t*(t-2) - 1) + b;
  };

  //class manipulations - needed if classList is not supported
  function hasClass(el, className) {
      if (el.classList) return el.classList.contains(className);
      else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
  }
  function addClass(el, className) {
    var classList = className.split(' ');
    if (el.classList) el.classList.add(classList[0]);
    else if (!hasClass(el, classList[0])) el.className += " " + classList[0];
    if (classList.length > 1) addClass(el, classList.slice(1).join(' '));
  }
  function removeClass(el, className) {
    var classList = className.split(' ');
      if (el.classList) el.classList.remove(classList[0]);
      else if(hasClass(el, classList[0])) {
        var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
        el.className=el.className.replace(reg, ' ');
      }
      if (classList.length > 1) removeClass(el, classList.slice(1).join(' '));
  }
})();










</script>
<script type="text/javascript" src="<?=RESOURCE_PATH?>js/jquery.easy-ticker.min.js"></script>
<script type="text/javascript" src="<?=RESOURCE_PATH?>js/jquery.easing.min.js"></script>

 <script>
  $('.demo5').easyTicker({
        direction: 'up',
        visible: 4,
        interval: 2500,
        autoplay:true,
        controls: {
            up: '.btnUp',
            down: '.btnDown',
            // toggle: '.btnToggle'
        }
    });
</script>




