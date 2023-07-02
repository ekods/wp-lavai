function introLoader(element,delay) {
  this.open = function(callback) {
    setTimeout(function() {
      $(element).fadeIn(500, function() {
        if(callback !== undefined) callback();
      });
    }, delay);

  };
  this.close = function(callback) {
    setTimeout(function() {
      $(element).fadeOut(500, function() {
        if(callback !== undefined) callback();
      });
    }, delay);
  };
}

var LOADER = new introLoader('#introLoader',500);
$(window).on('load', function() {
  LOADER.close(function() {
  });
});


    var init = false;
    
      function swiperCard() {
        if (window.innerWidth <= 767) {
          if (!init) {
            init = true;
            swiper = new Swiper(".sliderPost-side", {
              direction: "horizontal",
              slidesPerView: "auto",
              spaceBetween: 27,
              slidesPerView: 2,
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
              breakpoints: {
                320: {
                  slidesPerView: 1,
                  spaceBetween: 15
                },
                330: {
                  slidesPerView: 2,
                  spaceBetween: 15
                },
                600: {
                  slidesPerView: 2,
                  spaceBetween: 15
                },
              }
            });
          }
        } else if (init) {
          swiper.destroy();
          init = false;
        }
      }
      swiperCard();
      window.addEventListener("resize", swiperCard);





// Init all functions------------------
$(document).ready(function () {

    const observer = lozad(); // lazy loads elements with default selector as ".lozad"
    observer.observe();
    // Initialize library
    lozad('.lozad', {
            load: function(el) {
                    el.src = el.dataset.src;
                    el.onload = function() {
                            el.classList.add('fade')
                    }
            }
    }).observe();


    

    // scroll
    $(window).scroll(function () {
      var scrollpos = $(window).scrollTop();
      var hblock = $('.headerInner').outerHeight();

      if(scrollpos > hblock) {
        $('.single-Professionals .js-nav-offset').css({
            'padding-top': hblock,
        });
        $('.headerInner').addClass('scrolled');
        $('body').addClass('sc');
      } else {
        $('.headerInner').removeClass('scrolled');
        $('.single-Professionals .js-nav-offset').removeAttr('style');
        $('body').removeClass('sc');
      }
    });


    var hamburgerMenu = $("#hamburger-menu");
    var overlay = $("#overlay");
    var html = $("html");
    hamburgerMenu.on("click", function(e) {
      //hamburgerMenu.toggleClass("active");
      overlay.toggleClass("overlay-active");
      html.toggleClass("menu-active");
      e.preventDefault();
    });

    $(".anchor-nav").on("click", function() {
      //hamburgerMenu.removeClass("active");
      overlay.removeClass("overlay-active");
      html.removeClass("menu-active");
    });


    $("#hamburger-menu-2").on("click", function(e) {
      //hamburgerMenu.removeClass("active");
      overlay.removeClass("overlay-active");
      html.removeClass("menu-active");
      e.preventDefault();
    });


    $('.openSubscribe').on('click', function(event){
      event.stopPropagation();

      $('.subscribeBlock').toggleClass('visible');
      $('.subscribeBlock .subscribeInput').focus();
    });

    $('.subscribeBox').on('click', function(event){
      event.stopPropagation();
    });


    $('.openSearch').on('click', function(event){
      event.stopPropagation();

      $('.searchBlock').toggleClass('visible');
      $('.searchBlock .searchInput').focus();
    });

    $('.modalclose').on('click', function(){
      $('.subscribeBlock').removeClass('visible');
    });

    $('body').on('click', function(){
      $('.searchBlock').removeClass('visible');
      $('.subscribeBlock').removeClass('visible');
    });

    $('.searchBox').on('click', function(event){
      event.stopPropagation();
    });

    $('.searchInput').on('keyup', function(event){
      if($(this).val() !== ''){
        $(this).addClass('typing');
      } else {
        $(this).removeClass('typing');
      }
    });




    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      effect: "fade",
      loop: true,
      // autoplay: {
      //   delay: 2500,
      //   disableOnInteraction: false,
      // },
      keyboard: {
        enabled: true,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });



  // Share   ------------------
  $(".shareContainer").share({
      networks: ['whatsapp', 'facebook', 'twitter', 'linkedin', 'email']
  });





});


$(window).on('load', function(){
    

  $('.collectionGallery').slick({
    infinite        : true,
    slidesToShow    : 1,
    slidesToScroll  : 1,
    mobileFirst     : true,
    arrows          : false,
    asNavFor: '.collectionGallery-nav'
  });
  
  $('.collectionGallery-nav').slick({
    infinite        : true,
    arrows          : true,
    slidesToShow    : 4,
    slidesToScroll  : 1,
    asNavFor        : '.collectionGallery',
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      }
    ]
  });
  
  
  $('.collectionGallery').slickLightbox({
    itemSelector        : 'a',
    navigateByKeyboard  : true
  });




  var btn = $('#backtop');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });

    
});

