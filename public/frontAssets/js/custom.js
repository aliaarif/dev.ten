$(document).ready(function(){

    var scrollTop = 0;
    $(window).scroll(function(){
        scrollTop = $(window).scrollTop();
        $('.counter').html(scrollTop);
        
        if (scrollTop >= 50) {
            $('#nav').addClass('scrolled-nav');
            // $('#logo').addClass('logo-height');
            // $(".menu-bx").css({"padding-top": "0px",});

        } else if (scrollTop < 50) {
            $('#nav').removeClass('scrolled-nav');
            // $('#logo').removeClass('logo-height');
            // $(".menu-bx").css({"padding-top": "14px",});
        } 
    });



// clident slider

$('#slider1').owlCarousel({
    loop:true,
    margin:30,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        768:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
});


// (function($){
//     $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
//       if (!$(this).next().hasClass('show')) {
//         $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
//       }
//       var $subMenu = $(this).next(".dropdown-menu");
//       $subMenu.toggleClass('show');

//       $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
//         $('.dropdown-submenu .show').removeClass("show");
//       });

//       return false;
//     });
// })(jQuery)



//bottom to top scroll
  //for window top
  $(window).scroll(function(){ 
    if ($(this).scrollTop() > 100) { 
        $('#scroll').fadeIn(); 
    } else { 
        $('#scroll').fadeOut(); 
    } 
}); 
  $('#scroll').click(function(){ 
    $("html, body").animate({ scrollTop: 0 }, 600); 
    return false; 
}); 


//++++++++++ light box gallery 
    // lightbox.option({
    //       'resizeDuration': 200,
    //       'wrapAround': true
    //     })




});