(function ($) {
  "use strict";

  // PAGE LOADING
  $(window).on("load", function (e) {
    $("#global-loader").fadeOut("slow");
  });

  // CARD
  const DIV_CARD = "div.card";

  // FUNCTIONS FOR COLLAPSED CARD
  $(document).on("click", '[data-bs-toggle="card-collapse"]', function (e) {
    let $card = $(this).closest(DIV_CARD);
    $card.toggleClass("card-collapsed");
    e.preventDefault();
    return false;
  });

  // BACK TO TOP BUTTON
  $(window).on("scroll", function (e) {
    if ($(this).scrollTop() > 0) {
      $("#back-to-top").fadeIn("slow");
    } else {
      $("#back-to-top").fadeOut("slow");
    }
  });
  $(document).on("click", "#back-to-top", function (e) {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      0
    );
    return false;
  });

  $(".testimonial-carousel").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".feature-logos").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });

  $(document).on("click", ".page", function () {
    if ($(".demo_changer").hasClass("active")) {
      $(".demo_changer").animate({ right: "-270px" }, function () {
        $(".demo_changer").toggleClass("active");
      });
    }
  });

  // RTL STYLE START
  $("#myonoffswitch24").on("click", function () {
    if (this.checked) {
      $("body").addClass("rtl");
      $(".slick-slider").slick("slickSetOption", "rtl", true);
      $("html[lang=en]").attr("dir", "rtl");
      $("body").removeClass("ltr");
      $("head link#style").attr("href", $(this));
      document
        .getElementById("style")
        .setAttribute(
          "href",
          "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"
        );
      var carousel = $(".owl-carousel");
      $.each(carousel, function (index, element) {
        // element == this
        var carouselData = $(element).data("owl.carousel");
        carouselData.settings.rtl = true; //don't know if both are necessary
        carouselData.options.rtl = true;
        $(element).trigger("refresh.owl.carousel");
      });
      localStorage.setItem("sashrtl", true);
      localStorage.removeItem("sashltr");
    }
  });

  // RTL STYLE END

  // LTR STYLE START
  $("#myonoffswitch23").on("click", function () {
    if (this.checked) {
      $("body").addClass("ltr");
      $(".slick-slider").slick("slickSetOption", "rtl", false);
      $("html[lang=en]").attr("dir", "ltr");
      $("body").removeClass("rtl");
      $("head link#style").attr("href", $(this));
      document
        .getElementById("style")
        .setAttribute(
          "href",
          "../assets/plugins/bootstrap/css/bootstrap.min.css"
        );
      var carousel = $(".owl-carousel");
      $.each(carousel, function (index, element) {
        // element == this
        var carouselData = $(element).data("owl.carousel");
        carouselData.settings.rtl = false; //don't know if both are necessary
        carouselData.options.rtl = false;
        $(element).trigger("refresh.owl.carousel");
      });
      localStorage.setItem("sashltr", true);
      localStorage.removeItem("sashrtl");
    }
  });
  // LTR STYLE END

  // LIGHT THEME START
  $(document).on("click", "#myonoffswitch1", function () {
    if (this.checked) {
      $("body").removeClass("dark-mode");
      $("body").addClass("light-mode");
      $("#myonoffswitch3").prop("checked", true);
      $("#myonoffswitch6").prop("checked", true);
      localStorage.removeItem("sashdarkMode");
    }
  });
  // LIGHT THEME END

  // DARK THEME START
  $(document).on("click", "#myonoffswitch2", function () {
    if (this.checked) {
      $("body").addClass("dark-mode");
      $("body").removeClass("light-mode");

      $("#myonoffswitch5").prop("checked", true);
      $("#myonoffswitch8").prop("checked", true);
      localStorage.setItem("sashdarkMode", true);
    }
  });
  // DARK THEME END


  function landingPageLocalstorage() {
    if (localStorage.getItem("sashrtl")) {
      $("body").addClass("rtl");
    }
    if (localStorage.getItem("sashdarkMode")) {
      $("body").addClass("dark-mode");
    }
  }
  landingPageLocalstorage();

  if ($("body").hasClass("rtl")) {
    $(".slick-slider").slick("slickSetOption", "rtl", true);
    $("#slide-left").removeClass("d-none");
    $("#slide-right").removeClass("d-none");
    $("html[lang=en]").attr("dir", "rtl");
    $("body").removeClass("ltr");
    $("head link#style").attr("href", $(this));
    document
      .getElementById("style")
      .setAttribute(
        "href",
        "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"
      );
    var carousel = $(".owl-carousel");
    $.each(carousel, function (index, element) {
      // element == this
      var carouselData = $(element).data("owl.carousel");
      carouselData.settings.rtl = true; //don't know if both are necessary
      carouselData.options.rtl = true;
      $(element).trigger("refresh.owl.carousel");
    });

    $("#myonoffswitch24").prop("checked", true);
  }
  if ($("body").hasClass("dark-mode")) {
    $("body").removeClass("light-mode");

    $("#myonoffswitch2").prop("checked", true);
  }

  $(document).on("click", '[data-bs-toggle="sidebar"]', function (event) {
    event.preventDefault();
    $(".app").toggleClass("sidenav-toggled");
  });
  
  if (window.innerWidth <= 992) {
    $("body").removeClass("sidenav-toggled");
  }
  
})(jQuery);

