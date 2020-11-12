jQuery(document).ready(function() {    
      jQuery('.navbar .dropdown').hover(function() {
        jQuery(this).siblings().find('.dropdown-menu').slideUp();
        jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown(100);
      }, function() {
        jQuery(this).find('.dropdown-menu').slideUp(1);
      });
});