(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        // if ($(this).scrollTop() > 300) {
        //     $('.sticky-top').addClass('full-width').css('top', '0px');
        // } else {
        //     $('.sticky-top').removeClass('full-width').css('top', '-150px');
        // }
        if ($(window).scrollTop() > 60) {
          $(".my-navbar").addClass("navbar-scroll");
          // $(".my-navbar").addClass("top-0");
        } else {
          $(".my-navbar").removeClass("navbar-scroll");
          // $(".my-navbar").removeClass("top-0");
        }
    });

    //xy ly su kien chuot khi chon khu vuc tren page san-pham/trang-trai
    $('.trangtrai-khuvuc-chon').mouseenter(function(){
      $('.trangtrai-khuvuc-chon').removeClass('active');
      $('.map').removeClass('animated zoomIn');
      $('.map').css('visibility','hidden');
      $('.s-zone').removeClass('s-zone-active');
      $(this).addClass('active');
      $(this).find(".s-zone").addClass('s-zone-active')
      if($(this).attr('data-id') == 'vn') {
        $('#vn-map').css('visibility','visible');
        $('#vn-map').addClass('animated zoomIn');
      }
      else if($(this).attr('data-id') == 'la') {
        $('#la-map').css('visibility','visible');
        $('#la-map').addClass('animated zoomIn');
      }
      else if($(this).attr('data-id') == 'kh') {
        $('#kh-map').css('visibility','visible');
        $('#kh-map').addClass('animated zoomIn');
      }
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Modal Video
    var $videoSrc;
    $('.btn-play').click(function () {
        $videoSrc = $(this).data("src");
    });
    $('#videoModal').on('shown.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    })
    $('#videoModal').on('hide.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc);
    })


    // Product carousel
    $(".product-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
			0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    $(".nhan-su-carousel").owlCarousel({
    //   autoplay: true,
      smartSpeed: 1000,
      stagePadding: 50,
      margin: 25,
    //   loop: true,
      center: false,
      dots: false,
      nav: true,
      navText : [
          '<i class="bi bi-chevron-left"></i>',
          '<i class="bi bi-chevron-right"></i>'
      ],
      responsive: {
        0:{
            items:1
        },
        576:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
      }
    });
    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        loop: true,
        dots: true,
        nav: false,
    });

})(jQuery);