// FOOTER
document.getElementById("year").innerHTML = new Date().getFullYear();

window.addEventListener("scroll", reveal);

function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var cardTop = reveals[i].getBoundingClientRect().top;
    var cardRevealPoint = 150;

    //   console.log('condition', windowHeight - cardRevealPoint)

    if (cardTop < windowHeight - cardRevealPoint) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

reveal();

// ==== for menu scroll
const pageLink = document.querySelectorAll(".side-menu__item");

pageLink.forEach((elem) => {
  elem.addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector(elem.getAttribute("href")).scrollIntoView({
      behavior: "smooth",
      offsetTop: 1 - 60,
    });
  });
});

// section menu active
function onScroll(event) {
  const sections = document.querySelectorAll(".side-menu__item");
  const scrollPos =
    window.pageYOffset ||
    document.documentElement.scrollTop ||
    document.body.scrollTop;

  sections.forEach((elem) => {
    const val = elem.getAttribute("href");
    const refElement = document.querySelector(val);
    const scrollTopMinus = scrollPos + 73;
    if (
      refElement.offsetTop <= scrollTopMinus &&
      refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
    ) {
      elem.classList.add("active");
    } else {
      elem.classList.remove("active");
    }
  });
}

window.document.addEventListener("scroll", onScroll);

jQuery(".demo-icon").click(function () {
  if ($(".demo_changer").hasClass("active")) {
    $(".demo_changer").animate({ right: "-270px" }, function () {
      $(".demo_changer").toggleClass("active");
    });
  } else {
    $(".demo_changer").animate({ right: "0px" }, function () {
      $(".demo_changer").toggleClass("active");
    });
  }
});

// RESET SWITCHER TO DEFAULT
function resetData() {
    $('#myonoffswitch23').prop('checked', true);
    $('#myonoffswitch1').prop('checked', true);
    $('body').addClass('ltr');
    $('.slick-slider').slick('slickSetOption', 'rtl', false);
    $("html[lang=en]").attr("dir", "ltr");
    $('body').removeClass('rtl');
    $("head link#style").attr("href", $(this));
    (document.getElementById("style").setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.min.css"));
    var carousel = $('.owl-carousel');
    $.each(carousel, function (index, element) {
        // element == this
        var carouselData = $(element).data('owl.carousel');
        carouselData.settings.rtl = false; //don't know if both are necessary
        carouselData.options.rtl = false;
        $(element).trigger('refresh.owl.carousel');
    });   
    $('body').removeClass('dark-mode');
    $('body').addClass('light-mode');
    $('#myonoffswitch3').prop('checked', true);
    $('#myonoffswitch6').prop('checked', true);
    localStorage.clear()
}
    
