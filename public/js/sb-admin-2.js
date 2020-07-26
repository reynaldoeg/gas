(function($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
        $('.sidebar .collapse').collapse('hide');
        };
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function() {
        if ($(window).width() < 768) {
        $('.sidebar .collapse').collapse('hide');
        };
        
        // Toggle the side navigation when window is resized below 480px
        if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
        $("body").addClass("sidebar-toggled");
        $(".sidebar").addClass("toggled");
        $('.sidebar .collapse').collapse('hide');
        };
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
        if ($(window).width() > 768) {
        var e0 = e.originalEvent,
            delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
        $('.scroll-to-top').fadeIn();
        } else {
        $('.scroll-to-top').fadeOut();
        }
    });

  // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
        scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });

    $('#search-btn').on('click', function(){
        var gas_id = $('#search-txt').val();
        $.ajax({
            url: `/api/getgas/${gas_id}`,
            type: 'GET',
            data: {},
            dataType: 'json',
            error: function(err) {
                console.log('Error al buscar la gasolinera');
                console.log(err);
                swal("No se encontro la gasolinera", "Escriba el ID (11702 o 2039)", "error");
            },
            success: function(response) {
                console.log(response);
                
                var lat = response.results[0].latitud;
                var lon = response.results[0].longitud

                $('#premium_price').html(response.results[0].premium);
                $('#regular_price').html(response.results[0].regular);
                $('#diesel_price').html(response.results[0].diesel);
                $('#place_id').html(response.results[0].place_id);
                $('#name').html(response.results[0].name);
                $('#cre_id').html(response.results[0].cre_id);
                $('#latitud').html(lat);
                $('#longitud').html(lon);

                var link = "https://maps.google.com/maps?q=24.75731,-107.1192&hl=es;z=14&amp;output=embed";

                var ifr = `<iframe id="ifrm-map" 
                                width="100%" height="300" 
                                frameborder="0" scrolling="no" 
                                marginheight="0" marginwidth="0" 
                                src="https://maps.google.com/maps?q=${lat},${lon}&hl=es;z=14&amp;output=embed">
                            </iframe>`;

                $('#div-ifrm-map').html(ifr);

                $.ajax({
                    url: `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lon}&key=AIzaSyDHu61QblZCnGWZhbvQfFJxEDbAcBXQSOo`,
                    type: 'POST',
                    data: {},
                    dataType: 'json',
                    error: function(err) {
                        console.log(err);
                    },
                    success: function(response) {
                        console.log(response.plus_code.compound_code);
                        var address = response.plus_code.compound_code.substring(8)
                        console.log(address);
                        $('#direccion').html(address);
                    }
                });
            }
        });
    });

    

})(jQuery); // End of use strict
