(function ($) {

  "use strict";
  
  $('.menu-glavni-meni-container a').on('click', function (e) {
    var linkHref = $(this).attr('href');
    var linkHrefSplit;
    var offset;
    var targetHref;

    e.preventDefault();

    linkHrefSplit = linkHref.split('/', 5);
    targetHref = '#' + linkHrefSplit[linkHrefSplit.length - 1];

    if (!$(targetHref).length) {
      return;
    }

    offset = $(targetHref).offset().top;

    $('html, body').animate({
      scrollTop: offset - 90
    }, {
        duration: 500,
        easing: 'linear'
      });

    $('.main-navigation').removeClass('toggled');
  });

  $('.open-popup-link').magnificPopup({
    type: 'inline', midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    gallery: {
      enabled: true,
      preload: [
        0, 2
      ],
      navigateByImgClick: true,
      arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow arrow %dir% fas fa-chevron-circle-%dir%"></button>', // markup of an arrow button
      tPrev: 'Previous (Left arrow key)', // title for left button
      tNext: 'Next (Right arrow key)', // title for right button
      tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
    }
  });

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 40) {
      $('.home').addClass('scrolling');
    } else if (scroll <= 39) {
      $('.home').removeClass('scrolling');
    }
  });

  $('.sponsors .wpb_portfolio').slick({
    infinite: true, slidesToShow: 4, arrows: true, dots: false,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></i></button>',
    responsive: [
      {
        breakpoint: 786,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.menu-toggle').on('click', function () {
    $('.main-navigation').toggleClass('toggled');
    $('.main-navigation .menu').toggleClass('open');
  });

})(jQuery);
