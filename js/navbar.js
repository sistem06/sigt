      $(window).scroll(function(){
            if ($(window).scrollTop() > 80)
            {
            $("nav").addClass("navbar-fixed-top");
            }
            else
            {
             $("nav").removeClass("navbar-fixed-top");
            }
});