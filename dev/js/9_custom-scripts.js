/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  $('#featured-events-carousel').on('slide.bs.carousel', function(e){
    var $slide_content_container = $('#featured-event');
    var $new_slide = e.relatedTarget;
    var event_date = '<h4 class="subtitle">' + $($new_slide).data('event_date') + '</h4>';
    var event_desc = $($new_slide).data('event_desc');
    var event_link = $($new_slide).data('event_link');

    $slide_content_container.children().fadeOut('fast', function(){
      $(this).remove();
      $($slide_content_container).html(event_date + event_desc + event_link).fadeIn('fast');
    });
  });

  $('#where-to-stay-carousel').on('slide.bs.carousel', function(e){
    var $slide_content_container = $('#where-to-stay');
    var $new_slide = e.relatedTarget;
    var stay_location = '<h4 class="subtitle">' + $($new_slide).data('stay_location') + '</h4>';
    var stay_desc = $($new_slide).data('stay_description');
    var stay_link = $($new_slide).data('stay_link');

    $slide_content_container.children().fadeOut('fast', function(){
      $(this).remove();
      $($slide_content_container).html(stay_location + stay_desc + stay_link).fadeIn('fast');
    });
  });

  //$('#news-carousel.carousel .carousel-item').each(function(){
  //  var next = $(this).next();
  //  if(!next.length){
  //    next = $(this).siblings(':first');
  //  }
  //  next.children(':first-child').clone().appendTo($(this));
  //});
  $('#news-carousel.carousel .carousel-item').twoItemCarousel();

  $('#news-carousel.carousel-heights .carousel-inner .carousel-item').carouselHeights();

}); //jQuery

/**
 * Normalize Carousel Heights
 */
$.fn.carouselHeights = function () {
  var items = $(this), //grab all slides
    heights = [], //create empty array to store height values
    tallest; //create variable to make note of the tallest slide

  var normalizeHeights = function () {
    items.each(function () { //add heights to array
      heights.push($(this).height());
    });
    tallest = Math.max.apply(null, heights); //cache largest value
    if (tallest < 300) { tallest = 300; }
    items.each(function () {
      $(this).css('min-height', tallest + 'px');
    });
  };

  normalizeHeights();

  $(window).on('resize orientationchange', function () {
    //reset vars
    tallest = 0;
    heights.length = 0;

    items.each(function () {
      $(this).css('min-height', '0'); //reset min-height
    });
    normalizeHeights(); //run it again 
  });
};

$.fn.twoItemCarousel = function(){
  var $items = $(this);

  var checkWidth = function(){
    //console.log($('#news-carousel .col-md-6').css('max-width'));
    if($('#news-carousel .col-md-6').css('max-width') == '50%'){
      $items.each(function(){
        var next = $(this).next();
        if(!next.length){
          next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
      });
    }
  };

  checkWidth();

  $(window).on('resize orientationchange', function(){
    $items.each(function(){
      $(this).children().not(':first-child').remove();
    });
    checkWidth();
  });
}