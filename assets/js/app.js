$(document).foundation()
$('[data-app-dashboard-toggle-shrink]').on('click', function(e) {
  e.preventDefault();
  $(this).parents('.app-dashboard').toggleClass('shrink-medium').toggleClass('shrink-large');
});

// Open Card Reveal Click
$('.open-button').click(function(){
  $(this).siblings('.card-reveal').toggleClass('open');
});

// Close Card Reveal Click
$('.close-button').click(function(){
  $(this).parent().parent('.card-reveal').toggleClass('open');
});

//navigation
$(function() {
  $(window).scroll(function() {
    var winTop = $(window).scrollTop();
    if (winTop >= 40) {
      $("body").addClass("sticky-shrinknav-wrapper");
    } else{
      $("body").removeClass("sticky-shrinknav-wrapper");
    }
  });
});