$(window).scroll(function() {
    if ($(".navbar").offset().top > 20) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".navbar-list").addClass("ungu");
        $(".navbar-brand").addClass("ungu");
        $(".bar1, .bar2, .bar3").addClass("bgungu");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".navbar-list").removeClass("ungu");
        $(".navbar-brand").removeClass("ungu");
        $(".bar1, .bar2, .bar3").removeClass("bgungu");
    }
});

$(window).scroll(function() {
    if ($(".navbar").offset().top > 300) {
        $(".bebas").removeClass("glyphicon glyphicon-chevron-down");
        $(".bebas").addClass("glyphicon glyphicon-plus");
    }
    else {
        $(".bebas").removeClass("glyphicon glyphicon-plus");
        $(".bebas").addClass("glyphicon glyphicon-chevron-down");

    }
});


$(document).ready(function(){
    $(".pencet").click(function() {
      $(this).toggleClass("change");
      $(".navbar-custom").toggleClass("gedein");
      $(".navbar-brand").addClass("ungu");
      $(".navbar-list").toggleClass("adanav");
    });

    $('.botonF1').hover(function(){
      $('.bton').addClass('animacionVer');
    });
    $('.contenedor').mouseleave(function(){
      $('.bton').removeClass('animacionVer');
    });
    $('.bton').hover(function(){
      $('.hoversamping').addClass('animacionVer');
    });
    $('.bton').mouseleave(function(){
      $('.hoversamping').removeClass('animacionVer');
    });
});

$(document).ready(function() {

  if(window.location.href.indexOf('#myModal') != -1) {
    $('#myModal').modal('show');
  }

});