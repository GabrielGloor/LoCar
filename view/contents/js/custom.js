(function(){
  var date = new Date();
  var year = date.getFullYear();
  document.querySelector("#getcurrentYear").innerHTML = year;
}())


$(".owl-one").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }

  });

  $('.client-slick-slider').slick({
    slidesToShow: 3,
    centerMode: true,
    dots: true,
    arrows: true,
    swipe: true,
    variableWidth: true,
    swipeToSlide: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          centerMode: false,
        }
      }
    ]

  });